document.addEventListener('DOMContentLoaded', function() {
    console.log('Takenncs Framework loaded!');
    
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            const icon = this.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-times');
            }
        });
    }
    
    const searchToggle = document.getElementById('search-toggle');
    const searchBar = document.querySelector('.hidden.md\\:block');
    
    if (searchToggle && searchBar) {
        searchToggle.addEventListener('click', function() {
            searchBar.classList.toggle('hidden');
            searchBar.classList.toggle('block');
        });
    }
    
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    document.querySelectorAll('button[type="submit"]').forEach(button => {
        button.addEventListener('click', function() {
            if (this.form && !this.form.classList.contains('no-loader')) {
                const originalText = this.innerHTML;
                this.innerHTML = '<div class="loader mx-auto"></div>';
                this.disabled = true;
                
                this.dataset.originalText = originalText;
            }
        });
    });
    
    document.querySelectorAll('pre code').forEach(codeBlock => {
        const button = document.createElement('button');
        button.className = 'absolute top-2 right-2 px-3 py-1 bg-gray-700 text-white text-sm rounded hover:bg-gray-600 transition flex items-center';
        button.innerHTML = '<i class="far fa-copy mr-1"></i>Copy';
        
        const pre = codeBlock.parentNode;
        pre.style.position = 'relative';
        pre.appendChild(button);
        
        button.addEventListener('click', async () => {
            await navigator.clipboard.writeText(codeBlock.innerText);
            button.innerHTML = '<i class="fas fa-check mr-1"></i>Copied!';
            button.classList.add('bg-green-600', 'hover:bg-green-700');
            
            setTimeout(() => {
                button.innerHTML = '<i class="far fa-copy mr-1"></i>Copy';
                button.classList.remove('bg-green-600', 'hover:bg-green-700');
            }, 2000);
        });
    });
    
    document.querySelectorAll('.flash-message').forEach(message => {
        setTimeout(() => {
            message.style.transition = 'opacity 0.5s';
            message.style.opacity = '0';
            setTimeout(() => {
                message.remove();
            }, 500);
        }, 5000);
    });
    
    document.querySelectorAll('form[data-validate]').forEach(form => {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            this.querySelectorAll('[required]').forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    showFieldError(field, 'This field is required');
                }
            });
            
            this.querySelectorAll('[type="email"]').forEach(field => {
                if (field.value && !isValidEmail(field.value)) {
                    isValid = false;
                    showFieldError(field, 'Please enter a valid email address');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    });
    
    function showFieldError(field, message) {
        field.classList.add('border-red-500');
        
        let error = field.parentNode.querySelector('.field-error');
        if (!error) {
            error = document.createElement('p');
            error.className = 'field-error text-red-500 text-xs mt-1';
            field.parentNode.appendChild(error);
        }
        
        error.textContent = message;
        
        field.addEventListener('input', function() {
            this.classList.remove('border-red-500');
            const error = this.parentNode.querySelector('.field-error');
            if (error) {
                error.remove();
            }
        }, { once: true });
    }
    
    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
    
    tippy('[data-tooltip]', {
        content: (reference) => reference.getAttribute('data-tooltip'),
        animation: 'shift-away',
        theme: 'light',
    });
    
    document.querySelectorAll('[data-dropdown]').forEach(trigger => {
        const targetId = trigger.getAttribute('data-dropdown');
        const target = document.getElementById(targetId);
        
        if (target) {
            trigger.addEventListener('click', (e) => {
                e.stopPropagation();
                target.classList.toggle('hidden');
                
                setTimeout(() => {
                    document.addEventListener('click', function closeDropdown(e) {
                        if (!target.contains(e.target) && !trigger.contains(e.target)) {
                            target.classList.add('hidden');
                            document.removeEventListener('click', closeDropdown);
                        }
                    });
                }, 0);
            });
        }
    });
    
    document.querySelectorAll('[data-tabs]').forEach(tabsContainer => {
        const tabs = tabsContainer.querySelectorAll('[data-tab]');
        const contents = tabsContainer.querySelectorAll('[data-tab-content]');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const targetId = tab.getAttribute('data-tab');
                
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                
                contents.forEach(content => {
                    content.classList.add('hidden');
                    if (content.id === targetId) {
                        content.classList.remove('hidden');
                    }
                });
            });
        });
    });
    
    document.querySelectorAll('[data-accordion]').forEach(accordion => {
        const items = accordion.querySelectorAll('[data-accordion-item]');
        
        items.forEach(item => {
            const header = item.querySelector('[data-accordion-header]');
            const content = item.querySelector('[data-accordion-content]');
            
            header.addEventListener('click', () => {
                const isOpen = !content.classList.contains('hidden');
                
                if (accordion.dataset.accordion === 'single') {
                    items.forEach(otherItem => {
                        const otherContent = otherItem.querySelector('[data-accordion-content]');
                        if (otherContent !== content) {
                            otherContent.classList.add('hidden');
                            otherItem.querySelector('[data-accordion-header] i').classList.remove('fa-chevron-up');
                            otherItem.querySelector('[data-accordion-header] i').classList.add('fa-chevron-down');
                        }
                    });
                }
                
                content.classList.toggle('hidden');
                const icon = header.querySelector('i');
                if (icon) {
                    icon.classList.toggle('fa-chevron-down');
                    icon.classList.toggle('fa-chevron-up');
                }
            });
        });
    });
    
    document.querySelectorAll('[data-progress]').forEach(progress => {
        const value = progress.getAttribute('data-progress');
        progress.style.width = '0%';
        
        setTimeout(() => {
            progress.style.transition = 'width 1s ease';
            progress.style.width = value + '%';
        }, 100);
    });
    
    document.querySelectorAll('[data-countdown]').forEach(countdown => {
        const targetDate = new Date(countdown.dataset.countdown).getTime();
        
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetDate - now;
            
            if (distance < 0) {
                countdown.textContent = 'Expired';
                return;
            }
            
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            countdown.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;
        }
        
        updateCountdown();
        setInterval(updateCountdown, 1000);
    });
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    });
    
    document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img);
    });
    
    let loading = false;
    let page = 1;
    
    window.addEventListener('scroll', () => {
        if (document.querySelector('[data-infinite-scroll]')) {
            const scrollPosition = window.innerHeight + window.scrollY;
            const documentHeight = document.documentElement.scrollHeight;
            
            if (scrollPosition >= documentHeight - 200 && !loading) {
                loading = true;
                page++;
                
                fetch(`/api/posts?page=${page}`)
                    .then(response => response.json())
                    .then(data => {
                        loading = false;
                    });
            }
        }
    });
});