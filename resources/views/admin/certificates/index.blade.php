@extends('layouts.admin')

@section('title', 'Manage Certificates')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Certificate Issuance</h1>
        <p class="text-slate-400">Review, approve, and manage resident document requests.</p>
    </div>
    <div class="flex gap-3">
        <div class="relative">
            <svg class="w-4 h-4 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" placeholder="Search Request ID or Name..." class="bg-[#020617] border border-blue-900/50 text-slate-300 text-sm rounded-lg pl-9 pr-4 py-2 focus:outline-none focus:border-blue-500 transition-colors w-56">
        </div>
        <select class="bg-[#020617] border border-blue-900/50 text-slate-300 text-sm rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500 transition-colors cursor-pointer">
            <option>All Statuses</option>
            <option>Pending Only</option>
            <option>Approved</option>
        </select>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-[0_0_10px_rgba(37,99,235,0.4)] flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Export
        </button>
    </div>
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
                
                <tr class="hover:bg-blue-900/10 transition-colors">
                    <td class="p-4 text-slate-500 font-mono text-xs">#REQ-1042</td>
                    <td class="p-4 font-medium text-white flex items-center gap-3">
                        <img src="https://api.dicebear.com/7.x/initials/svg?seed=Elena&backgroundColor=1e3a8a&textColor=fff" class="w-8 h-8 rounded-full border border-blue-800">
                        Elena Reyes
                    </td>
                    <td class="p-4 text-blue-300">Barangay Clearance</td>
                    <td class="p-4 text-slate-400">Local Employment</td>
                    <td class="p-4 text-slate-400">10 mins ago</td>
                    <td class="p-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-500/10 text-amber-400 border border-amber-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span> Pending Review
                        </span>
                    </td>
                    <td class="p-4 text-right space-x-2">
                        <button class="bg-emerald-600/20 text-emerald-400 hover:bg-emerald-600 hover:text-white border border-emerald-600/50 px-3 py-1.5 rounded text-xs font-medium transition-all">Approve</button>
                        <button class="bg-red-600/20 text-red-400 hover:bg-red-600 hover:text-white border border-red-600/50 px-3 py-1.5 rounded text-xs font-medium transition-all">Decline</button>
                    </td>
                </tr>

                <tr class="hover:bg-blue-900/10 transition-colors">
                    <td class="p-4 text-slate-500 font-mono text-xs">#REQ-1041</td>
                    <td class="p-4 font-medium text-white flex items-center gap-3">
                        <img src="https://api.dicebear.com/7.x/initials/svg?seed=Juan&backgroundColor=1e3a8a&textColor=fff" class="w-8 h-8 rounded-full border border-blue-800">
                        Juan Dela Cruz
                    </td>
                    <td class="p-4 text-blue-300">Business Permit</td>
                    <td class="p-4 text-slate-400">Renewal</td>
                    <td class="p-4 text-slate-400">2 hrs ago</td>
                    <td class="p-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Approved
                        </span>
                    </td>
                    <td class="p-4 text-right">
                        <button class="text-blue-400 hover:text-blue-300 font-medium text-xs flex items-center justify-end gap-1 w-full">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            Print Document
                        </button>
                    </td>
                </tr>

                <tr class="hover:bg-blue-900/10 transition-colors opacity-70">
                    <td class="p-4 text-slate-500 font-mono text-xs">#REQ-1035</td>
                    <td class="p-4 font-medium text-white flex items-center gap-3">
                        <img src="https://api.dicebear.com/7.x/initials/svg?seed=Maria&backgroundColor=1e3a8a&textColor=fff" class="w-8 h-8 rounded-full border border-blue-800">
                        Maria Santos
                    </td>
                    <td class="p-4 text-blue-300">Certificate of Indigency</td>
                    <td class="p-4 text-slate-400">Scholarship</td>
                    <td class="p-4 text-slate-400">Yesterday</td>
                    <td class="p-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-slate-500/10 text-slate-400 border border-slate-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Claimed
                        </span>
                    </td>
                    <td class="p-4 text-right">
                        <button class="text-slate-500 hover:text-slate-300 font-medium text-xs">View Log</button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection