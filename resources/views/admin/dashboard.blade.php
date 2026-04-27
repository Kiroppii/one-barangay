@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="mb-8 flex justify-between items-end">
    <div>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Barangay Command Center</h1>
        <p class="text-slate-400">System overview and recent activities.</p>
    </div>
    <div class="text-right">
        <p class="text-sm font-medium text-blue-400">{{ now()->format('l, F j, Y') }}</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="card-bg rounded-2xl p-6 border border-amber-900/50 shadow-[0_0_20px_rgba(245,158,11,0.1)] relative overflow-hidden group">
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-amber-500/10 rounded-full blur-2xl group-hover:bg-amber-500/20 transition-all"></div>
        <h3 class="text-slate-400 text-sm font-medium uppercase tracking-wider mb-1">Action Required</h3>
        <p class="text-4xl font-bold text-amber-400 mb-2">{{ $pendingRequests }}</p>
        <p class="text-xs text-slate-500">Pending certificate requests</p>
    </div>

    <div class="card-bg rounded-2xl p-6 border border-emerald-900/30 shadow-[0_0_20px_rgba(16,185,129,0.05)] relative overflow-hidden group">
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-emerald-500/10 rounded-full blur-2xl group-hover:bg-emerald-500/20 transition-all"></div>
        <h3 class="text-slate-400 text-sm font-medium uppercase tracking-wider mb-1">Total Issued</h3>
        <p class="text-4xl font-bold text-emerald-400 mb-2">{{ $approvedRequests }}</p>
        <p class="text-xs text-slate-500">Approved documents</p>
    </div>

    <div class="card-bg rounded-2xl p-6 border border-blue-900/30 shadow-[0_0_20px_rgba(30,58,138,0.05)] relative overflow-hidden group">
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-500/20 transition-all"></div>
        <h3 class="text-slate-400 text-sm font-medium uppercase tracking-wider mb-1">Registered Users</h3>
        <p class="text-4xl font-bold text-white mb-2">{{ $totalResidents }}</p>
        <p class="text-xs text-slate-500">Active resident accounts</p>
    </div>
</div>

<div class="card-bg rounded-2xl shadow-[0_0_30px_rgba(30,58,138,0.15)] border border-blue-900/50 overflow-hidden">
    <div class="p-6 border-b border-blue-900/50 flex justify-between items-center bg-[#020617]/50">
        <h2 class="text-lg font-bold text-white flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Live Request Feed
        </h2>
        <a href="/admin/certificates" class="text-sm text-blue-400 hover:text-blue-300 font-medium transition-colors border border-blue-900/50 px-3 py-1.5 rounded-lg hover:bg-blue-900/20">Manage All</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <tbody class="text-sm divide-y divide-blue-900/30">
                @forelse($recentRequests as $req)
                    <tr class="hover:bg-blue-900/10 transition-colors">
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <img src="https://api.dicebear.com/7.x/initials/svg?seed={{ $req->user->name }}&backgroundColor=1e3a8a&textColor=fff" class="w-8 h-8 rounded-full border border-blue-800">
                                <div>
                                    <p class="text-white font-medium">{{ $req->user->name }}</p>
                                    <p class="text-xs text-slate-500">{{ $req->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-4 text-blue-300 font-medium">{{ $req->certificate_type }}</td>
                        <td class="p-4 text-slate-400">{{ Str::limit($req->purpose, 30) }}</td>
                        <td class="p-4 text-right">
                            @if($req->status === 'Pending')
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-500/10 text-amber-400 border border-amber-500/20">Pending</span>
                            @elseif($req->status === 'Approved')
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Approved</span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-red-500/10 text-red-400 border border-red-500/20">Rejected</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-slate-500 font-medium">No activity in the system yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection