<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexora | Resident Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #020617; color: #e2e8f0; }
        .card-bg { background-color: #0f172a; border: 1px solid #1e3a8a; backdrop-filter: blur(10px); }
        .input-bg { background-color: #020617; border: 1px solid #1e3a8a; }
        .glow-text { text-shadow: 0 0 15px rgba(56, 189, 248, 0.6); }
    </style>
</head>
<body class="min-h-screen font-sans antialiased flex items-center justify-center relative py-12 px-4 overflow-x-hidden">

    <div class="fixed top-[-10%] left-[-10%] w-[500px] h-[500px] bg-blue-600/20 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-purple-600/10 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="w-full max-w-2xl relative z-10">
        
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-white tracking-tight glow-text mb-2">ONE BARANGAY</h1>
            <div class="flex items-center justify-center gap-2">
                <span class="text-[10px] text-slate-500 uppercase tracking-widest">Powered by</span>
                <img src="{{ asset('images/nexora-logo.png') }}" alt="Nexora" class="h-4 object-contain">
                <span class="text-[12px] font-bold text-blue-400 tracking-widest">NEXORA</span>
            </div>
        </div>

        <div class="card-bg rounded-2xl shadow-[0_0_40px_rgba(30,58,138,0.3)] p-8 md:p-10">
            <div class="mb-8 border-b border-blue-900/50 pb-6">
                <h2 class="text-2xl font-bold text-white">Create your account</h2>
                <p class="text-slate-400 text-sm mt-1">Register for a resident portal account to request documents and report issues online.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                @if($errors->any())
                    <div class="bg-red-500/10 border border-red-500/50 text-red-400 px-4 py-3 rounded-lg text-sm mb-6">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">First Name</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Juan" class="w-full input-bg rounded-lg px-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Dela Cruz" class="w-full input-bg rounded-lg px-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Contact Number</label>
                        <div class="relative">
                            <svg class="w-5 h-5 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l2 5-2 5H3m16-10h-2l-2 5 2 5h2m-4-10h-4v10h4V5z"></path></svg>
                            <input type="tel" name="contact_number" value="{{ old('contact_number') }}" placeholder="09171234567" class="w-full input-bg rounded-lg pl-10 pr-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Birthday</label>
                        <input type="date" name="birthday" value="{{ old('birthday') }}" class="w-full input-bg rounded-lg px-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Address</label>
                    <input type="text" name="address" value="{{ old('address') }}" placeholder="123 Barangay St., City" class="w-full input-bg rounded-lg px-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Email Address</label>
                    <div class="relative">
                        <svg class="w-5 h-5 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" class="w-full input-bg rounded-lg pl-10 pr-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Password</label>
                        <div class="relative">
                            <svg class="w-5 h-5 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            <input type="password" name="password" placeholder="••••••••" class="w-full input-bg rounded-lg pl-10 pr-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Confirm Password</label>
                        <div class="relative">
                            <svg class="w-5 h-5 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            <input type="password" name="password_confirmation" placeholder="••••••••" class="w-full input-bg rounded-lg pl-10 pr-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-lg px-4 py-3 shadow-[0_0_20px_rgba(37,99,235,0.4)] transition-all flex justify-center items-center gap-2 group">
                        Register Account
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center border-t border-blue-900/50 pt-6">
                <p class="text-sm text-slate-400">
                    Already have an account? 
                    <a href="/login" class="text-blue-400 font-semibold hover:text-blue-300 transition-colors">Sign in here</a>
                </p>
            </div>
        </div>

    </div>
</body>
</html>