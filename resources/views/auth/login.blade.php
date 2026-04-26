<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexora | System Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #020617; color: #e2e8f0; }
        .card-bg { background-color: #0f172a; border: 1px solid #1e3a8a; backdrop-filter: blur(10px); }
        .input-bg { background-color: #020617; border: 1px solid #1e3a8a; }
        .glow-text { text-shadow: 0 0 15px rgba(56, 189, 248, 0.6); }
    </style>
</head>
<body class="min-h-screen font-sans antialiased flex items-center justify-center relative overflow-hidden">

    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-600/20 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-purple-600/10 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="w-full max-w-md px-6 relative z-10">
        
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-white tracking-tight glow-text mb-2">ONE BARANGAY</h1>
            <div class="flex items-center justify-center gap-2">
                <span class="text-[10px] text-slate-500 uppercase tracking-widest">Powered by</span>
                <img src="{{ asset('images/nexora-logo.png') }}" alt="Nexora" class="h-4 object-contain">
                <span class="text-[12px] font-bold text-blue-400 tracking-widest">NEXORA</span>
            </div>
        </div>

        <div class="card-bg rounded-2xl shadow-[0_0_40px_rgba(30,58,138,0.3)] p-8">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-white">Welcome back</h2>
                <p class="text-slate-400 text-sm mt-1">Enter your credentials to access the portal.</p>
            </div>

            <form action="#" class="space-y-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Email Address</label>
                    <div class="relative">
                        <svg class="w-5 h-5 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        <input type="email" placeholder="name@example.com" class="w-full input-bg rounded-lg pl-10 pr-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <label class="block text-xs font-medium text-slate-400 uppercase tracking-wider">Password</label>
                        <a href="#" class="text-xs text-blue-400 hover:text-blue-300 transition-colors">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <svg class="w-5 h-5 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        <input type="password" placeholder="••••••••" class="w-full input-bg rounded-lg pl-10 pr-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                    </div>
                </div>

                <div class="flex items-center gap-2 pt-1">
                    <input type="checkbox" id="remember" class="w-4 h-4 rounded border-blue-900/50 bg-[#020617] text-blue-600 focus:ring-blue-500 focus:ring-offset-[#0f172a]">
                    <label for="remember" class="text-sm text-slate-400 cursor-pointer">Remember me for 30 days</label>
                </div>

                <div class="pt-4">
                    <button type="button" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-lg px-4 py-3 shadow-[0_0_20px_rgba(37,99,235,0.4)] transition-all flex justify-center items-center gap-2 group">
                        Sign In
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center border-t border-blue-900/50 pt-6">
                <p class="text-sm text-slate-400">
                    Don't have a resident account? 
                    <a href="/register" class="text-blue-400 font-semibold hover:text-blue-300 transition-colors">Register here</a>
                </p>
            </div>
        </div>

        <div class="text-center mt-8 text-xs text-slate-600">
            &copy; 2026 Nexora Development Team. All rights reserved.
        </div>
    </div>

</body>
</html>