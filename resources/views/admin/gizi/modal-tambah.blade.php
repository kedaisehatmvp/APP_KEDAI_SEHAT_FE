<style>
    /* Modal Styles */
    .modal-content {
        border-radius: 15px;
        border: none;
    }

    .modal-header {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        border-bottom: none;
    }

    .card {
        border-radius: 10px;
        transition: transform 0.2s ease;
    }

    .card:hover {
        transform: translateY(-2px);
    }

    .card-header {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom: 2px solid rgba(0, 0, 0, 0.05);
    }

    .form-control:focus {
        border-color: #0f4c3a;
        box-shadow: 0 0 0 0.2rem rgba(15, 76, 58, 0.25);
    }

    .form-label {
        font-weight: 500;
        color: #2d3436;
        margin-bottom: 0.5rem;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>

<!-- Modal Tambah Gizi -->
<div class="modal fade" id="modalGizi" tabindex="-1" aria-labelledby="modalGiziLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #0f4c3a 0%, #1a6b4f 100%); color: white;">
                <h5 class="modal-title" id="modalGiziLabel">
                    <i class="fas fa-leaf me-2"></i>
                    Tambah Informasi Gizi - <span></span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #f8f9fa;">
                <form id="formGizi">
                    <input type="hidden" name="nama_menu" id="nama_menu">

                    <!-- Informasi Kalori -->
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-header" style="background-color: #e8f5e9; color: #2e7d32; font-weight: 600;">
                            <i class="fas fa-fire me-2"></i>Kalori & Energi
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kalori" class="form-label">
                                        <i class="fas fa-burn text-danger me-1"></i>Total Kalori (kkal)
                                    </label>
                                    <input type="number" class="form-control" id="kalori" name="kalori" placeholder="Contoh: 250" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="energi" class="form-label">
                                        <i class="fas fa-bolt text-warning me-1"></i>Energi (kJ)
                                    </label>
                                    <input type="number" class="form-control" id="energi" name="energi" placeholder="Contoh: 1046">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Makronutrien -->
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-header" style="background-color: #e3f2fd; color: #1565c0; font-weight: 600;">
                            <i class="fas fa-dna me-2"></i>Makronutrien
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="protein" class="form-label">
                                        <i class="fas fa-drumstick-bite text-danger me-1"></i>Protein (g)
                                    </label>
                                    <input type="number" step="0.1" class="form-control" id="protein" name="protein" placeholder="Contoh: 15.5" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="karbohidrat" class="form-label">
                                        <i class="fas fa-bread-slice text-warning me-1"></i>Karbohidrat (g)
                                    </label>
                                    <input type="number" step="0.1" class="form-control" id="karbohidrat" name="karbohidrat" placeholder="Contoh: 30.2" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="lemak" class="form-label">
                                        <i class="fas fa-droplet text-info me-1"></i>Lemak Total (g)
                                    </label>
                                    <input type="number" step="0.1" class="form-control" id="lemak" name="lemak" placeholder="Contoh: 8.3" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="lemak_jenuh" class="form-label">
                                        <i class="fas fa-circle text-danger me-1" style="font-size: 8px;"></i>Lemak Jenuh (g)
                                    </label>
                                    <input type="number" step="0.1" class="form-control" id="lemak_jenuh" name="lemak_jenuh" placeholder="Contoh: 2.5">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="serat" class="form-label">
                                        <i class="fas fa-wheat-awn text-success me-1"></i>Serat (g)
                                    </label>
                                    <input type="number" step="0.1" class="form-control" id="serat" name="serat" placeholder="Contoh: 5.8">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mikronutrien -->
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-header" style="background-color: #fff3e0; color: #e65100; font-weight: 600;">
                            <i class="fas fa-tablets me-2"></i>Mikronutrien & Mineral
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="natrium" class="form-label">
                                        <i class="fas fa-flask text-primary me-1"></i>Natrium (mg)
                                    </label>
                                    <input type="number" step="0.1" class="form-control" id="natrium" name="natrium" placeholder="Contoh: 450">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="gula" class="form-label">
                                        <i class="fas fa-candy-cane text-danger me-1"></i>Gula (g)
                                    </label>
                                    <input type="number" step="0.1" class="form-control" id="gula" name="gula" placeholder="Contoh: 12.5">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="kolesterol" class="form-label">
                                        <i class="fas fa-heart-pulse text-danger me-1"></i>Kolesterol (mg)
                                    </label>
                                    <input type="number" step="0.1" class="form-control" id="kolesterol" name="kolesterol" placeholder="Contoh: 25">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="vitamin_a" class="form-label">
                                        <i class="fas fa-eye text-warning me-1"></i>Vitamin A (µg)
                                    </label>
                                    <input type="number" step="0.1" class="form-control" id="vitamin_a" name="vitamin_a" placeholder="Contoh: 200">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="vitamin_c" class="form-label">
                                        <i class="fas fa-lemon text-warning me-1"></i>Vitamin C (mg)
                                    </label>
                                    <input type="number" step="0.1" class="form-control" id="vitamin_c" name="vitamin_c" placeholder="Contoh: 45">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="kalsium" class="form-label">
                                        <i class="fas fa-bone text-secondary me-1"></i>Kalsium (mg)
                                    </label>
                                    <input type="number" step="0.1" class="form-control" id="kalsium" name="kalsium" placeholder="Contoh: 150">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="zat_besi" class="form-label">
                                        <i class="fas fa-magnet text-danger me-1"></i>Zat Besi (mg)
                                    </label>
                                    <input type="number" step="0.1" class="form-control" id="zat_besi" name="zat_besi" placeholder="Contoh: 3.2">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="porsi" class="form-label">
                                        <i class="fas fa-utensils text-success me-1"></i>Ukuran Porsi
                                    </label>
                                    <input type="text" class="form-control" id="porsi" name="porsi" placeholder="Contoh: 1 mangkuk (250g)">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Catatan Tambahan -->
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-header" style="background-color: #f3e5f5; color: #6a1b9a; font-weight: 600;">
                            <i class="fas fa-note-sticky me-2"></i>Catatan Tambahan
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="alergen" class="form-label">
                                    <i class="fas fa-triangle-exclamation text-warning me-1"></i>Alergen
                                </label>
                                <input type="text" class="form-control" id="alergen" name="alergen" placeholder="Contoh: Kacang, Susu, Telur">
                                <small class="text-muted">Pisahkan dengan koma jika lebih dari satu</small>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">
                                    <i class="fas fa-comment-dots text-info me-1"></i>Keterangan Khusus
                                </label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Contoh: Cocok untuk diet rendah kalori, mengandung antioksidan tinggi"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="background-color: #f8f9fa;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Batal
                </button>
                <button type="submit" form="formGizi" class="btn text-white" style="background-color: #0f4c3a;">
                    <i class="fas fa-save me-1"></i>Simpan Informasi Gizi
                </button>
            </div>
        </div>
    </div>
</div>