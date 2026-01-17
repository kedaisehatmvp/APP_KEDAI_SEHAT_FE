// filter dan pencarian
        document.getElementById('searchInput').addEventListener('input', function(e) {
            filterTable();
        });
        
        document.getElementById('filterStatus').addEventListener('change', function(e) {
            filterTable();
        });
        
        function filterTable() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('filterStatus').value;
            
            // filter untuk desktop view
            const rows = document.querySelectorAll('#pelangganTable tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const status = row.querySelector('.status-badge').textContent.toLowerCase();
                
                const matchesSearch = text.includes(searchTerm);
                const matchesStatus = !statusFilter || status.includes(statusFilter);
                
                if (matchesSearch && matchesStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
            
            // filter untuk mobile view
            const mobileCards = document.querySelectorAll('.mobile-card');
            mobileCards.forEach(card => {
                const text = card.textContent.toLowerCase();
                const status = card.querySelector('.status-badge').textContent.toLowerCase();
                
                const matchesSearch = text.includes(searchTerm);
                const matchesStatus = !statusFilter || status.includes(statusFilter);
                
                if (matchesSearch && matchesStatus) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        function resetFilter() {
            document.getElementById('searchInput').value = '';
            document.getElementById('filterStatus').value = '';
            filterTable();
        }
        
        // inisialisasi tampilan responsif
        function initResponsiveView() {
            const mobileView = document.getElementById('mobileView');
            const tableContainer = document.querySelector('.table-responsive');
            
            if (window.innerWidth <= 768) {
                if (mobileView) mobileView.style.display = 'block';
                if (tableContainer) tableContainer.style.display = 'none';
            } else {
                if (mobileView) mobileView.style.display = 'none';
                if (tableContainer) tableContainer.style.display = 'block';
            }
        }
        
        // jalankan saat load dan resize
        window.addEventListener('load', initResponsiveView);
        window.addEventListener('resize', initResponsiveView);