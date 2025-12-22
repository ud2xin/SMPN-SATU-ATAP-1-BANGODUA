// pagination.js

function initPagination(currentPage, lastPage, baseUrl, kategori = null) {
    const container = document.getElementById('pageNumbers');
    if (!container) return;
    
    container.innerHTML = '';
    
    let startPage, endPage;
    
    if (lastPage <= 7) {
        // Jika total halaman <= 7, tampilkan semua
        startPage = 1;
        endPage = lastPage;
    } else {
        // Jika lebih dari 7 halaman, tampilkan dengan smart pagination
        if (currentPage <= 4) {
            startPage = 1;
            endPage = 5;
        } else if (currentPage >= lastPage - 3) {
            startPage = lastPage - 4;
            endPage = lastPage;
        } else {
            startPage = currentPage - 2;
            endPage = currentPage + 2;
        }
    }
    
    // Tombol halaman pertama
    if (startPage > 1) {
        addPageButton(container, 1, currentPage, baseUrl, kategori);
        if (startPage > 2) {
            addEllipsis(container);
        }
    }
    
    // Tombol halaman tengah
    for (let i = startPage; i <= endPage; i++) {
        addPageButton(container, i, currentPage, baseUrl, kategori);
    }
    
    // Tombol halaman terakhir
    if (endPage < lastPage) {
        if (endPage < lastPage - 1) {
            addEllipsis(container);
        }
        addPageButton(container, lastPage, currentPage, baseUrl, kategori);
    }
}

function addPageButton(container, page, currentPage, baseUrl, kategori = null) {
    if (page === currentPage) {
        const btn = document.createElement('button');
        btn.className = 'pagination-number active';
        btn.textContent = page;
        container.appendChild(btn);
    } else {
        const link = document.createElement('a');
        link.href = buildUrl(baseUrl, page, kategori);
        link.className = 'pagination-number';
        link.textContent = page;
        container.appendChild(link);
    }
}

function addEllipsis(container) {
    const span = document.createElement('span');
    span.textContent = '...';
    span.style.padding = '0 5px';
    span.style.color = '#6b7280';
    container.appendChild(span);
}

function buildUrl(baseUrl, page, kategori = null) {
    // Bersihkan baseUrl dari parameter page yang mungkin sudah ada
    let url = baseUrl.replace(/[?&]page=\d+/, '');
    
    // Hapus trailing ? atau & jika ada
    url = url.replace(/[?&]$/, '');
    
    // Cek apakah sudah ada query string
    const hasQuery = url.includes('?');
    
    // Tambahkan parameter page
    url += (hasQuery ? '&' : '?') + 'page=' + page;
    
    // Tambahkan parameter kategori jika ada dan bukan 'semua'
    if (kategori && kategori !== 'semua') {
        url += '&kategori=' + kategori;
    }
    
    return url;
}

// Auto-init jika ada data di window
document.addEventListener('DOMContentLoaded', function() {
    if (window.paginationData) {
        initPagination(
            window.paginationData.currentPage,
            window.paginationData.lastPage,
            window.paginationData.baseUrl,
            window.paginationData.kategori || null
        );
    }
});