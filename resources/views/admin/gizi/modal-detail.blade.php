<style>
    /* Modal Detail Styles */
    .modal-detail-header {
        background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%);
        color: white;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        border-bottom: none;
    }

    .modal-content {
        border-radius: 15px;
        border: none;
    }

    .detail-img-wrapper {
        width: 100%;
        height: 250px;
        overflow: hidden;
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .detail-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .info-badge {
        display: inline-block;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 16px;
    }

    .info-badge.makanan {
        background: #f1f3f5;
        color: #495057;
    }

    .info-badge.minuman {
        background: #e3f2fd;
        color: #1976d2;
    }

    .detail-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        border: none;
    }

    .detail-card-header {
        font-size: 16px;
        font-weight: 700;
        color: #2d3436;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
        padding-bottom: 12px;
        border-bottom: 2px solid rgba(0, 0, 0, 0.05);
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .detail-grid-3 {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .detail-item {
        background: #f8f9fa;
        padding: 14px 16px;
        border-radius: 8px;
        border-left: 4px solid #0f4c3a;
    }

    .detail-item-label {
        font-size: 13px;
        color: #6c757d;
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 6px;
    }

    .detail-item-value {
        font-size: 18px;
        font-weight: 700;
        color: #2d3436;
    }

    .detail-description {
        background: #f8f9fa;
        padding: 16px;
        border-radius: 8px;
        border-left: 4px solid #6a1b9a;
    }

    .detail-description p {
        font-size: 14px;
        color: #495057;
        line-height: 1.8;
        margin: 0;
    }
</style>

<!-- Modal Detail Menu -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-detail-header">
                <h5 class="modal-title" id="modalDetailLabel">
                    <i class="fas fa-info-circle me-2"></i>
                    Detail Informasi Menu
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #f8f9fa; padding: 24px;">
                <!-- Gambar Menu -->
                <div class="detail-img-wrapper">
                    <img id="detailGambar" src="" alt="Menu Image">
                </div>

                <!-- Header Info -->
                <div class="text-center mb-4">
                    <span class="info-badge" id="detailKategoriBadge">
                        <span id="detailKategori"></span>
                    </span>
                    <h3 style="font-size: 26px; font-weight: 800; color: #2d3436; margin: 8px 0;" id="detailNamaMenu"></h3>
                </div>

                <!-- Deskripsi -->
                <div class="detail-description mb-3">
                    <p id="detailDeskripsi"></p>
                </div>

                <!-- Kalori & Energi -->
                <div class="detail-card">
                    <div class="detail-card-header" style="color: #2e7d32;">
                        <i class="fas fa-fire"></i>
                        Kalori & Energi
                    </div>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-burn text-danger"></i>
                                Total Kalori
                            </div>
                            <div class="detail-item-value" id="detailKalori"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-bolt text-warning"></i>
                                Energi
                            </div>
                            <div class="detail-item-value" id="detailEnergi"></div>
                        </div>
                    </div>
                </div>

                <!-- Makronutrien -->
                <div class="detail-card">
                    <div class="detail-card-header" style="color: #1565c0;">
                        <i class="fas fa-dna"></i>
                        Makronutrien
                    </div>
                    <div class="detail-grid-3 mb-3">
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-drumstick-bite text-danger"></i>
                                Protein
                            </div>
                            <div class="detail-item-value" id="detailProtein"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-bread-slice text-warning"></i>
                                Karbohidrat
                            </div>
                            <div class="detail-item-value" id="detailKarbohidrat"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-droplet text-info"></i>
                                Lemak Total
                            </div>
                            <div class="detail-item-value" id="detailLemak"></div>
                        </div>
                    </div>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-circle text-danger" style="font-size: 8px;"></i>
                                Lemak Jenuh
                            </div>
                            <div class="detail-item-value" id="detailLemakJenuh"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-wheat-awn text-success"></i>
                                Serat
                            </div>
                            <div class="detail-item-value" id="detailSerat"></div>
                        </div>
                    </div>
                </div>

                <!-- Mikronutrien & Mineral -->
                <div class="detail-card">
                    <div class="detail-card-header" style="color: #e65100;">
                        <i class="fas fa-tablets"></i>
                        Mikronutrien & Mineral
                    </div>
                    <div class="detail-grid-3 mb-3">
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-flask text-primary"></i>
                                Natrium
                            </div>
                            <div class="detail-item-value" id="detailNatrium"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-candy-cane text-danger"></i>
                                Gula
                            </div>
                            <div class="detail-item-value" id="detailGula"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-heart-pulse text-danger"></i>
                                Kolesterol
                            </div>
                            <div class="detail-item-value" id="detailKolesterol"></div>
                        </div>
                    </div>
                    <div class="detail-grid-3 mb-3">
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-eye text-warning"></i>
                                Vitamin A
                            </div>
                            <div class="detail-item-value" id="detailVitaminA"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-lemon text-warning"></i>
                                Vitamin C
                            </div>
                            <div class="detail-item-value" id="detailVitaminC"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-bone text-secondary"></i>
                                Kalsium
                            </div>
                            <div class="detail-item-value" id="detailKalsium"></div>
                        </div>
                    </div>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-magnet text-danger"></i>
                                Zat Besi
                            </div>
                            <div class="detail-item-value" id="detailZatBesi"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-item-label">
                                <i class="fas fa-utensils text-success"></i>
                                Ukuran Porsi
                            </div>
                            <div class="detail-item-value" style="font-size: 15px;" id="detailPorsi"></div>
                        </div>
                    </div>
                </div>

                <!-- Catatan Tambahan -->
                <div class="detail-card">
                    <div class="detail-card-header" style="color: #6a1b9a;">
                        <i class="fas fa-note-sticky"></i>
                        Catatan Tambahan
                    </div>
                    <div class="detail-item mb-3">
                        <div class="detail-item-label">
                            <i class="fas fa-triangle-exclamation text-warning"></i>
                            Alergen
                        </div>
                        <div class="detail-item-value" style="font-size: 15px;" id="detailAlergen">-</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-item-label">
                            <i class="fas fa-comment-dots text-info"></i>
                            Keterangan Khusus
                        </div>
                        <div style="font-size: 14px; color: #495057; margin-top: 8px; line-height: 1.6;" id="detailKeterangan">-</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background-color: #f8f9fa;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Update badge kategori style saat modal dibuka
    document.addEventListener('DOMContentLoaded', function() {
        var modalDetail = document.getElementById('modalDetail');
        if (modalDetail) {
            modalDetail.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var kategori = button.getAttribute('data-kategori');
                var badge = modalDetail.querySelector('#detailKategoriBadge');

                // Update badge style berdasarkan kategori
                if (kategori === 'Minuman') {
                    badge.className = 'info-badge minuman';
                } else {
                    badge.className = 'info-badge makanan';
                }
            });
        }
    });
</script>