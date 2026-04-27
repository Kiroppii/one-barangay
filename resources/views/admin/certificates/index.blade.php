@extends('layouts.admin')

@section('title', 'Manage Certificates')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Certificate Issuance</h1>
        <p class="text-slate-400">Review, approve, and manage resident document requests.</p>
    </div>
    
   <form method="GET" action="/admin/certificates" class="flex gap-3">
        
        <button type="submit" class="hidden" aria-hidden="true"></button>
        
        <div class="relative">
            <svg class="w-4 h-4 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Resident or Type..." class="bg-[#020617] border border-blue-900/50 text-slate-300 text-sm rounded-lg pl-9 pr-4 py-2 focus:outline-none focus:border-blue-500 transition-colors w-56">
        </div>

        <select name="status" onchange="this.form.submit()" class="bg-[#020617] border border-blue-900/50 text-slate-300 text-sm rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500 transition-colors cursor-pointer">
            <option value="All Statuses" {{ request('status') == 'All Statuses' ? 'selected' : '' }}>All Statuses</option>
            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending Only</option>
            <option value="Approved" {{ request('status') == 'Approved' ? 'selected' : '' }}>Approved</option>
            <option value="Rejected" {{ request('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
        </select>

        <button type="submit" name="export" value="true" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-[0_0_10px_rgba(37,99,235,0.4)] flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Export
        </button>
    </form>
</div>

<div class="card-bg rounded-2xl shadow-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-blue-900/50 bg-[#020617]/50 text-xs uppercase tracking-wider text-slate-400">
                    <th class="p-4 font-medium">Req ID</th>
                    <th class="p-4 font-medium">Resident Name</th>
                    <th class="p-4 font-medium">Document Type</th>
                    <th class="p-4 font-medium">Purpose</th>
                    <th class="p-4 font-medium">Date Filed</th>
                    <th class="p-4 font-medium">Status</th>
                    <th class="p-4 font-medium text-right">Admin Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-blue-900/30">
    
    @forelse($certificates as $certificate)
    <tr class="hover:bg-blue-900/10 transition-colors">
        <td class="p-4 text-slate-500 font-mono text-xs">#REQ-{{ $certificate->id }}</td>
        
        <td class="p-4 font-medium text-white flex items-center gap-3">
            <img src="https://api.dicebear.com/7.x/initials/svg?seed={{ $certificate->user->name }}&backgroundColor=1e3a8a&textColor=fff" class="w-8 h-8 rounded-full border border-blue-800">
            {{ $certificate->user->name }}
        </td>
        
        <td class="p-4 text-blue-300">{{ $certificate->certificate_type }}</td>
        <td class="p-4 text-slate-400">{{ $certificate->purpose }}</td>
        <td class="p-4 text-slate-400">{{ $certificate->created_at->format('M d, Y') }}</td>
        
        <td class="p-4">
            @if($certificate->status === 'Pending')
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-500/10 text-amber-400 border border-amber-500/20">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span> Pending Review
                </span>
            @elseif($certificate->status === 'Approved')
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Approved
                </span>
            @else
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-500/10 text-red-400 border border-red-500/20">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span> Rejected
                </span>
            @endif
        </td>
        
        <td class="p-4 text-right">
            <a href="/admin/certificates/{{ $certificate->id }}" class="bg-blue-600/20 text-blue-400 hover:bg-blue-600 hover:text-white border border-blue-600/50 px-4 py-1.5 rounded text-xs font-medium transition-all inline-block">
                View Details
            </a>
        </td>
        </tr>
    @empty
    <tr>
        <td colspan="7" class="p-8 text-center text-slate-500 font-medium">No certificate requests found.</td>
    </tr>
    @endforelse

</tbody>
        </table>
    </div>
</div>
@endsection