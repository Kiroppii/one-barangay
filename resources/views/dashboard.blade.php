@extends('layouts.app')

@section('title', 'My Dashboard')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold text-white tracking-tight">Welcome Back</h2>
    <p class="text-slate-400 text-sm">Here's an overview of your certificates and incidents.</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="card-bg rounded-xl p-6 border-t-2 border-t-blue-500 hover:-translate-y-1 transition-transform shadow-lg">
        <div class="text-slate-400 text-sm font-medium mb-1">My Certificates</div>
        <div class="text-3xl font-bold text-blue-400">3 <span class="text-slate-500 text-sm font-normal ml-2">Requested</span></div>
        <a href="/certificates" class="text-xs text-blue-400 hover:text-blue-300 mt-3 inline-block">View All &rarr;</a>
    </div>
    <div class="card-bg rounded-xl p-6 border-t-2 border-t-red-500 hover:-translate-y-1 transition-transform shadow-lg">
        <div class="text-slate-400 text-sm font-medium mb-1">My Incidents</div>
        <div class="text-3xl font-bold text-red-400">1 <span class="text-slate-500 text-sm font-normal ml-2">Reported</span></div>
        <a href="/incidents" class="text-xs text-red-400 hover:text-red-300 mt-3 inline-block">View All &rarr;</a>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <a href="/certificates/create" class="card-bg rounded-xl p-6 border border-blue-900/50 hover:border-blue-500 transition-colors cursor-pointer">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg bg-blue-900/30 flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <div>
                <h3 class="font-bold text-white">Request Certificate</h3>
                <p class="text-xs text-slate-400">Get barangay documents</p>
            </div>
        </div>
    </a>

    <a href="/incidents/create" class="card-bg rounded-xl p-6 border border-red-900/50 hover:border-red-500 transition-colors cursor-pointer">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg bg-red-900/30 flex items-center justify-center">
                <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <div>
                <h3 class="font-bold text-white">Report Incident</h3>
                <p class="text-xs text-slate-400">File a complaint or blotter</p>
            </div>
        </div>
    </a>
</div>

<!-- Recent Certificates -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="card-bg rounded-xl shadow-xl overflow-hidden flex flex-col">
        <div class="p-6 border-b border-blue-900/50 flex justify-between items-center">
            <h3 class="font-bold text-white text-lg">My Recent Certificates</h3>
            <a href="/certificates" class="text-sm text-blue-400 hover:text-blue-300">View All &rarr;</a>
        </div>
        <div class="overflow-x-auto flex-1">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#020617]/50 text-xs uppercase tracking-wider text-slate-400">
                        <th class="p-4 font-medium">Document Type</th>
                        <th class="p-4 font-medium">Status</th>
                        <th class="p-4 font-medium">Date Filed</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-blue-900/30">
                    <tr class="hover:bg-blue-900/10 transition-colors">
                        <td class="p-4 font-medium text-white">Barangay Clearance</td>
                        <td class="p-4"><span class="bg-emerald-900/40 text-emerald-300 text-xs px-2 py-1 rounded">Approved</span></td>
                        <td class="p-4 text-slate-400">Mar 15, 2026</td>
                    </tr>
                    <tr class="hover:bg-blue-900/10 transition-colors">
                        <td class="p-4 font-medium text-white">Certificate of Indigency</td>
                        <td class="p-4"><span class="bg-amber-900/40 text-amber-300 text-xs px-2 py-1 rounded">Pending</span></td>
                        <td class="p-4 text-slate-400">Apr 10, 2026</td>
                    </tr>
                    <tr class="hover:bg-blue-900/10 transition-colors">
                        <td class="p-4 font-medium text-white">Business Permit</td>
                        <td class="p-4"><span class="bg-amber-900/40 text-amber-300 text-xs px-2 py-1 rounded">Pending</span></td>
                        <td class="p-4 text-slate-400">Apr 18, 2026</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Incidents -->
    <div class="card-bg rounded-xl shadow-xl overflow-hidden flex flex-col">
        <div class="p-6 border-b border-blue-900/50 flex justify-between items-center">
            <h3 class="font-bold text-white text-lg">My Recent Incidents</h3>
            <a href="/incidents" class="text-sm text-red-400 hover:text-red-300">View All &rarr;</a>
        </div>
        <div class="overflow-x-auto flex-1">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#020617]/50 text-xs uppercase tracking-wider text-slate-400">
                        <th class="p-4 font-medium">Incident Type</th>
                        <th class="p-4 font-medium">Status</th>
                        <th class="p-4 font-medium">Date Filed</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-blue-900/30">
                    <tr class="hover:bg-blue-900/10 transition-colors">
                        <td class="p-4 font-medium text-white">Noise Complaint</td>
                        <td class="p-4"><span class="bg-blue-900/40 text-blue-300 text-xs px-2 py-1 rounded">Under Review</span></td>
                        <td class="p-4 text-slate-400">Apr 20, 2026</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection