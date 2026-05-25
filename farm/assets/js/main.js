document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Header scroll effect
    const header = document.querySelector('header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // 2. Mobile Menu Toggle
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('navMenu');
    
    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('open');
            const icon = menuToggle.querySelector('i');
            if (navMenu.classList.contains('open')) {
                icon.setAttribute('data-lucide', 'x');
            } else {
                icon.setAttribute('data-lucide', 'menu');
            }
            lucide.createIcons();
        });

        // Close menu when clicking link
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('open');
                const icon = menuToggle.querySelector('i');
                icon.setAttribute('data-lucide', 'menu');
                lucide.createIcons();
            });
        });
    }

    // 3. Cattle Marketplace Dataset
    const cattleData = CATTLE_DATA.map(item => {
        const imgs = [BASE_URL + item.image_main];
        if (item.image_gallery1) imgs.push(BASE_URL + item.image_gallery1);
        if (item.image_gallery2) imgs.push(BASE_URL + item.image_gallery2);
        return {
            id: "cow-" + item.id,
            name: item.name,
            breed: item.breed,
            weight: item.weight,
            age: item.age,
            status: item.status,
            price: item.price,
            health: item.health,
            location: item.location,
            description: item.description,
            images: imgs
        };
    });

    // 4. Katalog Filter Logic
    const filterButtons = document.querySelectorAll('.filter-btn');
    const catalogCards = document.querySelectorAll('.katalog-card');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const filterValue = this.dataset.filter;
            
            catalogCards.forEach(card => {
                const status = card.dataset.status;
                if (filterValue === 'all' || status === filterValue) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // 5. Interactive Detail Modal (Marketplace Detail View)
    const detailButtons = document.querySelectorAll('.btn-detail');
    const modalOverlay = document.getElementById('detailModal');
    const modalCloseBtn = document.getElementById('modalCloseBtn');
    
    // Modal Element references
    const detailMainImg = document.getElementById('detailMainImg');
    const thumbGrid = document.getElementById('detailThumbGrid');
    const detailTitle = document.getElementById('detailTitle');
    const detailPrice = document.getElementById('detailPrice');
    const detailDesc = document.getElementById('detailDesc');
    const detailBreed = document.getElementById('detailBreed');
    const detailWeight = document.getElementById('detailWeight');
    const detailAge = document.getElementById('detailAge');
    const detailHealth = document.getElementById('detailHealth');
    const detailLocation = document.getElementById('detailLocation');
    const detailStatusBadge = document.getElementById('detailStatusBadge');
    const detailCtaBtn = document.getElementById('detailCtaBtn');

    // Open Modal
    detailButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const cowId = this.dataset.cowId;
            const data = cattleData.find(item => item.id === cowId);
            
            if (data) {
                // Populate Modal Data
                detailMainImg.src = data.images[0];
                detailMainImg.alt = data.name;
                
                // Clear and render Thumbnails
                thumbGrid.innerHTML = '';
                data.images.forEach((imgUrl, index) => {
                    const thumb = document.createElement('div');
                    thumb.className = `detail-thumb-item ${index === 0 ? 'active' : ''}`;
                    thumb.innerHTML = `<img src="${imgUrl}" alt="${data.name} Gallery ${index+1}" class="detail-thumb-img">`;
                    
                    // Hover/Click to change Main Photo
                    const updatePhoto = () => {
                        document.querySelectorAll('.detail-thumb-item').forEach(t => t.classList.remove('active'));
                        thumb.classList.add('active');
                        detailMainImg.src = imgUrl;
                    };
                    thumb.addEventListener('click', updatePhoto);
                    thumb.addEventListener('mouseenter', updatePhoto);
                    
                    thumbGrid.appendChild(thumb);
                });

                detailTitle.textContent = data.name;
                detailPrice.textContent = data.price;
                detailDesc.textContent = data.description;
                
                detailBreed.textContent = data.breed;
                detailWeight.textContent = data.weight;
                detailAge.textContent = data.age;
                detailHealth.textContent = data.health;
                detailLocation.textContent = data.location;
                
                // Update Status Badge
                detailStatusBadge.textContent = data.status === 'tersedia' ? 'Tersedia' : 'Terjual';
                detailStatusBadge.className = `detail-status-badge ${data.status}`;
                
                // Pre-fill WhatsApp Inquiry Text
                const waNumber = "6285210171587";
                const waMessage = encodeURIComponent(`Halo Twin Farms, saya tertarik dengan sapi ${data.name} (${data.breed}) seberat ${data.weight} dengan harga ${data.price}. Apakah sapi ini masih tersedia dan bisa saya tinjau langsung?`);
                detailCtaBtn.href = `https://wa.me/${waNumber}?text=${waMessage}`;


                // Open Modal with Smooth Animation
                modalOverlay.style.display = 'flex';
                // Trigger reflow
                modalOverlay.offsetHeight;
                modalOverlay.classList.add('open');
                document.body.style.overflow = 'hidden'; // Lock background scroll
            }
        });
    });

    // Close Modal
    const closeModal = () => {
        modalOverlay.classList.remove('open');
        setTimeout(() => {
            modalOverlay.style.display = 'none';
            document.body.style.overflow = ''; // Restore scroll
        }, 300);
    };

    if (modalCloseBtn) {
        modalCloseBtn.addEventListener('click', closeModal);
    }
    
    if (modalOverlay) {
        modalOverlay.addEventListener('click', function(e) {
            if (e.target === modalOverlay) {
                closeModal();
            }
        });
    }

    // Close on Escape Key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modalOverlay && modalOverlay.classList.contains('open')) {
            closeModal();
        }
    });

    // 6. Contact Form Submission Toast Simulation
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('formName').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalContent = submitBtn.innerHTML;
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = `<i data-lucide="loader" class="animate-spin"></i> Mengirim...`;
            lucide.createIcons();
            
            setTimeout(() => {
                submitBtn.innerHTML = `<i data-lucide="check-circle"></i> Pesan Terkirim!`;
                submitBtn.style.background = '#10B981';
                lucide.createIcons();
                
                createNotification(`Terima kasih ${name}, pesan Anda telah kami terima. Kami akan menghubungi Anda kembali segera!`, 'success');
                contactForm.reset();
                
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalContent;
                    submitBtn.style.background = '';
                    lucide.createIcons();
                }, 4000);
                
            }, 1500);
        });
    }

    // Floating Notification Helper
    window.createNotification = function(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = 'glass-panel notification-toast';
        toast.style.position = 'fixed';
        toast.style.bottom = '2rem';
        toast.style.right = '2rem';
        toast.style.zIndex = '99999';
        toast.style.padding = '1rem 1.5rem';
        toast.style.borderRadius = '16px';
        toast.style.borderLeft = `4px solid ${type === 'success' ? '#1B4332' : '#C62828'}`;
        toast.style.background = '#FFFFFF';
        toast.style.borderTop = '1px solid rgba(0,0,0,0.05)';
        toast.style.borderRight = '1px solid rgba(0,0,0,0.05)';
        toast.style.borderBottom = '1px solid rgba(0,0,0,0.05)';
        toast.style.display = 'flex';
        toast.style.alignItems = 'center';
        toast.style.gap = '0.75rem';
        toast.style.maxWidth = '380px';
        toast.style.boxShadow = '0 20px 40px rgba(27, 67, 50, 0.08)';
        toast.style.transform = 'translateY(100px)';
        toast.style.opacity = '0';
        toast.style.transition = 'all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        
        toast.innerHTML = `
            <i data-lucide="check-circle" style="color: #1B4332; flex-shrink: 0;"></i>
            <span style="font-size: 0.9rem; font-weight: 600; color: #112217;">${message}</span>
        `;
        
        document.body.appendChild(toast);
        lucide.createIcons();
        
        toast.offsetHeight; // reflow
        toast.style.transform = 'translateY(0)';
        toast.style.opacity = '1';
        
        setTimeout(() => {
            toast.style.transform = 'translateY(100px)';
            toast.style.opacity = '0';
            setTimeout(() => {
                toast.remove();
            }, 500);
        }, 5000);
    }

    // ----------------------------------------------------
    // Mengapa Memilih Kami? Carousel Slider Logic
    // ----------------------------------------------------
    const sliderTrack = document.getElementById('featuresSliderTrack');
    const prevBtn = document.getElementById('sliderPrevBtn');
    const nextBtn = document.getElementById('sliderNextBtn');
    const dotsContainer = document.getElementById('sliderDots');
    
    if (sliderTrack && prevBtn && nextBtn && dotsContainer) {
        const cards = sliderTrack.querySelectorAll('.feature-card');
        const cardCount = cards.length;
        let currentIndex = 0;
        let cardsPerView = 3;
        
        function updateCardsPerView() {
            if (window.innerWidth <= 768) {
                cardsPerView = 1;
            } else if (window.innerWidth <= 992) {
                cardsPerView = 2;
            } else {
                cardsPerView = 3;
            }
        }
        
        function createDots() {
            dotsContainer.innerHTML = '';
            const maxIndex = Math.max(0, cardCount - cardsPerView + 1);
            for (let i = 0; i < maxIndex; i++) {
                const dot = document.createElement('div');
                dot.classList.add('slider-dot');
                if (i === currentIndex) dot.classList.add('active');
                dot.addEventListener('click', () => {
                    currentIndex = i;
                    slide();
                });
                dotsContainer.appendChild(dot);
            }
        }
        
        function slide() {
            const maxIndex = Math.max(0, cardCount - cardsPerView);
            if (currentIndex > maxIndex) {
                currentIndex = maxIndex;
            }
            if (currentIndex < 0) {
                currentIndex = 0;
            }
            
            // Calculate slide translation
            const cardWidth = cards[0].offsetWidth;
            const gap = 24; // 1.5rem = 24px
            const translateVal = currentIndex * (cardWidth + gap);
            sliderTrack.style.transform = `translateX(-${translateVal}px)`;
            
            // Update buttons disabled state
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex >= maxIndex;
            
            // Update dots
            const dots = dotsContainer.querySelectorAll('.slider-dot');
            dots.forEach((dot, idx) => {
                if (idx === currentIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }
        
        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                slide();
            }
        });
        
        nextBtn.addEventListener('click', () => {
            const maxIndex = Math.max(0, cardCount - cardsPerView);
            if (currentIndex < maxIndex) {
                currentIndex++;
                slide();
            }
        });
        
        window.addEventListener('resize', () => {
            const oldPerView = cardsPerView;
            updateCardsPerView();
            if (oldPerView !== cardsPerView) {
                createDots();
                slide();
            } else {
                slide();
            }
        });
        
        // Init
        updateCardsPerView();
        createDots();
        slide();
        
        // Touch events for mobile swiping
        let startX = 0;
        let isSwiping = false;
        
        sliderTrack.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            isSwiping = true;
        }, { passive: true });
        
        sliderTrack.addEventListener('touchend', (e) => {
            if (!isSwiping) return;
            const endX = e.changedTouches[0].clientX;
            const diffX = startX - endX;
            const maxIndex = Math.max(0, cardCount - cardsPerView);
            
            if (Math.abs(diffX) > 50) { // minimum threshold for swipe
                if (diffX > 0 && currentIndex < maxIndex) {
                    currentIndex++;
                } else if (diffX < 0 && currentIndex > 0) {
                    currentIndex--;
                }
                slide();
            }
            isSwiping = false;
        }, { passive: true });
    }
});
