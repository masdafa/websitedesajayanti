<script>
    // Lightbox
    function galleryOpenLightbox(src, title, desc) {
        const lb = document.getElementById('gallery-lightbox');
        document.getElementById('gallery-lightbox-img').src = src;
        document.getElementById('gallery-lightbox-title').textContent = title;
        document.getElementById('gallery-lightbox-desc').textContent = desc;
        lb.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function galleryCloseLightbox(e) {
        const backdrop = document.getElementById('gallery-lightbox-backdrop');
        const lb = document.getElementById('gallery-lightbox');
        if (e && e.target !== lb && !backdrop.contains(e.target)) return;
        const content = lb.querySelector('.lightbox-content');
        content.style.opacity = '0';
        content.style.transform = 'scale(0.92)';
        setTimeout(() => {
            lb.classList.remove('active');
            content.style.opacity = '';
            content.style.transform = '';
            document.getElementById('gallery-lightbox-img').src = '';
            document.body.style.overflow = '';
        }, 250);
    }

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') galleryCloseLightbox();
    });
</script>
