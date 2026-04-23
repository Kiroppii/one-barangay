<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Barangay | @yield('title', 'System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #020617; color: #e2e8f0; }
        .card-bg { background-color: #0f172a; border: 1px solid #1e3a8a; }
        .input-bg { background-color: #020617; border: 1px solid #1e3a8a; }
        .btn-primary { background-color: #1d4ed8; transition: all 0.3s; }
        .btn-primary:hover { background-color: #2563eb; }
        .table-row-hover:hover { background-color: rgba(30, 58, 138, 0.2); }
        .glow-text { text-shadow: 0 0 10px rgba(56, 189, 248, 0.5); }
    </style>
</head>
<body class="min-h-screen font-sans antialiased">

    <nav class="border-b border-blue-900/50 bg-[#020617]/90 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-3">
                
                <div class="flex flex-col">
                    <span class="font-bold text-2xl tracking-wider text-blue-400 glow-text leading-tight">ONE BARANGAY</span>
                    <div class="flex items-center gap-1.5 mt-0.5">
                        <span class="text-[10px] text-slate-400 uppercase tracking-widest">Powered by</span>
                        <img src="{{ asset('images/nexora-logo.png') }}" alt="Nexora Logo" class="h-4 object-contain">
                        <span class="text-[11px] font-bold text-blue-300 tracking-widest">NEXORA</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-sm text-slate-400">Welcome, Kian</span>
                    <div class="w-8 h-8 rounded-full bg-slate-700 border border-blue-500 overflow-hidden">
                        <img src="https://api.dicebear.com/7.x/initials/svg?seed=Kian&backgroundColor=020617&textColor=38bdf8" alt="Profile">
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-4 py-12">
        @yield('content')
    </main>

</body>
</html>