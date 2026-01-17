<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan - Kantin Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
</head>
<body>
    <div class="container-wrapper">
        <!-- Header Section -->
        <div class="header-section">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <div>
                    <h2 class="mb-0">Data Pelanggan</h2>
                    <p class="mb-0 opacity-90">Kelola data pelanggan kantin sekolah</p>
                </div>
                <a href="/form" class="btn btn-light mt-2 mt-md-0">
                    <i class="bi bi-plus-circle me-1"></i>Tambah Pelanggan
                </a>
            </div>
        </div>
        
       
        
        <!-- Filter Section -->
        <div class="filter-card">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control" id="searchInput" placeholder="Cari nama, NISN, atau kelas...">
                    </div>
                </div>
               
                <div class="col-md-3">
                    <button class="btn btn-primary w-100" onclick="resetFilter()">
                        <i class="bi bi-arrow-clockwise me-1"></i>Reset
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h5 class="mb-2 mb-md-0">
                    <i class="bi bi-people me-2"></i>Daftar Pelanggan
                </h5>
                <div class="text-md-end text-start">
                    <span class="badge bg-secondary">Total: 25 pelanggan</span>
                </div>
            </div>
            
            <!-- Desktop Table View -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover" id="pelangganTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>No. Telepon</th>
                                <th>Email</th>
                                <th>Waktu ditambahkan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1234567890</td>
                                <td>Verstappen</td>
                                <td>X</td>
                                <td>Teknik Mesin</td>
                                <td>081234567890</td>
                                <td>vers@gmail.com</td>
                                <td>01/11/2025</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{route('form')}}" class="btn btn-sm btn-outline-success">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="?nisn=1234567890" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                </div>
                
                <!-- Mobile Card View -->
                <div id="mobileView">
                    <!-- Mobile Card 1 -->
                    <div class="mobile-card">
                        <div class="mobile-card-item">
                            <div class="mobile-label">Nama</div>
                            <div class="mobile-value">
                                <strong>Verstappen</strong>
                            </div>
                        </div>
                        <div class="mobile-card-item">
                            <div class="mobile-label">Email</div>
                            <div class="mobile-value">vers@gmail.com</div>
                        </div>
                        <div class="mobile-card-item">
                            <div class="mobile-label">NISN</div>
                            <div class="mobile-value">1234567890</div>
                        </div>
                        <div class="mobile-card-item">
                            <div class="mobile-label">Kelas/Jurusan</div>
                            <div class="mobile-value">X/Teknik mesin</div>
                        </div>
                        <div class="mobile-card-item">
                            <div class="mobile-label">Telepon</div>
                            <div class="mobile-value">081234567890</div>
                        </div>
                        <div class="mobile-card-item">
                            <div class="mobile-label">Waktu ditambahkan</div>
                            <div class="mobile-value">01/11/2025</div>
                        </div>
                        <div class="action-buttons mt-3">
                            <a href="detail.html" class="btn btn-sm btn-outline-primary w-100 mb-1">
                                <i class="bi bi-eye me-1"></i>Detail
                            </a>
                            <a href="edit.html" class="btn btn-sm btn-outline-success w-100 mb-1">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </a>
                            <a href="transaksi.html?nisn=1234567890" class="btn btn-sm btn-outline-warning w-100">
                                <i class="bi bi-cash me-1"></i>Transaksi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="card-footer">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="mb-2 mb-md-0">Menampilkan 1 dari 25 data</div>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/table.js') }}"></script>
</body>
</html>