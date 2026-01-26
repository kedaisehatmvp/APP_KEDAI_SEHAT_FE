@extends('layouts.app')
@section('content')

<style>
    .menu-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .menu-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    .menu-img-wrapper {
        position: relative;
        width: 100%;
        height: 180px;
        overflow: hidden;
    }

    .menu-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hot-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: #ff4757;
        color: white;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .menu-content {
        padding: 16px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .menu-category {
        display: inline-block;
        background: #f1f3f5;
        color: #495057;
        padding: 4px 12px;
        border-radius: 16px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 12px;
        width: fit-content;
    }

    .menu-category.minuman {
        background: #e3f2fd;
        color: #1976d2;
    }

    .menu-title {
        font-size: 18px;
        font-weight: 700;
        color: #2d3436;
        margin: 6px 0;
    }

    .menu-description {
        color: #6c757d;
        font-size: 13px;
        line-height: 1.5;
        margin: 10px 0 12px 0;
        flex: 1;
        min-height: 40px;
    }

    .price-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 16px;
        padding-top: 16px;
        border-top: 1px solid #e9ecef;
    }

    .calorie-info {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 13px;
        color: #6c757d;
        margin-top: 4px;
    }

    .calorie-info i {
        font-size: 12px;
    }

    .btn-menu {
        background: #0f4c3a;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .btn-menu:hover {
        background: #0d3d2e;
        transform: scale(1.05);
    }

    .btn-detail {
        background: white;
        color: #2d3436;
        border: 2px solid #dee2e6;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .btn-detail:hover {
        border-color: #0f4c3a;
        color: #0f4c3a;
    }

    .button-group {
        display: flex;
        gap: 8px;
        margin-top: auto;
        padding-top: 16px;
    }
</style>

