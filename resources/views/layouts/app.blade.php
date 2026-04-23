<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneBarangay Resident | @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #020617; color: #e2e8f0; }
        .card-bg { background-color: #0f172a; border: 1px solid #1e3a8a; }
        .sidebar-item:hover { background-color: rgba(30, 58, 138, 0.3); border-right: 3px solid #38bdf8; }
        .sidebar-active { background-color: rgba(30, 58, 138, 0.2); border-right: 3px solid #38bdf8; color: #60a5fa; }
        .glow-text { text-shadow: 0 0 10px rgba(56, 189, 248, 0.5); }
        .input-bg { background-color: #020617; border: 1px solid #1e3a8a; }
        .btn-primary { background-color: #1d4ed8; transition: all 0.3s; }
        .btn-primary:hover { background-color: #2563eb; }
        .table-row-hover:hover { background-color: rgba(30, 58, 138, 0.2); }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #020617; }
        ::-webkit-scrollbar-thumb { background: #1e3a8a; border-radius: 10px; }
    </style>
</head>
<body class="h-screen flex overflow-hidden font-sans antialiased">

    <aside class="w-64 bg-[#0f172a] border-r border-blue-900/50 flex flex-col shadow-2xl z-20 shrink-0">
        <div class="h-20 flex flex-col justify-center px-6 border-b border-blue-900/50">
            <span class="font-bold text-xl tracking-wider text-blue-400 glow-text leading-tight">ONE BARANGAY</span>
            <div class="flex items-center gap-2 mt-1">
                <span class="text-[9px] text-slate-400 uppercase tracking-widest">Resident Portal</span>
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto py-4">
            <div class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Dashboard</div>
            <a href="/dashboard" class="sidebar-item flex items-center gap-3 px-6 py-3 transition-colors {{ request()->is('dashboard') ? 'sidebar-active text-blue-400' : 'text-slate-400' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="font-medium">Dashboard</span>
            </a>

            <div class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 mt-6">My Services</div>
            <a href="/certificates" class="sidebar-item flex items-center gap-3 px-6 py-3 transition-colors {{ request()->is('certificates*') ? 'sidebar-active text-blue-400' : 'text-slate-400' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <span class="font-medium">Certificates</span>
            </a>
            <a href="/incidents" class="sidebar-item flex items-center gap-3 px-6 py-3 transition-colors {{ request()->is('incidents*') ? 'sidebar-active text-blue-400' : 'text-slate-400' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                <span class="font-medium">Incidents</span>
            </a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        
        <header class="h-20 card-bg flex items-center justify-between px-8 z-10 border-b-0 border-l-0 shrink-0">
            <div class="flex-1">
                <h1 class="text-lg font-semibold text-white">@yield('title', 'Dashboard')</h1>
            </div>
            <div class="flex items-center gap-6">
                <button class="text-slate-400 hover:text-blue-400 transition-colors relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </button>
                <div class="flex items-center gap-3 pl-6 border-l border-blue-900/50">
                    <div class="text-right">
                        <div class="text-sm font-bold text-white">Resident User</div>
                        <div class="text-xs text-blue-400">Community Member</div>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-slate-700 border border-blue-500 overflow-hidden shadow-[0_0_10px_rgba(37,99,235,0.4)]">
                        <img src="https://api.dicebear.com/7.x/initials/svg?seed=Resident&backgroundColor=020617&textColor=38bdf8" alt="Profile">
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-8 relative">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px] pointer-events-none z-0"></div>
            
            <div class="relative z-10">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>