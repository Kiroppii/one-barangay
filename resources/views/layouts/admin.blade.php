<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexora Admin | @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #020617; color: #e2e8f0; }
        .card-bg { background-color: #0f172a; border: 1px solid #1e3a8a; }
        .sidebar-item:hover { background-color: rgba(30, 58, 138, 0.3); border-right: 3px solid #38bdf8; }
        .sidebar-active { background-color: rgba(30, 58, 138, 0.2); border-right: 3px solid #38bdf8; color: #60a5fa; }
        .glow-text { text-shadow: 0 0 10px rgba(56, 189, 248, 0.5); }
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
                <span class="text-[9px] text-slate-400 uppercase tracking-widest">Powered by</span>
                <img src="{{ asset('images/nexora-logo.png') }}" alt="Nexora" class="h-3 object-contain">
                <span class="text-[10px] font-bold text-blue-300 tracking-widest">NEXORA</span>
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto py-4">
            <div class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Main Menu</div>
            <a href="/admin/dashboard" class="sidebar-item flex items-center gap-3 px-6 py-3 transition-colors {{ request()->is('admin/dashboard') ? 'sidebar-active text-blue-400' : 'text-slate-400' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="font-medium">Dashboard</span>
            </a>
            <a href="/admin/certificates" class="sidebar-item flex items-center gap-3 px-6 py-3 transition-colors {{ request()->is('admin/certificates*') ? 'sidebar-active text-blue-400' : 'text-slate-400' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <span class="font-medium">Certificates</span>
            </a>
            <a href="/admin/incidents" class="sidebar-item flex items-center gap-3 px-6 py-3 transition-colors {{ request()->is('admin/incidents*') ? 'sidebar-active text-blue-400' : 'text-slate-400' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                <span class="font-medium">Blotters & Incidents</span>
            </a>
            <a href="/admin/events" class="sidebar-item flex items-center gap-3 px-6 py-3 transition-colors {{ request()->is('admin/events*') ? 'sidebar-active text-blue-400' : 'text-slate-400' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span class="font-medium">Community Events</span>
            </a>
            <a href="/admin/residents" class="sidebar-item flex items-center gap-3 px-6 py-3 transition-colors {{ request()->is('admin/residents*') ? 'sidebar-active text-blue-400' : 'text-slate-400' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span class="font-medium">Resident Records</span>
            </a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        
        <header class="h-20 card-bg flex items-center justify-between px-8 z-[60] border-b-0 border-l-0 shrink-0 relative">
            <div class="relative w-96">
                <svg class="w-5 h-5 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input type="text" placeholder="Search residents, certificates, blotters..." class="w-full bg-[#020617] border border-blue-900/50 rounded-full pl-10 pr-4 py-2 text-sm text-slate-300 focus:outline-none focus:border-blue-500 transition-colors">
            </div>
            
            <div class="flex items-center gap-6 h-full">
                <button class="text-slate-400 hover:text-blue-400 transition-colors relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                
                <div class="relative group h-full flex items-center pl-6 border-l border-blue-900/50">
                    <div class="flex items-center gap-3 cursor-pointer">
                        <div class="text-right">
                            <div class="text-sm font-bold text-white">Admin Kian</div>
                            <div class="text-xs text-blue-400">System Administrator</div>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-slate-700 border border-blue-500 overflow-hidden shadow-[0_0_10px_rgba(37,99,235,0.4)]">
                            <img src="https://api.dicebear.com/7.x/initials/svg?seed=Kian&backgroundColor=020617&textColor=38bdf8" alt="Profile">
                        </div>
                    </div>

                    <div class="absolute right-0 top-full h-4 w-48 bg-transparent z-[90]"></div>

                    <div class="absolute right-0 top-[calc(100%+0.5rem)] w-48 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[100]">
                        <div class="bg-[#0f172a] border border-blue-900/50 rounded-xl shadow-2xl p-2">
                            <a href="#" class="flex items-center gap-2 px-3 py-2 text-sm text-slate-300 hover:bg-blue-900/30 hover:text-blue-400 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                System Settings
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