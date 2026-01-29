<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verifikasi Email - Kantin Sehat</title>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/wizard.css') }}">
</head>

<body>
    <div class="container-wizard">
        <!-- Header -->
        <div class="header-wizard">
            <div class="brand-title">
                <img
                    src="{{ asset('images/logo-kantin-sehat.png') }}"
                    alt="Logo Kantin Sehat"
                    class="logo-kantin"
                />
                <h1>Kantin Sehat</h1>
            </div>
        </div>

        <!-- Wizard Content -->
        <div class="wizard-container">
            <!-- Progress Steps - DIPERBAIKI: Lebih simetris -->
            <div class="progress-wrapper">
                <div class="progress-steps">
                    <!-- Step 1 -->
                    <div class="step active completed">
                        <div class="step-circle">
                            <span class="step-number">1</span>
                            <i class="fas fa-check step-icon"></i>
                        </div>
                    </div>
                    
                    <!-- Connector 1 -->
                    <div class="step-connector active completed"></div>
                    
                    <!-- Step 2 -->
                    <div class="step active">
                        <div class="step-circle">
                            <span class="step-number">2</span>
                            <i class="fas fa-check step-icon"></i>
                        </div>
                    </div>
                    
                    <!-- Connector 2 -->
                    <div class="step-connector"></div>
                    
                    <!-- Step 3 -->
                    <div class="step">
                        <div class="step-circle">
                            <span class="step-number">3</span>
                            <i class="fas fa-check step-icon"></i>
                        </div>
                    </div>
                    
                    <!-- Connector 3 -->
                    <div class="step-connector"></div>
                    
                    <!-- Step 4 -->
                    <div class="step">
                        <div class="step-circle">
                            <span class="step-number">4</span>
                            <i class="fas fa-check step-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Card - DIPERBAIKI: Button di dalam form -->
            <div class="form-card">
                <form id="verificationForm" method="POST" action="/datalogin">
                    @csrf
                    
                    <!-- STEP 1 -->
                    <div class="step-content active" data-step="1">
                        <h3 class="step-title">Data Orang Tua</h3>
                        
                        <div class="form-group">
                            <div class="input-area">
                                <input
                                    type="text"
                                    name="nama_ibu"
                                    class="input-field"
                                    placeholder=" "
                                    required
                                />
                                <label class="input-label">Nama Ibu</label>
                            </div>
                            
                            <div class="input-area">
                                <input
                                    type="text"
                                    name="nama_ayah"
                                    class="input-field"
                                    placeholder=" "
                                    required
                                />
                                <label class="input-label">Nama Ayah</label>
                            </div>
                            
                            <div class="button-group">
                                <button type="button" class="btn-prev" onclick="prevStep()"><a href="/login" style="text-decoration: none; color: black;">Kembali ke NIS</a></button>
                                <button type="button" class="btn-next" onclick="nextStep()">Lanjut</button>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2 -->
                    <div class="step-content" data-step="2">
                        <h3 class="step-title">Data Kelahiran</h3>
                        
                        <div class="form-group">
                            <div class="input-area">
                                <input
                                    type="text"
                                    name="tempat_lahir"
                                    class="input-field"
                                    placeholder=" "
                                    required
                                />
                                <label class="input-label">Tempat Lahir</label>
                            </div>
                            
                            <div class="input-area">
                                <input
                                    type="date"
                                    name="tanggal_lahir"
                                    class="input-field date-input"
                                    required
                                />
                                <label class="input-label">Tanggal Lahir</label>
                            </div>
                            
                            <div class="button-group">
                                <button type="button" class="btn-prev" onclick="prevStep()">Kembali</button>
                                <button type="button" class="btn-next" onclick="nextStep()">Lanjut</button>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 3 -->
                    <div class="step-content" data-step="3">
                        <h3 class="step-title">Buat PIN Keamanan</h3>
                        <p class="warning-text">*Jangan beri tahu siapapun PIN Anda</p>
                        
                        <div class="form-group">
                            <div class="input-area">
                                <input
                                    type="password"
                                    name="pin"
                                    id="pinInput"
                                    class="input-field"
                                    placeholder=" "
                                    maxlength="6"
                                    pattern="[0-9]{6}"
                                    required
                                />
                                <label class="input-label">Masukkan PIN (6 digit)</label>
                                <!-- TAMBAHKAN ICON SHOW/HIDE -->
                                <button type="button" class="toggle-pin-visibility" id="togglePinBtn">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            
                            <div class="button-group">
                                <button type="button" class="btn-prev" onclick="prevStep()">Kembali</button>
                                <button type="button" class="btn-next" onclick="nextStep()">Lanjut</button>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 4 -->
                    <div class="step-content" data-step="4">
                        <h3 class="step-title">Nomor Telepon</h3>
                        
                        <div class="form-group">
                            <div class="input-area">
                                <input
                                    type="tel"
                                    name="no_hp"
                                    class="input-field"
                                    placeholder=" "
                                    pattern="08[0-9]{9,13}"
                                    required
                                />
                                <label class="input-label">Nomor Telepon (08xxxxxxxxxx)</label>
                            </div>
                            
                            <div class="button-group">
                                <button type="button" class="btn-prev" onclick="prevStep()">Kembali</button>
                                <button type="submit" class="btn-submit">Lanjut</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/wizard.js') }}"></script>
</body>
</html>