<div class="row g-4">
    <!-- Menu 1 -->
    <div class="col-md-4">
        <div class="menu-card">
            <div class="menu-img-wrapper">
                <span class="hot-badge">HOT</span>
                <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    alt="Salad Sehat"
                    class="menu-img">
            </div>
            <div class="menu-content">
                <span class="menu-category">Makanan</span>
                <h5 class="menu-title">Salad Sehat Super</h5>
                <p class="menu-description">Campuran sayuran organik segar dengan dressing khusus rendah kalori.</p>
                <div class="price-section">
                    <div class="calorie-info">
                        <i class="fas fa-fire"></i>
                        <span>250 kalori</span>
                    </div>
                </div>

                <div class="button-group">
                    <button class="btn-menu" data-bs-toggle="modal" data-bs-target="#modalGizi" data-menu="Salad Sehat Super">
                        <i class="fas fa-plus"></i>
                        Tambah Gizi
                    </button>
                    <button class="btn-detail"
                        data-bs-toggle="modal"
                        data-bs-target="#modalDetail"
                        data-menu="Salad Sehat Super"
                        data-kategori="Makanan"
                        data-deskripsi="Campuran sayuran organik segar dengan dressing khusus rendah kalori. Mengandung berbagai vitamin dan mineral penting untuk kesehatan tubuh."
                        data-kalori="250"
                        data-protein="15.5"
                        data-karbohidrat="30.2"
                        data-lemak="8.3"
                        data-serat="5.8"
                        data-porsi="1 mangkuk (250g)"
                        data-gambar="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                        <i class="fas fa-info-circle"></i>
                        Detail
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu 2 -->
    <div class="col-md-4">
        <div class="menu-card">
            <div class="menu-img-wrapper">
                <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    alt="Jus Buah"
                    class="menu-img">
            </div>
            <div class="menu-content">
                <span class="menu-category minuman">Minuman</span>
                <h5 class="menu-title">Jus Detox Mix</h5>
                <p class="menu-description">Campuran buah-buahan organik tanpa gula tambahan, kaya vitamin.</p>
                <div class="price-section">
                    <div class="calorie-info">
                        <i class="fas fa-fire"></i>
                        <span>180 kalori</span>
                    </div>
                </div>

                <div class="button-group">
                    <button class="btn-menu" data-bs-toggle="modal" data-bs-target="#modalGizi" data-menu="Jus Detox Mix">
                        <i class="fas fa-plus"></i>
                        Tambah Gizi
                    </button>
                    <button class="btn-detail"
                        data-bs-toggle="modal"
                        data-bs-target="#modalDetail"
                        data-menu="Jus Detox Mix"
                        data-kategori="Minuman"
                        data-deskripsi="Campuran buah-buahan organik tanpa gula tambahan, kaya vitamin. Membantu detoksifikasi tubuh secara alami."
                        data-kalori="180"
                        data-protein="2.5"
                        data-karbohidrat="42.0"
                        data-lemak="0.5"
                        data-serat="3.2"
                        data-porsi="1 gelas (300ml)"
                        data-gambar="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                        <i class="fas fa-info-circle"></i>
                        Detail
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu 3 -->
    <div class="col-md-4">
        <div class="menu-card">
            <div class="menu-img-wrapper">
                <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    alt="Nasi Goreng Sehat"
                    class="menu-img">
            </div>
            <div class="menu-content">
                <span class="menu-category">Makanan</span>
                <h5 class="menu-title">Nasi Goreng Sehat</h5>
                <p class="menu-description">Nasi merah dengan sayuran organik dan protein rendah lemak.</p>

                <div class="price-section">
                    <div class="calorie-info">
                        <i class="fas fa-fire"></i>
                        <span>420 kalori</span>
                    </div>
                </div>

                <div class="button-group">
                    <button class="btn-menu" data-bs-toggle="modal" data-bs-target="#modalGizi" data-menu="Nasi Goreng Sehat">
                        <i class="fas fa-plus"></i>
                        Tambah Gizi
                    </button>
                    <button class="btn-detail"
                        data-bs-toggle="modal"
                        data-bs-target="#modalDetail"
                        data-menu="Nasi Goreng Sehat"
                        data-kategori="Makanan"
                        data-deskripsi="Nasi merah dengan sayuran organik dan protein rendah lemak. Cocok untuk diet sehat dan menjaga berat badan ideal."
                        data-kalori="420"
                        data-protein="22.0"
                        data-karbohidrat="68.5"
                        data-lemak="12.0"
                        data-serat="6.5"
                        data-porsi="1 piring (350g)"
                        data-gambar="https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                        <i class="fas fa-info-circle"></i>
                        Detail
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 pt-5">
    <!-- Menu 1 -->
    <div class="col-md-4">
        <div class="menu-card">
            <div class="menu-img-wrapper">
                <span class="hot-badge">HOT</span>
                <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    alt="Salad Sehat"
                    class="menu-img">
            </div>
            <div class="menu-content">
                <span class="menu-category">Makanan</span>
                <h5 class="menu-title">Salad Sehat Super</h5>
                <p class="menu-description">Campuran sayuran organik segar dengan dressing khusus rendah kalori.</p>

                <div class="price-section">
                    <div class="calorie-info">
                        <i class="fas fa-fire"></i>
                        <span>250 kalori</span>
                    </div>
                </div>

                <div class="button-group">
                    <button class="btn-menu" data-bs-toggle="modal" data-bs-target="#modalGizi" data-menu="Salad Sehat Super">
                        <i class="fas fa-plus"></i>
                        Tambah Gizi
                    </button>
                    <button class="btn-detail"
                        data-bs-toggle="modal"
                        data-bs-target="#modalDetail"
                        data-menu="Salad Sehat Super"
                        data-kategori="Makanan"
                        data-deskripsi="Campuran sayuran organik segar dengan dressing khusus rendah kalori. Mengandung berbagai vitamin dan mineral penting untuk kesehatan tubuh."
                        data-kalori="250"
                        data-protein="15.5"
                        data-karbohidrat="30.2"
                        data-lemak="8.3"
                        data-serat="5.8"
                        data-porsi="1 mangkuk (250g)"
                        data-gambar="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                        <i class="fas fa-info-circle"></i>
                        Detail
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu 2 -->
    <div class="col-md-4">
        <div class="menu-card">
            <div class="menu-img-wrapper">
                <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    alt="Jus Buah"
                    class="menu-img">
            </div>
            <div class="menu-content">
                <span class="menu-category minuman">Minuman</span>
                <h5 class="menu-title">Jus Detox Mix</h5>
                <p class="menu-description">Campuran buah-buahan organik tanpa gula tambahan, kaya vitamin.</p>

                <div class="price-section">
                    <div class="calorie-info">
                        <i class="fas fa-fire"></i>
                        <span>180 kalori</span>
                    </div>
                </div>

                <div class="button-group">
                    <button class="btn-menu" data-bs-toggle="modal" data-bs-target="#modalGizi" data-menu="Jus Detox Mix">
                        <i class="fas fa-plus"></i>
                        Tambah Gizi
                    </button>
                    <button class="btn-detail"
                        data-bs-toggle="modal"
                        data-bs-target="#modalDetail"
                        data-menu="Jus Detox Mix"
                        data-kategori="Minuman"
                        data-deskripsi="Campuran buah-buahan organik tanpa gula tambahan, kaya vitamin. Membantu detoksifikasi tubuh secara alami."
                        data-kalori="180"
                        data-protein="2.5"
                        data-karbohidrat="42.0"
                        data-lemak="0.5"
                        data-serat="3.2"
                        data-porsi="1 gelas (300ml)"
                        data-gambar="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                        <i class="fas fa-info-circle"></i>
                        Detail
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu 3 -->
    <div class="col-md-4">
        <div class="menu-card">
            <div class="menu-img-wrapper">
                <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    alt="Nasi Goreng Sehat"
                    class="menu-img">
            </div>
            <div class="menu-content">
                <span class="menu-category">Makanan</span>
                <h5 class="menu-title">Nasi Goreng Sehat</h5>
                <p class="menu-description">Nasi merah dengan sayuran organik dan protein rendah lemak.</p>

                <div class="price-section">
                    <div class="calorie-info">
                        <i class="fas fa-fire"></i>
                        <span>420 kalori</span>
                    </div>
                </div>

                <div class="button-group">
                    <button class="btn-menu" data-bs-toggle="modal" data-bs-target="#modalGizi" data-menu="Nasi Goreng Sehat">
                        <i class="fas fa-plus"></i>
                        Tambah gizi
                    </button>
                    <button class="btn-detail"
                        data-bs-toggle="modal"
                        data-bs-target="#modalDetail"
                        data-menu="Nasi Goreng Sehat"
                        data-kategori="Makanan"
                        data-deskripsi="Nasi merah dengan sayuran organik dan protein rendah lemak. Cocok untuk diet sehat dan menjaga berat badan ideal."
                        data-kalori="420"
                        data-protein="22.0"
                        data-karbohidrat="68.5"
                        data-lemak="12.0"
                        data-serat="6.5"
                        data-porsi="1 piring (350g)"
                        data-gambar="https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                        <i class="fas fa-info-circle"></i>
                        Detail
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Modal dari file terpisah -->
@include('admin.gizi.modal-tambah')
@include('admin.gizi.modal-detail')

