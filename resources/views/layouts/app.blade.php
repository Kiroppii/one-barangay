<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - One Barangay</title>
    @vite('resources/css/app.css')
    <style>
        .card-bg { background: linear-gradient(145deg, rgba(2,6,23,0.9) 0%, rgba(15,23,42,0.9) 100%); }
    </style>
</head>
<body class="bg-[#020617] text-white font-sans antialiased flex h-screen overflow-hidden">

    <aside class="w-64 bg-[#020617] border-r border-blue-900/50 flex-col hidden md:flex z-50 shadow-[4px_0_24px_rgba(30,58,138,0.2)]">
        <div class="p-6 border-b border-blue-900/50 flex items-center justify-center">
            <h2 class="text-xl font-bold tracking-widest text-white uppercase"><span class="text-blue-500">One</span>Barangay</h2>
        </div>
        
        <nav class="flex-1 p-4 space-y-2 overflow-y-auto mt-4">
            <p class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Resident Menu</p>
            
            <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->is('dashboard') ? 'bg-blue-600/20 text-blue-400 border border-blue-500/30' : 'text-slate-400 hover:bg-blue-900/20 hover:text-white transition-colors' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            
            <a href="/certificates" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->is('certificates*') ? 'bg-blue-600/20 text-blue-400 border border-blue-500/30' : 'text-slate-400 hover:bg-blue-900/20 hover:text-white transition-colors' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Certificates
            </a>

            <a href="/incidents" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->is('incidents*') ? 'bg-blue-600/20 text-blue-400 border border-blue-500/30' : 'text-slate-400 hover:bg-blue-900/20 hover:text-white transition-colors' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                Incidents
            </a>

            <a href="/events" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->is('events*') ? 'bg-blue-600/20 text-blue-400 border border-blue-500/30' : 'text-slate-400 hover:bg-blue-900/20 hover:text-white transition-colors' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Community Events
            </a>
        </nav>

        <div class="p-4 border-t border-blue-900/50">
            <a href="/logout" class="flex items-center gap-3 px-4 py-3 rounded-lg text-red-400 hover:bg-red-900/20 border border-transparent hover:border-red-900/50 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Log Out
            </a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
        <header class="h-16 border-b border-blue-900/50 flex items-center justify-end px-8 bg-[#020617]/80 backdrop-blur-md z-40 relative">
            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-white">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-blue-400">Verified Resident</p>
                </div>
                <img src="https://api.dicebear.com/7.x/initials/svg?seed={{ Auth::user()->name }}&backgroundColor=1e3a8a&textColor=fff" class="w-9 h-9 rounded-full border-2 border-blue-600 shadow-[0_0_10px_rgba(37,99,235,0.5)]">
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 md:p-10 relative">
            
            @if(session('success'))
                <div class="mb-6 bg-emerald-500/10 border border-emerald-500/50 text-emerald-400 px-4 py-3 rounded-lg flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>
</body>
</html>