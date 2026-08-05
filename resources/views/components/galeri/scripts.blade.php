<script>
    let _galleryImages = [];
    let _galleryIndex = 0;

    function galleryOpenLightbox(images, title, desc) {
        // Support both old (string) and new (array) calls
        _galleryImages = Array.isArray(images) ? images : [images];
        _galleryIndex = 0;

        const lb = document.getElementById('gallery-lightbox');
        document.getElementById('gallery-lightbox-title').textContent = title;
        document.getElementById('gallery-lightbox-desc').textContent = desc;

        _galleryRenderSlide();
        _galleryRenderThumbnails();

        lb.classList.add('active');
        document.body.style.overflow = 'hidden';

        // Animate in
        const content = lb.querySelector('.lightbox-content');
        setTimeout(() => {
            content.style.opacity = '1';
            content.style.transform = 'scale(1)';
        }, 10);
    }

    function _galleryRenderSlide() {
        const img = document.getElementById('gallery-lightbox-img');
        const counter = document.getElementById('gallery-counter');
        const prevBtn = document.getElementById('gallery-prev-btn');
        const nextBtn = document.getElementById('gallery-next-btn');

        img.style.opacity = '0';
        setTimeout(() => {
            img.src = _galleryImages[_galleryIndex];
            img.style.opacity = '1';
        }, 150);

        const total = _galleryImages.length;
        if (total > 1) {
            counter.textContent = (_galleryIndex + 1) + ' / ' + total;
            counter.classList.remove('hidden');
            prevBtn.classList.remove('hidden');
            nextBtn.classList.remove('hidden');
        } else {
            counter.classList.add('hidden');
            prevBtn.classList.add('hidden');
            nextBtn.classList.add('hidden');
        }

        // Highlight active thumbnail
        document.querySelectorAll('.gallery-thumb').forEach((el, i) => {
            el.classList.toggle('ring-2', i === _galleryIndex);
            el.classList.toggle('ring-emerald-400', i === _galleryIndex);
            el.classList.toggle('opacity-100', i === _galleryIndex);
            el.classList.toggle('opacity-50', i !== _galleryIndex);
        });
    }

    function _galleryRenderThumbnails() {
        const strip = document.getElementById('gallery-thumbnails');
        strip.innerHTML = '';
        if (_galleryImages.length <= 1) {
            strip.classList.add('hidden');
            return;
        }
        strip.classList.remove('hidden');
        _galleryImages.forEach((src, i) => {
            const btn = document.createElement('button');
            btn.onclick = (e) => { e.stopPropagation(); _galleryIndex = i; _galleryRenderSlide(); };
            btn.className = 'gallery-thumb flex-shrink-0 w-16 h-16 rounded-xl overflow-hidden transition-all ' + (i === 0 ? 'ring-2 ring-emerald-400 opacity-100' : 'opacity-50');
            const img = document.createElement('img');
            img.src = src;
            img.className = 'w-full h-full object-cover';
            btn.appendChild(img);
            strip.appendChild(btn);
        });
    }

    function gallerySlide(dir) {
        const total = _galleryImages.length;
        _galleryIndex = (_galleryIndex + dir + total) % total;
        _galleryRenderSlide();
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
        const lb = document.getElementById('gallery-lightbox');
        if (!lb.classList.contains('active')) return;
        if (e.key === 'Escape') galleryCloseLightbox();
        if (e.key === 'ArrowLeft') gallerySlide(-1);
        if (e.key === 'ArrowRight') gallerySlide(1);
    });
</script>
