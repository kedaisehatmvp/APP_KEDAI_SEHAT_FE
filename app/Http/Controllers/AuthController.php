<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Step 1: Cek NIS dan mulai wizard
     */
    public function checkNis(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $nis = $request->nis;
        
        // Cek apakah NIS ada di tabel siswa
        $siswa = Siswa::where('nis', $nis)->first();
        
        // Cek apakah NIS ada di tabel admin
        $admin = Admin::where('nis', $nis)->first();
        
        if (!$siswa && !$admin) {
            return response()->json([
                'success' => false,
                'message' => 'NIS tidak ditemukan'
            ], 404);
        }

        $userData = $siswa ?? $admin;
        $isAdmin = $admin ? true : false;
        $role = $isAdmin ? $admin->role : 'siswa';
        
        // Generate session untuk wizard
        $wizardToken = bin2hex(random_bytes(32));
        $wizardData = [
            'nis' => $nis,
            'nama' => $userData->nama_siswa,
            'kelas' => $siswa ? $userData->kelas : ($admin ? $userData->kelas : null),
            'jurusan' => $siswa ? $userData->jurusan : ($admin ? $userData->jurusan : null),
            'is_admin' => $isAdmin,
            'role' => $role,
            'step' => 1,
            'gender' => $userData->gender
        ];
        
        Cache::put('wizard_' . $wizardToken, $wizardData, now()->addMinutes(30));

        return response()->json([
            'success' => true,
            'message' => 'NIS ditemukan',
            'wizard_token' => $wizardToken,
            'data' => [
                'nama' => $userData->nama_siswa,
                'kelas' => $siswa ? $userData->kelas : ($admin ? $userData->kelas : null),
                'jurusan' => $siswa ? $userData->jurusan : ($admin ? $userData->jurusan : null),
                'is_admin' => $isAdmin,
                'role' => $role
            ]
        ]);
    }

    /**
     * Step 2: Simpan data orang tua
     */
    public function stepOrangTua(Request $request)
    {
        Log::info('=== STEP ORANG TUA START ===');
        Log::info('Request:', $request->all());
        
        $validator = Validator::make($request->all(), [
            'wizard_token' => 'required|string',
            'nama_ibu' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed:', $validator->errors()->toArray());
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $wizardData = Cache::get('wizard_' . $request->wizard_token);
        
        if (!$wizardData) {
            Log::error('Wizard data not found for token: ' . $request->wizard_token);
            return response()->json([
                'success' => false,
                'message' => 'Session wizard tidak valid'
            ], 401);
        }

        $wizardData['nama_ibu'] = $request->nama_ibu;
        $wizardData['nama_ayah'] = $request->nama_ayah;
        $wizardData['step'] = 2;
        
        Cache::put('wizard_' . $request->wizard_token, $wizardData, now()->addMinutes(30));
        
        Log::info('STEP ORANG TUA SUCCESS');

        return response()->json([
            'success' => true,
            'message' => 'Data orang tua berhasil disimpan',
            'step' => 2
        ]);
    }

    /**
     * Step 3: Simpan TTL
     */
    public function stepTTL(Request $request)
    {
        Log::info('=== STEP TTL START ===');
        Log::info('Request:', $request->all());
        
        $validator = Validator::make($request->all(), [
            'wizard_token' => 'required|string',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date'
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed:', $validator->errors()->toArray());
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $wizardData = Cache::get('wizard_' . $request->wizard_token);
        
        if (!$wizardData) {
            Log::error('Wizard data not found for token: ' . $request->wizard_token);
            return response()->json([
                'success' => false,
                'message' => 'Session wizard tidak valid'
            ], 401);
        }

        $wizardData['tempat_lahir'] = $request->tempat_lahir;
        $wizardData['tgl_lahir'] = $request->tgl_lahir;
        $wizardData['step'] = 3;
        
        Cache::put('wizard_' . $request->wizard_token, $wizardData, now()->addMinutes(30));
        
        Log::info('STEP TTL SUCCESS');

        return response()->json([
            'success' => true,
            'message' => 'Data TTL berhasil disimpan',
            'step' => 3
        ]);
    }

    /**
     * Step 4: Simpan PIN (PIN sekarang disimpan di tabel users, bukan siswa/admin)
     */
    public function stepPin(Request $request)
    {
        Log::info('=== STEP PIN START ===');
        Log::info('Request:', $request->all());
        
        $validator = Validator::make($request->all(), [
            'wizard_token' => 'required|string',
            'pin' => 'required|string|min:6|max:6|regex:/^[0-9]+$/'
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed:', $validator->errors()->toArray());
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $wizardData = Cache::get('wizard_' . $request->wizard_token);
        
        if (!$wizardData) {
            Log::error('Wizard data not found for token: ' . $request->wizard_token);
            return response()->json([
                'success' => false,
                'message' => 'Session wizard tidak valid'
            ], 401);
        }

        Log::info('Wizard data found:', $wizardData);

        try {
            $wizardData['pin'] = $request->pin;
            $wizardData['step'] = 4;
            
            // Simpan ke cache dulu
            Cache::put('wizard_' . $request->wizard_token, $wizardData, now()->addMinutes(30));
            
            // Hanya simpan data ke tabel siswa/admin (TANPA PIN karena PIN pindah ke users)
            if ($wizardData['is_admin']) {
                $affected = Admin::where('nis', $wizardData['nis'])->update([
                    'nama_ibu' => $wizardData['nama_ibu'] ?? null,
                    'nama_ayah' => $wizardData['nama_ayah'] ?? null,
                    'tempat_lahir' => $wizardData['tempat_lahir'] ?? null,
                    'tgl_lahir' => $wizardData['tgl_lahir'] ?? null
                ]);
                
                Log::info('Admin updated:', ['affected_rows' => $affected]);
            } else {
                $affected = Siswa::where('nis', $wizardData['nis'])->update([
                    'nama_ibu' => $wizardData['nama_ibu'] ?? null,
                    'nama_ayah' => $wizardData['nama_ayah'] ?? null,
                    'tempat_lahir' => $wizardData['tempat_lahir'] ?? null,
                    'tgl_lahir' => $wizardData['tgl_lahir'] ?? null
                ]);
                
                Log::info('Siswa updated:', ['affected_rows' => $affected]);
            }
            
            Log::info('STEP PIN SUCCESS');
            
            return response()->json([
                'success' => true,
                'message' => 'PIN berhasil disimpan',
                'step' => 4
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error in stepPin:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Step 5: Kirim dan verifikasi OTP
     */
    public function sendOtp(Request $request)
    {
        Log::info('=== SEND OTP START ===');
        Log::info('Request:', $request->all());
        
        $validator = Validator::make($request->all(), [
            'wizard_token' => 'required|string',
            'no_telepon' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $wizardData = Cache::get('wizard_' . $request->wizard_token);
        
        if (!$wizardData) {
            Log::error('Wizard data not found for token: ' . $request->wizard_token);
            return response()->json([
                'success' => false,
                'message' => 'Session wizard tidak valid'
            ], 401);
        }

        $phone = $this->formatPhoneNumber($request->no_telepon);
        if (!$phone) {
            return response()->json([
                'success' => false,
                'message' => 'Format nomor telepon tidak valid'
            ], 422);
        }

        // Generate OTP - simpan sebagai STRING
        $otp = (string) random_int(100000, 999999);
        Log::info('Generated OTP: ' . $otp . ' for: ' . $phone);
        
        // Update wizard data
        $wizardData['otp'] = $otp; // Sudah string
        $wizardData['otp_expires'] = now()->addMinutes(5);
        $wizardData['no_telepon'] = $phone;
        $wizardData['step'] = 5;
        
        Cache::put('wizard_' . $request->wizard_token, $wizardData, now()->addHours(2));

        // KIRIM OTP VIA WHATSAPP BOT - NO DEBUG
        $sendResult = $this->sendWhatsAppOTP($phone, $otp);
        
        Log::info('Send OTP result:', $sendResult);
        
        if (!$sendResult['success']) {
            return response()->json([
                'success' => false,
                'message' => $sendResult['message'],
                'step' => 5
            ], 500);
        }

        // RESPONSE TANPA DEBUG INFO
        return response()->json([
            'success' => true,
            'message' => 'OTP berhasil dikirim ke WhatsApp ' . 
                        substr($phone, 0, 4) . '****' . substr($phone, -4),
            'step' => 5
        ]);
    }

    /**
     * Verifikasi OTP dan login
     */
    /**
 * Verifikasi OTP dan login
 */
public function verifyOtp(Request $request)
{
    Log::info('=== VERIFY OTP START ===');
    Log::info('Request:', $request->all());
    
    $validator = Validator::make($request->all(), [
        'wizard_token' => 'required|string',
        'otp' => 'required|digits:6'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validasi gagal',
            'errors' => $validator->errors()
        ], 422);
    }

    $wizardData = Cache::get('wizard_' . $request->wizard_token);
    
    if (!$wizardData) {
        Log::error('Wizard data not found for token: ' . $request->wizard_token);
        return response()->json([
            'success' => false,
            'message' => 'Session wizard tidak valid'
        ], 401);
    }

    // Check if OTP exists
    if (!isset($wizardData['otp']) || !isset($wizardData['otp_expires'])) {
        Log::error('OTP data missing in wizard');
        return response()->json([
            'success' => false,
            'message' => 'OTP tidak ditemukan, silakan request ulang'
        ], 400);
    }

    // KONVERSI KE STRING UNTUK PERBANDINGAN
    $storedOtp = (string) $wizardData['otp'];
    $receivedOtp = (string) $request->otp;
    
    Log::info('OTP Comparison (as strings):', [
        'stored' => $storedOtp,
        'received' => $receivedOtp,
        'stored_type' => gettype($wizardData['otp']),
        'received_type' => gettype($request->otp),
        'match' => $storedOtp === $receivedOtp
    ]);

    // PERBANDINGAN STRICT DENGAN STRING
    if ($storedOtp !== $receivedOtp) {
        Log::error('OTP MISMATCH!', [
            'expected' => $storedOtp,
            'received' => $receivedOtp
        ]);
        return response()->json([
            'success' => false,
            'message' => 'Kode OTP salah'
        ], 400);
    }

    if (now()->gt($wizardData['otp_expires'])) {
        Log::error('OTP expired:', [
            'expires' => $wizardData['otp_expires'],
            'now' => now()
        ]);
        return response()->json([
            'success' => false,
            'message' => 'Kode OTP sudah kadaluarsa'
        ], 400);
    }

    try {
        // GENERATE USERNAME DARI NAMA (gunakan format tanpa spasi dan lowercase)
        $username = $this->generateUsername($wizardData['nama']);
        
        // CREATE / UPDATE USER dengan password dummy karena field required
        if ($wizardData['is_admin']) {
            $admin = Admin::where('nis', $wizardData['nis'])->first();
            
            if (!$admin) {
                Log::error('Admin not found for NIS: ' . $wizardData['nis']);
                return response()->json([
                    'success' => false,
                    'message' => 'Data admin tidak ditemukan'
                ], 404);
            }

            $user = User::updateOrCreate(
                ['nis' => $wizardData['nis']], // Gunakan NIS sebagai unique identifier
                [
                    'username' => $username,
                    'password' => Hash::make('dummy_password_' . $wizardData['nis']),
                    'nama_lengkap' => $wizardData['nama'],
                    'role' => $wizardData['role'],
                    'no_telepon' => $wizardData['no_telepon'],
                    'nis' => $wizardData['nis'], // Simpan NIS
                    'id_admin' => $admin->id_admin,
                    'pin' => $wizardData['pin'] ?? null,
                    'last_login_at' => now(),
                    'login_count' => DB::raw('IFNULL(login_count, 0) + 1')
                ]
            );
            
            Log::info('Admin user created/updated:', [
                'user_id' => $user->id_user,
                'username' => $username,
                'nis' => $wizardData['nis']
            ]);
            
        } else {
            $siswa = Siswa::where('nis', $wizardData['nis'])->first();
            
            if (!$siswa) {
                Log::error('Siswa not found for NIS: ' . $wizardData['nis']);
                return response()->json([
                    'success' => false,
                    'message' => 'Data siswa tidak ditemukan'
                ], 404);
            }

            $user = User::updateOrCreate(
                ['nis' => $wizardData['nis']], // Gunakan NIS sebagai unique identifier
                [
                    'username' => $username,
                    'password' => Hash::make('dummy_password_' . $wizardData['nis']),
                    'nama_lengkap' => $wizardData['nama'],
                    'role' => 'siswa',
                    'no_telepon' => $wizardData['no_telepon'],
                    'nis' => $wizardData['nis'], // Simpan NIS
                    'id_siswa' => $siswa->id_siswa,
                    'pin' => $wizardData['pin'] ?? null,
                    'last_login_at' => now(),
                    'login_count' => DB::raw('IFNULL(login_count, 0) + 1')
                ]
            );
            
            Log::info('Siswa user created/updated:', [
                'user_id' => $user->id_user,
                'username' => $username,
                'nis' => $wizardData['nis']
            ]);
        }

        // Hapus wizard session
        Cache::forget('wizard_' . $request->wizard_token);
        
        // Create token
        $token = $user->createToken('kantin-sehat-token')->plainTextToken;
        
        Log::info('LOGIN SUCCESS:', [
            'user_id' => $user->id_user,
            'username' => $user->username,
            'nis' => $user->nis,
            'role' => $user->role
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => [
                'id' => $user->id_user,
                'username' => $user->username,
                'nama_lengkap' => $user->nama_lengkap,
                'nis' => $user->nis, // TAMPILKAN NIS
                'role' => $user->role,
                'is_admin' => $wizardData['is_admin']
            ],
            'redirect_to' => $wizardData['is_admin'] ? '/admin/dashboard' : '/landing'
        ]);
        
    } catch (\Exception $e) {
        Log::error('Error in verifyOtp:', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan sistem: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Helper untuk generate username dari nama
 */
private function generateUsername($nama)
{
    // Bersihkan nama: lowercase, hapus spasi, ganti karakter khusus
    $username = strtolower($nama);
    $username = preg_replace('/[^a-z0-9]/', '', $username);
    
    // Jika terlalu pendek, tambahkan angka random
    if (strlen($username) < 4) {
        $username .= rand(100, 999);
    }
    
    // Potong jika terlalu panjang
    $username = substr($username, 0, 20);
    
    // Cek apakah username sudah ada
    $count = User::where('username', $username)->count();
    if ($count > 0) {
        // Jika sudah ada, tambahkan angka unik
        $username .= rand(10, 99);
    }
    
    return $username;
}

    /**
     * Login biasa dengan PIN (setelah wizard selesai) - DIPERBAIKI untuk cek PIN di tabel users
     */
    /**
 * Login biasa dengan PIN (setelah wizard selesai)
 */
public function loginWithPin(Request $request)
{
    Log::info('=== LOGIN WITH PIN START ===');
    Log::info('Request:', ['nis' => $request->nis, 'pin' => '***' . substr($request->pin, -2)]);
    
    $validator = Validator::make($request->all(), [
        'nis' => 'required|string',
        'pin' => 'required|string|min:6|max:6'
    ]);

    if ($validator->fails()) {
        Log::error('Validation failed:', $validator->errors()->toArray());
        return response()->json([
            'success' => false,
            'message' => 'Validasi gagal',
            'errors' => $validator->errors()
        ], 422);
    }

    $nis = $request->nis;
    $pin = $request->pin;

    try {
        // Cari user berdasarkan NIS (bukan username)
        $user = User::where('nis', $nis)->first();
        
        if (!$user) {
            Log::warning('User not found with NIS:', ['nis' => $nis]);
            return response()->json([
                'success' => false,
                'message' => 'User belum terdaftar, silakan lakukan wizard terlebih dahulu'
            ], 401);
        }
        
        // Verifikasi PIN dari tabel users
        if ($user->pin !== $pin) {
            Log::warning('PIN mismatch:', [
                'nis' => $nis,
                'stored_pin' => $user->pin ? '***' . substr($user->pin, -2) : 'null',
                'provided_pin' => '***' . substr($pin, -2)
            ]);
            return response()->json([
                'success' => false,
                'message' => 'PIN salah'
            ], 401);
        }
        
        // Update login info
        $user->update([
            'last_login_at' => now(),
            'login_count' => DB::raw('IFNULL(login_count, 0) + 1')
        ]);
        
        $token = $user->createToken('kantin-sehat-token')->plainTextToken;
        
        Log::info('Login success:', [
            'user_id' => $user->id_user,
            'username' => $user->username,
            'nis' => $user->nis,
            'role' => $user->role
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => [
                'id' => $user->id_user,
                'username' => $user->username,
                'nama_lengkap' => $user->nama_lengkap,
                'nis' => $user->nis, // TAMPILKAN NIS
                'role' => $user->role,
                'is_admin' => $user->role !== 'siswa'
            ],
            'redirect_to' => $user->role !== 'siswa' ? '/admin/dashboard' : '/landing'
        ]);
        
    } catch (\Exception $e) {
        Log::error('Error in loginWithPin:', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan sistem'
        ], 500);
    }
}

    /**
     * Ganti PIN (untuk user yang sudah login)
     */
    public function changePin(Request $request)
    {
        Log::info('=== CHANGE PIN START ===');
        
        $validator = Validator::make($request->all(), [
            'current_pin' => 'required|string|min:6|max:6',
            'new_pin' => 'required|string|min:6|max:6|different:current_pin',
            'confirm_pin' => 'required|string|min:6|max:6|same:new_pin'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();
        
        // Verifikasi PIN lama
        if ($user->pin !== $request->current_pin) {
            return response()->json([
                'success' => false,
                'message' => 'PIN lama salah'
            ], 401);
        }
        
        try {
            $user->pin = $request->new_pin;
            $user->save();
            
            Log::info('PIN changed successfully:', ['user_id' => $user->id_user]);
            
            return response()->json([
                'success' => true,
                'message' => 'PIN berhasil diubah'
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error changing PIN:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem'
            ], 500);
        }
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            
            Log::info('Logout success:', ['user_id' => $request->user()->id_user]);
            
            return response()->json([
                'success' => true,
                'message' => 'Logout berhasil'
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error in logout:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat logout'
            ], 500);
        }
    }

    /**
     * Get user data
     */
    /**
 * Get user data
 */
public function me(Request $request)
{
    try {
        $user = $request->user();
        
        if ($user->id_siswa) {
            $detail = $user->siswa;
        } elseif ($user->id_admin) {
            $detail = $user->admin;
        } else {
            $detail = null;
        }

        return response()->json([
            'success' => true,
            'user' => [
                'id' => $user->id_user,
                'username' => $user->username,
                'nis' => $user->nis, // TAMPILKAN NIS
                'nama_lengkap' => $user->nama_lengkap,
                'role' => $user->role,
                'email' => $user->email,
                'no_telepon' => $user->no_telepon,
                'foto' => $user->foto,
                'detail' => $detail
            ]
        ]);
        
    } catch (\Exception $e) {
        Log::error('Error in me:', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan sistem'
        ], 500);
    }
}

    /**
     * Helper function untuk kirim OTP via WhatsApp
     */
    private function sendWhatsAppOTP($phone, $otp)
    {
        Log::info('🔐 SENDING REAL OTP TO WHATSAPP:', [
            'phone' => $phone,
            'otp' => $otp,
            'driver' => 'whatsapp-bot'
        ]);
        
        // FORCE PAKAI WHATSAPP BOT - NO FALLBACK TO DEVELOPMENT
        $result = $this->sendViaWhatsAppBot($phone, $otp);
        
        // Jika gagal, coba sekali lagi
        if (!$result['success']) {
            Log::warning('First attempt failed, retrying...');
            sleep(1);
            $result = $this->sendViaWhatsAppBot($phone, $otp);
        }
        
        return $result;
    }

    /**
     * Kirim OTP via WhatsApp Bot (Node.js)
     */
    private function sendViaWhatsAppBot($phone, $otp)
    {
        $botUrl = env('WHATSAPP_BOT_URL', 'http://localhost:3000');
        
        Log::info('📞 Calling WhatsApp Bot (Baileys):', [
            'url' => $botUrl,
            'phone' => $phone,
            'format' => 's.whatsapp.net'
        ]);
        
        try {
            // CURL ke bot
            $ch = curl_init();
            
            curl_setopt_array($ch, [
                CURLOPT_URL => $botUrl . '/send-otp',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode([
                    'phone' => $phone,
                    'otp' => $otp
                ]),
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'Accept: application/json'
                ],
                CURLOPT_TIMEOUT => 15,
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => 0
            ]);
            
            $response = curl_exec($ch);
            $error = curl_error($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            
            curl_close($ch);
            
            Log::info('WhatsApp Bot Response:', [
                'http_code' => $httpCode,
                'error' => $error,
                'response' => $response
            ]);
            
            if ($error) {
                Log::error('❌ WhatsApp Bot connection error:', ['error' => $error]);
                return [
                    'success' => false,
                    'message' => 'Tidak dapat terhubung ke server WhatsApp'
                ];
            }
            
            if ($httpCode !== 200) {
                Log::error('❌ WhatsApp Bot HTTP error:', [
                    'http_code' => $httpCode,
                    'response' => $response
                ]);
                
                // Jika 503, bot belum ready
                if ($httpCode === 503) {
                    return [
                        'success' => false,
                        'message' => 'WhatsApp belum terhubung. Silakan scan QR code.'
                    ];
                }
                
                return [
                    'success' => false,
                    'message' => 'Server WhatsApp sedang bermasalah'
                ];
            }
            
            $result = json_decode($response, true);
            
            if (isset($result['success']) && $result['success'] === true) {
                Log::info('✅ OTP sent successfully via WhatsApp Bot');
                return [
                    'success' => true,
                    'message' => 'OTP berhasil dikirim'
                ];
            }
            
            $errorMsg = $result['message'] ?? 'Unknown error from bot';
            Log::error('❌ WhatsApp Bot API error:', ['error' => $errorMsg]);
            
            return [
                'success' => false,
                'message' => 'Gagal mengirim OTP: ' . $errorMsg
            ];
            
        } catch (\Exception $e) {
            Log::error('❌ Exception in WhatsApp Bot:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan sistem'
            ];
        }
    }

    /**
     * Helper function untuk format nomor telepon
     */
    private function formatPhoneNumber($phone)
    {
        // Hapus semua karakter non-digit
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        if (empty($phone)) {
            return false;
        }
        
        // Handle berbagai format
        if (str_starts_with($phone, '0')) {
            // Format: 081234567890 → 6281234567890
            $phone = '62' . substr($phone, 1);
        } elseif (str_starts_with($phone, '8') && strlen($phone) >= 10) {
            // Format: 81234567890 → 6281234567890
            $phone = '62' . $phone;
        } elseif (str_starts_with($phone, '+62')) {
            // Format: +6281234567890 → 6281234567890
            $phone = '62' . substr($phone, 3);
        }
        
        // Validasi akhir
        if (!str_starts_with($phone, '62')) {
            return false;
        }
        
        $length = strlen($phone);
        if ($length < 10 || $length > 15) {
            return false;
        }
        
        return $phone;
    }
}