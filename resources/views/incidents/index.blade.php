@extends('layouts.app')

@section('title', 'My Incident Reports')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h1 class="text-3xl font-bold text-white mb-2">Incident Reports</h1>
        <p class="text-slate-400">Track the status of the issues you have reported to the barangay.</p>
    </div>
    <a href="/incidents/create" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-[0_0_10px_rgba(37,99,235,0.4)]">
        + Report Incident
    </a>
</div>

<div class="card-bg rounded-2xl shadow-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-blue-900/50 bg-[#020617]/50 text-sm uppercase tracking-wider text-slate-400">
                    <th class="p-4 font-medium">Incident Type</th>
                    <th class="p-4 font-medium">Location</th>
                    <th class="p-4 font-medium">Date Reported</th>
                    <th class="p-4 font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-blue-900/30">
                <tr class="table-row-hover transition-colors">
                    <td class="p-4 font-medium text-blue-300">Fallen Tree / Debris</td>
                    <td class="p-4 text-slate-300">Purok 4, Main Street</td>
                    <td class="p-4 text-slate-400">Apr 21, 2026</td>
                    <td class="p-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Resolved
                        </span>
                    </td>
                </tr>
                <tr class="table-row-hover transition-colors">
                    <td class="p-4 font-medium text-blue-300">Noise Complaint</td>
                    <td class="p-4 text-slate-300">Purok 2, Near Basketball Court</td>
                    <td class="p-4 text-slate-400">Apr 23, 2026</td>
                    <td class="p-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-purple-500/10 text-purple-400 border border-purple-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-purple-400 animate-pulse"></span> Under Investigation
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection