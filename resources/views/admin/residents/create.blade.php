@extends('layouts.app') 

@section('title', 'Register Resident')

@section('content')
<div class="mb-8">
    <a href="/admin/residents" class="text-blue-400 hover:text-white text-sm flex items-center gap-2 mb-4 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Back to Residents
    </a>
    <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Register New Resident</h1>
    <p class="text-slate-400">Manually add a resident to the system. An automated email will be sent with their login credentials.</p>
</div>

<div class="max-w-2xl card-bg rounded-2xl shadow-[0_0_30px_rgba(30,58,138,0.15)] border border-blue-900/50 p-8">
    <form action="/admin/residents" method="POST" class="space-y-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">First Name</label>
                <input type="text" name="first_name" required class="w-full bg-[#020617] border border-blue-900/50 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-blue-500 transition-colors">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Last Name</label>
                <input type="text" name="last_name" required class="w-full bg-[#020617] border border-blue-900/50 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-blue-500 transition-colors">
            </div>
        </div>

        <div>
            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Email Address</label>
            <input type="email" name="email" required class="w-full bg-[#020617] border border-blue-900/50 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-blue-500 transition-colors">
            <p class="text-xs text-slate-500 mt-2">A temporary password will be automatically generated and sent to this address.</p>
        </div>

        <div class="pt-4 border-t border-blue-900/50 flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-6 rounded-xl shadow-[0_0_15px_rgba(37,99,235,0.4)] transition-all">
                Register Resident & Send Email
            </button>
        </div>
    </form>
</div>
@endsection