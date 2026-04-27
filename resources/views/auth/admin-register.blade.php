<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #020617; color: #e2e8f0; }
        .card-bg { background-color: #0f172a; border: 1px solid #1e3a8a; backdrop-filter: blur(10px); }
        .input-bg { background-color: #020617; border: 1px solid #1e3a8a; }
    </style>
</head>
<body class="bg-[#020617] text-white font-sans antialiased min-h-screen flex items-center justify-center relative overflow-hidden">
    
    <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-blue-600/20 blur-[120px]"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-fuchsia-600/10 blur-[120px]"></div>

    <div class="w-full max-w-md p-8 bg-[#0f172a]/80 backdrop-blur-xl border border-blue-900/50 rounded-2xl shadow-[0_0_40px_rgba(30,58,138,0.3)] relative z-10">
        
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold tracking-widest text-white uppercase flex items-center justify-center gap-2">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                <span class="text-blue-500">Admin</span> Portal
            </h2>
            <p class="text-slate-400 text-sm mt-2">Authorized System Administrators Only</p>
        </div>

        <form method="POST" action="{{ route('admin.register.store') }}" class="space-y-4">
            @csrf

            @if ($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 text-red-200 px-4 py-3 rounded-lg">
                    <p class="font-semibold mb-2">Please fix the following errors:</p>
                    <ul class="list-disc list-inside space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" required class="w-full bg-[#020617] border border-blue-900/50 text-white rounded-lg px-4 py-2.5 focus:outline-none focus:border-blue-500 transition-colors">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" required class="w-full bg-[#020617] border border-blue-900/50 text-white rounded-lg px-4 py-2.5 focus:outline-none focus:border-blue-500 transition-colors">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Official Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full bg-[#020617] border border-blue-900/50 text-white rounded-lg px-4 py-2.5 focus:outline-none focus:border-blue-500 transition-colors">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Password</label>
                <input type="password" name="password" required class="w-full bg-[#020617] border border-blue-900/50 text-white rounded-lg px-4 py-2.5 focus:outline-none focus:border-blue-500 transition-colors">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="w-full bg-[#020617] border border-blue-900/50 text-white rounded-lg px-4 py-2.5 focus:outline-none focus:border-blue-500 transition-colors">
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 rounded-lg mt-6 shadow-[0_0_15px_rgba(37,99,235,0.4)] transition-all">
                Create Admin Account
            </button>
            
            <div class="text-center mt-6">
                <a href="/login" class="text-xs text-blue-400 hover:text-white transition-colors">Already have an account? Login here.</a>
            </div>
        </form>
    </div>
</body>
</html>