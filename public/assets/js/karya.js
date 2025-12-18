const filterBtns = document.querySelectorAll('.karya-filter-btn');
        const karyaCards = document.querySelectorAll('.karya-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('karya-active'));
                btn.classList.add('karya-active');

                const filter = btn.dataset.filter;

                karyaCards.forEach(card => {
                    if (filter === 'semua' || card.dataset.category === filter) {
                        card.style.display = 'block';
                        card.style.animation = 'fadeInUp 0.5s ease';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        karyaCards.forEach(card => {
            card.addEventListener('click', () => {
                card.style.animation = 'none';
                setTimeout(() => {
                    card.style.animation = 'fadeInUp 0.3s ease';
                }, 10);
            });
        });