<script>
    // Set nama menu ke modal saat tombol diklik
    document.addEventListener('DOMContentLoaded', function() {
        // Modal Tambah Gizi
        var modalGizi = document.getElementById('modalGizi');
        if (modalGizi) {
            modalGizi.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var menuName = button.getAttribute('data-menu');
                var modalTitle = modalGizi.querySelector('.modal-title span');
                if (modalTitle) {
                    modalTitle.textContent = menuName;
                }

                // Set value nama menu di form
                var inputMenu = modalGizi.querySelector('input[name="nama_menu"]');
                if (inputMenu) {
                    inputMenu.value = menuName;
                }
            });
        }

        // Handle form submit
        var formGizi = document.getElementById('formGizi');
        if (formGizi) {
            formGizi.addEventListener('submit', function(e) {
                e.preventDefault();

                // Ambil semua data form
                var formData = new FormData(formGizi);

                // Convert ke object untuk console log (untuk testing)
                var data = {};
                formData.forEach((value, key) => {
                    data[key] = value;
                });

                console.log('Data Gizi:', data);

                alert('Data berhasil disimpan! (Mode Demo)');
                bootstrap.Modal.getInstance(modalGizi).hide();
                formGizi.reset();
            });
        }

        // Modal Detail Menu
        var modalDetail = document.getElementById('modalDetail');
        if (modalDetail) {
            modalDetail.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;

                // Ambil data dari button
                var menuName = button.getAttribute('data-menu');
                var kategori = button.getAttribute('data-kategori');
                var deskripsi = button.getAttribute('data-deskripsi');
                var kalori = button.getAttribute('data-kalori');
                var protein = button.getAttribute('data-protein');
                var karbohidrat = button.getAttribute('data-karbohidrat');
                var lemak = button.getAttribute('data-lemak');
                var serat = button.getAttribute('data-serat');
                var porsi = button.getAttribute('data-porsi');
                var gambar = button.getAttribute('data-gambar');

                // Set data ke modal
                modalDetail.querySelector('#detailNamaMenu').textContent = menuName;
                modalDetail.querySelector('#detailKategori').textContent = kategori;
                modalDetail.querySelector('#detailDeskripsi').textContent = deskripsi;
                modalDetail.querySelector('#detailKalori').textContent = kalori + ' kkal';
                modalDetail.querySelector('#detailProtein').textContent = protein + ' g';
                modalDetail.querySelector('#detailKarbohidrat').textContent = karbohidrat + ' g';
                modalDetail.querySelector('#detailLemak').textContent = lemak + ' g';
                modalDetail.querySelector('#detailSerat').textContent = serat + ' g';
                modalDetail.querySelector('#detailPorsi').textContent = porsi;
                modalDetail.querySelector('#detailGambar').src = gambar;
            });
        }
    });
</script>

@endsection