@extends('layouts.admin')

@section('title', 'Register Resident')

@section('content')
<div class="mb-8">
    <a href="/admin/residents" class="text-purple-400 hover:text-purple-300 text-sm font-medium flex items-center gap-2 mb-4 transition-colors">
        &larr; Back to Directory
    </a>
    <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Register New Resident</h1>
    <p class="text-slate-400">Manually create a portal account for walk-ins or residents without internet access.</p>
</div>

<div class="card-bg rounded-2xl shadow-2xl p-8 md:p-10 mx-auto max-w-3xl relative overflow-hidden border-t-2 border-t-purple-500">
    <div class="absolute -top-24 -right-24 w-48 h-48 bg-purple-900 rounded-full mix-blend-multiply filter blur-3xl opacity-20 pointer-events-none"></div>

    <form class="space-y-6 relative z-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">First Name</label>
                <input type="text" class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-4 py-3 text-sm text-slate-200 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Last Name</label>
                <input type="text" class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-4 py-3 text-sm text-slate-200 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Contact Number</label>
                <input type="text" placeholder="09XX XXX XXXX" class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-4 py-3 text-sm text-slate-200 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Purok Assignment</label>
                <select class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-4 py-3 text-sm text-slate-200 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors cursor-pointer">
                    <option disabled selected>Select Purok...</option>
                    <option>Purok 1</option>
                    <option>Purok 2</option>
                    <option>Purok 3</option>
                    <option>Purok 4</option>
                </select>
            </div>
        </div>

        <hr class="border-blue-900/50 my-6">

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Email Address</label>
            <input type="email" placeholder="name@example.com" class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-4 py-3 text-sm text-slate-200 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors">
        </div>

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Account Password</label>
            <input type="password" placeholder="Assign a temporary password..." class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-4 py-3 text-sm text-slate-200 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors">
            <p class="text-xs text-slate-500 mt-2">The resident can change this password upon their first login.</p>
        </div>

        <div class="pt-6">
            <button type="button" class="w-full bg-purple-600 hover:bg-purple-500 text-white font-bold rounded-lg px-4 py-3 shadow-[0_0_20px_rgba(147,51,234,0.4)] transition-all flex justify-center items-center gap-2">
                Create Resident Account
            </button>
        </div>
    </form>
</div>
@endsection