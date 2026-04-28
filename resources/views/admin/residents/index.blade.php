@extends('layouts.admin')

@section('title', 'Resident Management')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Resident Management</h1>
        <p class="text-slate-400">View and manage all registered barangay residents.</p>
    </div>
    <a href="/admin/residents/create" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2.5 px-5 rounded-xl shadow-[0_0_15px_rgba(37,99,235,0.4)] transition-all flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Register New Resident
    </a>
</div>

<div class="card-bg rounded-2xl shadow-[0_0_30px_rgba(30,58,138,0.15)] border border-blue-900/50 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#020617]/80 text-xs uppercase tracking-wider text-slate-400 border-b border-blue-900/50">
                    <th class="p-4 font-medium">Resident Name</th>
                    <th class="p-4 font-medium">Email Address</th>
                    <th class="p-4 font-medium">Joined Date</th>
                    <th class="p-4 font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-blue-900/30">
                @forelse($residents as $resident)
                    <tr class="hover:bg-blue-900/10 transition-colors">
                        <td class="p-4 font-medium text-white flex items-center gap-3">
                            <img src="https://api.dicebear.com/7.x/initials/svg?seed={{ $resident->name }}&backgroundColor=1e3a8a&textColor=fff" class="w-8 h-8 rounded-full border border-blue-600">
                            {{ $resident->name }}
                        </td>
                        <td class="p-4 text-blue-300">{{ $resident->email }}</td>
                        <td class="p-4 text-slate-400">{{ $resident->created_at->format('M d, Y') }}</td>
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Verified</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-slate-500">No residents found in the system.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection