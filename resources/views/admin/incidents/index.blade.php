@extends('layouts.admin')

@section('title', 'Manage Incidents')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Incident Management</h1>
        <p class="text-slate-400">Review, investigate, and resolve resident blotters and hazard reports.</p>
    </div>
    <div class="flex gap-3">
        <div class="relative">
            <svg class="w-4 h-4 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" placeholder="Search by Case ID or Location..." class="bg-[#020617] border border-blue-900/50 text-slate-300 text-sm rounded-lg pl-9 pr-4 py-2 focus:outline-none focus:border-red-500 transition-colors w-64">
        </div>
        <select class="bg-[#020617] border border-blue-900/50 text-slate-300 text-sm rounded-lg px-4 py-2 focus:outline-none focus:border-red-500 transition-colors cursor-pointer">
            <option>All Incidents</option>
            <option>Pending Review</option>
            <option>Resolved</option>
        </select>
        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-[0_0_10px_rgba(220,38,38,0.3)] flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Export Log
        </button>
    </div>
</div>

<div class="card-bg rounded-2xl shadow-2xl overflow-hidden border-t-2 border-t-red-900/50">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-blue-900/50 bg-[#020617]/50 text-xs uppercase tracking-wider text-slate-400">
                    <th class="p-4 font-medium">Case ID</th>
                    <th class="p-4 font-medium">Reported By</th>
                    <th class="p-4 font-medium">Incident Type</th>
                    <th class="p-4 font-medium">Location</th>
                    <th class="p-4 font-medium">Date Logged</th>
                    <th class="p-4 font-medium">Status</th>
                    <th class="p-4 font-medium text-right">Admin Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-blue-900/30">
                
                <tr class="hover:bg-blue-900/10 transition-colors">
                    <td class="p-4 text-slate-500 font-mono text-xs">#INC-2099</td>
                    <td class="p-4 font-medium text-white flex items-center gap-3">
                        <img src="https://api.dicebear.com/7.x/initials/svg?seed=Marco&backgroundColor=1e3a8a&textColor=fff" class="w-8 h-8 rounded-full border border-blue-800">
                        Marco Perez
                    </td>
                    <td class="p-4 text-red-400 font-medium">Fallen Tree / Hazard</td>
                    <td class="p-4 text-slate-300">Purok 4, Main Street</td>
                    <td class="p-4 text-slate-400">30 mins ago</td>
                    <td class="p-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-500/10 text-red-400 border border-red-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-400 animate-pulse"></span> Unread
                        </span>
                    </td>
                    <td class="p-4 text-right space-x-2">
                        <button class="bg-blue-600/20 text-blue-400 hover:bg-blue-600 hover:text-white border border-blue-600/50 px-3 py-1.5 rounded text-xs font-medium transition-all">Review Details</button>
                    </td>
                </tr>

                <tr class="hover:bg-blue-900/10 transition-colors">
                    <td class="p-4 text-slate-500 font-mono text-xs">#INC-2098</td>
                    <td class="p-4 font-medium text-white flex items-center gap-3">
                        <img src="https://api.dicebear.com/7.x/initials/svg?seed=Ana&backgroundColor=1e3a8a&textColor=fff" class="w-8 h-8 rounded-full border border-blue-800">
                        Ana Dimaculangan
                    </td>
                    <td class="p-4 text-blue-300">Noise Complaint</td>
                    <td class="p-4 text-slate-300">Purok 2, Unit 4B</td>
                    <td class="p-4 text-slate-400">Yesterday</td>
                    <td class="p-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-purple-500/10 text-purple-400 border border-purple-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-purple-400"></span> Investigating
                        </span>
                    </td>
                    <td class="p-4 text-right space-x-2">
                        <button class="bg-slate-700 hover:bg-slate-600 text-white px-3 py-1.5 rounded text-xs font-medium transition-all">Update Status</button>
                    </td>
                </tr>

                <tr class="hover:bg-blue-900/10 transition-colors opacity-70">
                    <td class="p-4 text-slate-500 font-mono text-xs">#INC-2085</td>
                    <td class="p-4 font-medium text-white flex items-center gap-3">
                        <img src="https://api.dicebear.com/7.x/initials/svg?seed=Luis&backgroundColor=1e3a8a&textColor=fff" class="w-8 h-8 rounded-full border border-blue-800">
                        Luis Gonzaga
                    </td>
                    <td class="p-4 text-blue-300">Property Dispute</td>
                    <td class="p-4 text-slate-300">Purok 1</td>
                    <td class="p-4 text-slate-400">Apr 20, 2026</td>
                    <td class="p-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Resolved
                        </span>
                    </td>
                    <td class="p-4 text-right space-x-2">
                        <button class="text-slate-500 hover:text-slate-300 font-medium text-xs">View Report</button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection