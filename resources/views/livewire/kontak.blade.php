<div>
    <!-- Page Header -->
    <div class="hero-gradient pt-28 pb-16 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
            <span class="inline-flex items-center gap-1.5 bg-white/10 border border-white/20 text-emerald-300 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Kontak
            </span>
            <h1 class="text-4xl md:text-5xl font-black text-white mb-4">Hubungi Kami</h1>
            <p class="text-green-300 text-lg max-w-xl mx-auto">Informasi kontak dan lokasi kantor sekretariat Perumahan Jayanti Residence.</p>
        </div>
    </div>

    <div class="py-16 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- Contact Info -->
                <div class="space-y-5">
                    @php
                        $contacts = [
                            ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>', 'label' => 'Alamat', 'value' => 'Sekretariat Perumahan Jayanti Residence, Blok A No. 1'],
                            ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>', 'label' => 'Telepon', 'value' => '(021) 595-XXXX'],
                            ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>', 'label' => 'WhatsApp', 'value' => '0812-3456-7890'],
                            ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v10a2 2 0 002 2z"/></svg>', 'label' => 'Email', 'value' => 'info@jayantiresidence.com'],
                            ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>', 'label' => 'Jam Operasional Sekretariat', 'value' => 'Senin - Jumat: 08.00 - 16.00 WIB'],
                        ];
                    @endphp
                    @foreach($contacts as $c)
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl flex-shrink-0">{!! $c['icon'] !!}</div>
                            <div>
                                <p class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-0.5">{{ $c['label'] }}</p>
                                <p class="text-gray-900 font-semibold">{{ $c['value'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Map & Additional -->
                <div>
                    <div data-aos="fade-left" class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden mb-5">
                        <div class="bg-gray-200 h-64 flex items-center justify-center">
                            <!-- Embed Google Maps iframe here -->
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966!2d106.5!3d-6.25!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTUnMDAuMCJTIDEwNsKwMzAnMDAuMCJF!5e0!3m2!1sid!2sid!4v1"
                                class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <div class="p-5">
                            <p class="text-sm text-gray-600 text-center">📍 <strong>Sekretariat Perumahan Jayanti Residence</strong><br>Kec. Jayanti, Kab. Tangerang</p>
                        </div>
                    </div>

                    <!-- Social Media placeholder -->
                    <div data-aos="fade-left" data-aos-delay="100" class="bg-green-50 border border-green-100 rounded-2xl p-5">
                        <h3 class="font-bold text-gray-900 mb-4">Media Sosial</h3>
                        <div class="flex flex-col gap-3">
                            <a href="#" class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:border-emerald-200 hover:bg-emerald-50 transition">
                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                <span class="font-semibold text-gray-700">Facebook</span>
                            </a>
                            <a href="#" class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:border-emerald-200 hover:bg-emerald-50 transition">
                                <svg class="w-5 h-5 text-pink-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.88z"/></svg>
                                <span class="font-semibold text-gray-700">Instagram</span>
                            </a>
                            <a href="#" class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:border-emerald-200 hover:bg-emerald-50 transition">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12c0 2.115.549 4.103 1.516 5.845L.472 23.53l5.836-1.53A11.936 11.936 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.895 0-3.684-.44-5.263-1.22l-.377-.186-3.87 1.015 1.03-3.77-.203-.393C2.463 15.787 2 13.943 2 12c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10zm5.495-7.534c-.302-.15-1.785-.882-2.062-.983-.277-.101-.48-.15-.682.15-.201.302-.782.983-.958 1.184-.176.202-.353.227-.655.076-2.133-1.066-3.413-2.73-3.818-3.433-.102-.176.084-.256.248-.42.148-.15.302-.35.454-.526.15-.176.201-.301.302-.501.101-.2.05-.376-.025-.526-.076-.15-.682-1.644-.934-2.25-.246-.593-.497-.512-.682-.522-.176-.01-.376-.01-.578-.01-.202 0-.528.076-.804.377-.277.302-1.057 1.03-1.057 2.51 0 1.48 1.082 2.913 1.233 3.114.15.201 2.124 3.243 5.143 4.545 1.763.762 2.456.84 3.328.706.945-.145 2.87-1.173 3.273-2.304.402-1.13.402-2.102.277-2.303-.126-.202-.454-.302-.756-.453z"/></svg>
                                <span class="font-semibold text-gray-700">WhatsApp Community</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
