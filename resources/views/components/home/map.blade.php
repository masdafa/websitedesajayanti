@props(['mapImage' => null])

<section class="py-24 bg-white relative overflow-hidden" id="denah-lokasi" wire:ignore>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03]"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">
            <span class="text-emerald-600 font-bold tracking-wider uppercase text-sm mb-4 block">Denah Perumahan</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Peta Blok & Fasilitas Jayanti Residence</h2>
            <p class="text-lg text-gray-600">Klik pada blok untuk melihat detail unit rumah dan fasilitas umum.</p>
        </div>

        <div class="max-w-6xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-gray-50 p-2 md:p-4 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.12)] border border-gray-200 relative grid grid-cols-1 lg:grid-cols-4 gap-4">
                
                <!-- Sidebar Direktori -->
                <div class="lg:col-span-1 bg-white rounded-2xl border border-gray-100 p-4 shadow-sm flex flex-col h-[300px] lg:h-[700px]">
                    <h3 class="font-bold text-gray-800 text-lg mb-3 flex items-center gap-2 border-b pb-3">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                        Direktori Blok
                    </h3>
                    <div class="overflow-y-auto pr-1 flex-grow custom-scrollbar" id="block-list"></div>
                </div>

                <!-- Map Container -->
                <div class="lg:col-span-3 h-[500px] lg:h-[700px] rounded-2xl z-0 relative bg-slate-200 overflow-hidden border border-gray-200 shadow-inner">
                    <div id="interactive-housing-map" class="w-full h-full"></div>
                    
                    <div class="absolute bottom-4 right-4 z-[400] bg-black/70 backdrop-blur-md px-4 py-2 rounded-full text-white text-xs font-semibold flex items-center gap-2 pointer-events-none shadow-lg">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/></svg>
                        Klik Blok untuk Detail
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 5px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f8fafc; border-radius: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    
    .blk-pin {
        display: flex; align-items: center; justify-content: center;
        width: 26px; height: 26px; border-radius: 50%;
        border: 2px solid #fff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.4);
        font-weight: 800; font-size: 10px; color: #fff;
        transition: transform 0.2s ease;
        cursor: pointer;
        letter-spacing: -0.5px;
    }
    .blk-pin:hover { transform: scale(1.25) translateY(-3px); }
    .blk-pin.res { background: #059669; }
    .blk-pin.fsl { background: #6366f1; border-radius: 5px; }
    .blk-pin.tmn { background: #16a34a; border-radius: 5px; }
    .blk-pin.gat { background: #dc2626; }

    /* Popup profesional tanpa emoji */
    .leaflet-popup-content-wrapper { border-radius: 12px !important; }
    .map-popup { min-width: 160px; }
    .map-popup .pop-title { font-weight: 700; font-size: 15px; color: #1e293b; margin-bottom: 8px; padding-bottom: 6px; border-bottom: 2px solid #e2e8f0; }
    .map-popup .pop-row { display: flex; align-items: center; gap: 8px; font-size: 12px; color: #475569; padding: 3px 0; }
    .map-popup .pop-row svg { width: 14px; height: 14px; color: #94a3b8; flex-shrink: 0; }
    .map-popup .pop-label { color: #94a3b8; font-size: 11px; }
    .map-popup .pop-val { font-weight: 600; color: #334155; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() { initMasterplan(); });
document.addEventListener('livewire:navigated', function() { initMasterplan(); });

function initMasterplan() {
    const el = document.getElementById('interactive-housing-map');
    if (!el || el._leaflet_id) return;

    // Titik acuan NW & ukuran area
    const nwLat = -6.2174;
    const nwLng = 106.3826;
    const dLat = 0.0024;
    const dLng = 0.0030;

    function pos(x, y) {
        return [nwLat - (y / 100) * dLat, nwLng + (x / 100) * dLng];
    }

    // ========== DATA BLOK ==========
    const data = [
        // Kluster Barat-Laut
        { id:'V', nm:'Blok V', unit:28, luas:2629, xy:pos(6,4),   tp:'res' },
        { id:'U', nm:'Blok U', unit:18, luas:1120, xy:pos(16,8),  tp:'res' },
        { id:'S', nm:'Blok S', unit:22, luas:2629, xy:pos(28,6),  tp:'res' },
        { id:'T', nm:'Blok T', unit:20, luas:1120, xy:pos(22,18), tp:'res' },
        { id:'O', nm:'Blok O', unit:20, luas:4293, xy:pos(3,28),  tp:'res' },
        { id:'TM1', nm:'Taman Utara', unit:0, luas:1005, xy:pos(6,34), tp:'tmn', info:'Taman & Area Bermain' },
        { id:'P', nm:'Blok P', unit:22, luas:1442, xy:pos(14,38), tp:'res' },
        { id:'Q', nm:'Blok Q', unit:20, luas:1374, xy:pos(23,40), tp:'res' },
        { id:'R', nm:'Blok R', unit:18, luas:1252, xy:pos(34,38), tp:'res' },

        // Grid Tengah - Baris Atas
        { id:'N', nm:'Blok N', unit:21, luas:1891, xy:pos(19,48), tp:'res' },
        { id:'FS1', nm:'Fasos & Fasum', unit:0, luas:840, xy:pos(6,50), tp:'fsl', info:'Fasilitas Sosial & Umum' },
        { id:'M', nm:'Blok M', unit:11, luas:940,  xy:pos(12,54), tp:'res' },
        { id:'J', nm:'Blok J', unit:18, luas:1374, xy:pos(26,54), tp:'res' },
        { id:'I', nm:'Blok I', unit:14, luas:1097, xy:pos(38,54), tp:'res' },
        { id:'H', nm:'Blok H', unit:18, luas:1344, xy:pos(48,52), tp:'res' },

        // Grid Tengah - Baris Bawah
        { id:'FS2', nm:'Fasos & Fasum', unit:0, luas:840, xy:pos(6,58), tp:'fsl', info:'Fasilitas Sosial & Umum' },
        { id:'L', nm:'Blok L', unit:5,  luas:504,  xy:pos(12,64), tp:'res' },
        { id:'K', nm:'Blok K', unit:21, luas:1339, xy:pos(26,64), tp:'res' },
        { id:'G', nm:'Blok G', unit:21, luas:1339, xy:pos(38,64), tp:'res' },
        { id:'F', nm:'Blok F', unit:21, luas:1339, xy:pos(48,64), tp:'res' },

        // Deretan Selatan
        { id:'TM2', nm:'Taman Selatan', unit:0, luas:1005, xy:pos(42,73), tp:'tmn', info:'Taman & Ruang Terbuka' },
        { id:'E', nm:'Blok E', unit:9,  luas:775,  xy:pos(48,77), tp:'res' },
        { id:'D', nm:'Blok D', unit:6,  luas:543,  xy:pos(58,79), tp:'res' },
        { id:'C', nm:'Blok C', unit:10, luas:738,  xy:pos(68,80), tp:'res' },
        { id:'A', nm:'Blok A', unit:9,  luas:694,  xy:pos(78,80), tp:'res' },
        { id:'B', nm:'Blok B', unit:9,  luas:662,  xy:pos(78,88), tp:'res' },
        { id:'RTH', nm:'RTH', unit:0, luas:0, xy:pos(68,86), tp:'tmn', info:'Ruang Terbuka Hijau' },
        { id:'GT', nm:'Gerbang Masuk', unit:0, luas:0, xy:pos(88,94), tp:'gat', info:'Pintu Masuk Utama Perumahan' }
    ];

    // Peta
    const map = L.map('interactive-housing-map', {
        center: [nwLat - dLat * 0.45, nwLng + dLng * 0.42],
        zoom: 18, scrollWheelZoom: false, maxZoom: 20, minZoom: 16
    });

    L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 21, subdomains: ['mt0','mt1','mt2','mt3'], attribution: '&copy; Google Maps'
    }).addTo(map);

    // ========== GARIS BATAS PERUMAHAN ==========
    // Mengikuti tanda biru dari screenshot user
    // Bentuk: L-shape / polygon tidak beraturan
    L.polygon([
        pos(0, 0),       // NW corner (atas V)
        pos(34, 0),      // NE dari kluster atas (atas S)
        pos(34, 14),     // turun di kanan S
        pos(52, 14),     // geser ke kanan atas area tengah
        pos(52, 44),     // turun sisi kanan area R/H
        pos(52, 68),     // turun di kanan F
        pos(52, 72),     // belokan ke deretan selatan
        pos(84, 72),     // geser ke kanan atas area A
        pos(84, 76),     // mulai deretan selatan
        pos(94, 76),     // pojok kanan atas deretan
        pos(94, 98),     // pojok kanan bawah (gerbang)
        pos(42, 98),     // bawah RTH/Taman
        pos(42, 72),     // naik kembali ke batas grid
        pos(8, 72),      // kiri bawah grid (bawah L/Fasum)
        pos(0, 68),      // pojok kiri bawah
        pos(0, 0)        // kembali ke NW
    ], {
        color: '#38bdf8', weight: 2.5, opacity: 0.8,
        fillColor: '#38bdf8', fillOpacity: 0.06,
        dashArray: '8, 5'
    }).addTo(map);

    // ========== SVG ICONS (tanpa emoji) ==========
    var svgHome = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>';
    var svgArea = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.05 3.636a1 1 0 010 1.414 7 7 0 000 9.9 1 1 0 11-1.414 1.414 9 9 0 010-12.728 1 1 0 011.414 0zm9.9 0a1 1 0 011.414 0 9 9 0 010 12.728 1 1 0 11-1.414-1.414 7 7 0 000-9.9 1 1 0 010-1.414zM7.879 6.464a1 1 0 010 1.414 3 3 0 000 4.243 1 1 0 11-1.415 1.414 5 5 0 010-7.07 1 1 0 011.415 0zm4.242 0a1 1 0 011.415 0 5 5 0 010 7.072 1 1 0 01-1.415-1.415 3 3 0 000-4.242 1 1 0 010-1.415zM10 9a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/></svg>';
    var svgTree = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>';

    // ========== RENDER ==========
    var listEl = document.getElementById('block-list');
    if (!listEl) return;

    var sorted = data.slice().sort(function(a, b) {
        var aR = a.tp === 'res' ? 0 : 1;
        var bR = b.tp === 'res' ? 0 : 1;
        if (aR !== bR) return aR - bR;
        return a.id.localeCompare(b.id, undefined, { numeric: true });
    });

    sorted.forEach(function(b) {
        var isRes = b.tp === 'res';
        var pinLabel = isRes ? b.id : (b.tp === 'gat' ? 'G' : (b.tp === 'tmn' ? 'T' : 'F'));
        var pinClass = b.tp === 'res' ? 'res' : (b.tp === 'fsl' ? 'fsl' : (b.tp === 'tmn' ? 'tmn' : 'gat'));
        
        // Marker
        var icon = L.divIcon({
            className: 'x',
            html: '<div class="blk-pin ' + pinClass + '">' + pinLabel + '</div>',
            iconSize: [26, 26], iconAnchor: [13, 13]
        });
        var marker = L.marker(b.xy, { icon: icon }).addTo(map);
        
        // Popup Profesional (TANPA EMOJI)
        var html = '<div class="map-popup"><div class="pop-title">' + b.nm + '</div>';
        if (isRes) {
            html += '<div class="pop-row">' + svgHome + '<span class="pop-label">Jumlah Unit:</span> <span class="pop-val">' + b.unit + ' Rumah</span></div>';
            html += '<div class="pop-row">' + svgArea + '<span class="pop-label">Luas Area:</span> <span class="pop-val">' + b.luas.toLocaleString('id-ID') + ' m&sup2;</span></div>';
        } else if (b.info) {
            html += '<div class="pop-row" style="color:#64748b;">' + svgTree + '<span>' + b.info + '</span></div>';
        }
        html += '</div>';
        marker.bindPopup(html);

        // Sidebar Item (TANPA EMOJI, profesional)
        var colorClass = isRes ? 'bg-emerald-600'
            : (b.tp === 'fsl' ? 'bg-indigo-500' : (b.tp === 'tmn' ? 'bg-green-500' : 'bg-red-500'));
        
        var subtitle = isRes
            ? b.unit + ' Unit &middot; ' + b.luas.toLocaleString('id-ID') + ' m&sup2;'
            : (b.info || '');

        var item = document.createElement('div');
        item.className = 'p-2.5 mb-1.5 rounded-lg border border-gray-100 hover:border-emerald-300 hover:bg-emerald-50/50 cursor-pointer transition-all flex items-center gap-2.5 group';
        item.innerHTML = '<div class="w-7 h-7 rounded-full ' + colorClass + ' text-white flex items-center justify-center font-bold text-[10px] shrink-0">' + pinLabel + '</div>' +
            '<div class="min-w-0 flex-grow">' +
            '<h4 class="font-bold text-gray-800 text-xs leading-tight truncate">' + b.nm + '</h4>' +
            '<p class="text-[10px] text-gray-400 leading-tight mt-0.5">' + subtitle + '</p>' +
            '</div>' +
            '<svg class="w-3.5 h-3.5 text-gray-300 group-hover:text-emerald-500 ml-auto shrink-0 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>';

        item.addEventListener('click', function() {
            map.flyTo(b.xy, 19, { duration: 1 });
            setTimeout(function() { marker.openPopup(); }, 1000);
        });

        listEl.appendChild(item);
    });
}
</script>
