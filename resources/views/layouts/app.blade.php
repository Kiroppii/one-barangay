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

    <nav class="border-b border-blue-900/50 bg-[#020617]/90 backdrop-blur-md sticky top-0 z-[60]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <div class="flex flex-col">
                    <span class="font-bold text-2xl tracking-wider text-blue-400 glow-text leading-tight">ONE BARANGAY</span>
                    <div class="flex items-center gap-1.5 mt-0.5">
                        <span class="text-[10px] text-slate-400 uppercase tracking-widest">Powered by</span>
                        <img src="{{ asset('images/nexora-logo.png') }}" alt="Nexora Logo" class="h-4 object-contain">
                        <span class="text-[11px] font-bold text-blue-300 tracking-widest">NEXORA</span>
                    </div>
                </div>

                <div class="relative group h-full flex items-center">
                    <div class="flex items-center gap-4 cursor-pointer">
                        <span class="text-sm text-slate-400">Welcome, Kian</span>
                        <div class="w-8 h-8 rounded-full bg-slate-700 border border-blue-500 overflow-hidden shadow-[0_0_10px_rgba(37,99,235,0.4)]">
                            <img src="https://api.dicebear.com/7.x/initials/svg?seed=Kian&backgroundColor=020617&textColor=38bdf8" alt="Profile">
                        </div>
                    </div>

                    <div class="absolute right-0 top-full h-4 w-48 bg-transparent z-[90]"></div>

                    <div class="absolute right-0 top-[calc(100%+0.5rem)] w-48 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[100]">
                        <div class="bg-[#0f172a] border border-blue-900/50 rounded-xl shadow-2xl p-2">
                            <a href="#" class="flex items-center gap-2 px-3 py-2 text-sm text-slate-300 hover:bg-blue-900/30 hover:text-blue-400 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                My Profile
                            </a>
                            <div class="border-t border-blue-900/50 my-1"></div>
                            <a href="/logout" class="flex items-center gap-2 px-3 py-2 text-sm text-red-400 hover:bg-red-900/30 hover:text-red-300 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Log Out
                            </a>
                        </div>
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