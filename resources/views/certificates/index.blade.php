@extends('layouts.app')

@section('title', 'My Certificates')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    
    @if(session('success'))
        <div class="mb-6 bg-emerald-500/10 border border-emerald-500/50 text-emerald-400 px-4 py-3 rounded-lg flex items-center gap-3 shadow-[0_0_15px_rgba(16,185,129,0.2)]">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-500/10 border border-red-500/50 text-red-400 px-4 py-3 rounded-lg flex items-center gap-3 shadow-[0_0_15px_rgba(239,68,68,0.2)]">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="text-sm font-medium">{{ session('error') }}</span>
        </div>
    @endif
    <div class="flex justify-between items-end mb-8">
    <div>
        <h1 class="text-3xl font-bold text-white mb-2">My Requests</h1>
        <p class="text-slate-400">Track the status of your barangay documents.</p>
    </div>
    <a href="/certificates/create" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-[0_0_10px_rgba(37,99,235,0.4)]">
        + New Request
    </a>
</div>
</div>

<div class="card-bg rounded-2xl shadow-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-blue-900/50 bg-[#020617]/50 text-sm uppercase tracking-wider text-slate-400">
                    <th class="p-4 font-medium">Document Type</th>
                    <th class="p-4 font-medium">Purpose</th>
                    <th class="p-4 font-medium">Status</th>
                    <th class="p-4 font-medium text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-blue-900/50">
    @forelse($certificates as $cert)
        <tr class="hover:bg-blue-900/10 transition-colors">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-400">
                {{ $cert->certificate_type }}
            </td>
            <td class="px-6 py-4 text-sm text-slate-300">
                {{ $cert->purpose }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                @if($cert->status === 'Approved')
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        Approved
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-500/10 text-amber-400 border border-amber-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                        {{ $cert->status }}
                    </span>
                @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                @if($cert->status === 'Pending')
                    <span class="text-slate-500 italic text-xs">Processing...</span>
                @else
                    <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors">View</a>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="px-6 py-12 text-center">
                <svg class="mx-auto h-12 w-12 text-slate-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <p class="text-slate-400 text-sm">You haven't requested any documents yet.</p>
            </td>
        </tr>
    @endforelse
</tbody>
        </table>
    </div>
</div>
@endsection