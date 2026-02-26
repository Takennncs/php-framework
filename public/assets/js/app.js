// Custom JavaScript
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
            if (this.form) {
                const originalText = this.innerHTML;
                this.innerHTML = '<div class="loader mx-auto"></div>';
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 2000);
            }
        });
    });
    
    document.querySelectorAll('pre code').forEach(codeBlock => {
        const button = document.createElement('button');
        button.className = 'absolute top-2 right-2 px-3 py-1 bg-gray-700 text-white text-sm rounded hover:bg-gray-600 transition';
        button.innerHTML = '<i class="far fa-copy mr-1"></i>Copy';
        
        const pre = codeBlock.parentNode;
        pre.style.position = 'relative';
        pre.appendChild(button);
        
        button.addEventListener('click', async () => {
            await navigator.clipboard.writeText(codeBlock.innerText);
            button.innerHTML = '<i class="fas fa-check mr-1"></i>Copied!';
            setTimeout(() => {
                button.innerHTML = '<i class="far fa-copy mr-1"></i>Copy';
            }, 2000);
        });
    });
});