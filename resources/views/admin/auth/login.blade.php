<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Desa Jayanti</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>* { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="min-h-screen bg-gradient-to-br from-emerald-900 via-emerald-800 to-teal-900 flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <!-- Card -->
        <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl p-8">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white">Panel Admin</h1>
                <p class="text-emerald-200 text-sm mt-1">Desa Jayanti — Kabupaten Tangerang</p>
            </div>

            <!-- Error -->
            @if($errors->any())
                <div class="mb-5 bg-red-500/20 border border-red-400/30 text-red-100 rounded-xl px-4 py-3 text-sm flex items-center gap-2">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-emerald-100 text-sm font-semibold mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full bg-white/10 border border-white/20 text-white placeholder-emerald-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition"
                        placeholder="admin@jayanti.desa.id">
                </div>

                <div>
                    <label class="block text-emerald-100 text-sm font-semibold mb-2">Password</label>
                    <input type="password" name="password" required
                        class="w-full bg-white/10 border border-white/20 text-white placeholder-emerald-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded border-white/30 bg-white/10 text-emerald-500">
                    <label for="remember" class="text-sm text-emerald-200">Ingat saya</label>
                </div>

                <button type="submit"
                    class="w-full bg-emerald-500 hover:bg-emerald-400 active:bg-emerald-600 text-white font-bold py-3 px-6 rounded-xl transition-all duration-150 shadow-lg hover:shadow-emerald-500/30 text-sm">
                    Masuk ke Panel Admin
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ url('/') }}" class="text-emerald-300 hover:text-white text-xs transition">← Kembali ke Website</a>
            </div>
        </div>

        <p class="text-center text-emerald-400 text-xs mt-6">© {{ date('Y') }} Pemerintah Desa Jayanti</p>
    </div>
</body>
</html>
