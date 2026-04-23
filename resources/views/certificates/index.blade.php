@extends('layouts.app')

@section('title', 'My Certificates')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h1 class="text-3xl font-bold text-white mb-2">My Requests</h1>
        <p class="text-slate-400">Track the status of your barangay documents.</p>
    </div>
    <a href="/certificates/create" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-[0_0_10px_rgba(37,99,235,0.4)]">
        + New Request
    </a>
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
            <tbody class="text-sm divide-y divide-blue-900/30">
                <tr class="table-row-hover transition-colors">
                    <td class="p-4 font-medium text-blue-300">Barangay Clearance</td>
                    <td class="p-4 text-slate-300">Local Employment</td>
                    <td class="p-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Approved
                        </span>
                    </td>
                    <td class="p-4 text-right">
                        <button class="text-blue-400 hover:text-blue-300 font-medium">View</button>
                    </td>
                </tr>
                <tr class="table-row-hover transition-colors">
                    <td class="p-4 font-medium text-blue-300">Certificate of Indigency</td>
                    <td class="p-4 text-slate-300">Scholarship</td>
                    <td class="p-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-500/10 text-amber-400 border border-amber-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span> Pending
                        </span>
                    </td>
                    <td class="p-4 text-right">
                        <button class="text-slate-500 cursor-not-allowed font-medium" disabled>Processing...</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection