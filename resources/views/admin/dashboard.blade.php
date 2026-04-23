@extends('layouts.admin')

@section('title', 'Command Center')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold text-white tracking-tight">System Overview</h2>
    <p class="text-slate-400 text-sm">Real-time statistics for the barangay integration platform.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="card-bg rounded-xl p-6 border-t-2 border-t-blue-500 hover:-translate-y-1 transition-transform shadow-lg">
        <div class="text-slate-400 text-sm font-medium mb-1">Total Residents</div>
        <div class="text-3xl font-bold text-white">1,248 <span class="text-emerald-400 text-sm font-normal ml-2">↑ 12</span></div>
    </div>
    <div class="card-bg rounded-xl p-6 border-t-2 border-t-amber-500 hover:-translate-y-1 transition-transform shadow-lg">
        <div class="text-slate-400 text-sm font-medium mb-1">Pending Certificates</div>
        <div class="text-3xl font-bold text-amber-400">12 <span class="text-slate-500 text-sm font-normal ml-2">Action Req.</span></div>
    </div>
    <div class="card-bg rounded-xl p-6 border-t-2 border-t-red-500 hover:-translate-y-1 transition-transform shadow-lg">
        <div class="text-slate-400 text-sm font-medium mb-1">Active Blotters</div>
        <div class="text-3xl font-bold text-red-400">3 <span class="text-slate-500 text-sm font-normal ml-2">Reviewing</span></div>
    </div>
    <div class="card-bg rounded-xl p-6 border-t-2 border-t-emerald-500 hover:-translate-y-1 transition-transform shadow-lg">
        <div class="text-slate-400 text-sm font-medium mb-1">Upcoming Events</div>
        <div class="text-3xl font-bold text-emerald-400">2 <span class="text-slate-500 text-sm font-normal ml-2">Scheduled</span></div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <div class="lg:col-span-2 card-bg rounded-xl shadow-xl overflow-hidden flex flex-col">
        <div class="p-6 border-b border-blue-900/50 flex justify-between items-center">
            <h3 class="font-bold text-white text-lg">Action Required: Pending Certificates</h3>
            <a href="/certificates" class="text-sm text-blue-400 hover:text-blue-300">View All &rarr;</a>
        </div>
        <div class="overflow-x-auto flex-1">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#020617]/50 text-xs uppercase tracking-wider text-slate-400">
                        <th class="p-4 font-medium">Resident</th>
                        <th class="p-4 font-medium">Document Type</th>
                        <th class="p-4 font-medium">Date Filed</th>
                        <th class="p-4 font-medium text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-blue-900/30">
                    <tr class="hover:bg-blue-900/10 transition-colors">
                        <td class="p-4 font-medium text-white">Maria Santos</td>
                        <td class="p-4 text-slate-300">Barangay Clearance</td>
                        <td class="p-4 text-slate-400">2 hrs ago</td>
                        <td class="p-4 text-right">
                            <button class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1.5 rounded text-xs font-medium transition-colors">Approve</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-blue-900/10 transition-colors">
                        <td class="p-4 font-medium text-white">Juan Dela Cruz</td>
                        <td class="p-4 text-slate-300">Business Permit</td>
                        <td class="p-4 text-slate-400">5 hrs ago</td>
                        <td class="p-4 text-right">
                            <button class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1.5 rounded text-xs font-medium transition-colors">Approve</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-bg rounded-xl shadow-xl overflow-hidden">
        <div class="p-6 border-b border-blue-900/50">
            <h3 class="font-bold text-white text-lg">System Activity</h3>
        </div>
        <div class="p-6 space-y-6">
            <div class="flex gap-4">
                <div class="w-2 h-2 mt-2 rounded-full bg-blue-500 shadow-[0_0_8px_rgba(59,130,246,0.8)]"></div>
                <div>
                    <p class="text-sm text-slate-200"><span class="font-bold text-white">Jehd</span> approved a Barangay Clearance.</p>
                    <p class="text-xs text-slate-500 mt-1">10 mins ago via Workflow</p>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="w-2 h-2 mt-2 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.8)]"></div>
                <div>
                    <p class="text-sm text-slate-200"><span class="font-bold text-white">James</span> updated an Incident Report.</p>
                    <p class="text-xs text-slate-500 mt-1">45 mins ago</p>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="w-2 h-2 mt-2 rounded-full bg-purple-500 shadow-[0_0_8px_rgba(168,85,247,0.8)]"></div>
                <div>
                    <p class="text-sm text-slate-200"><span class="font-bold text-white">Igor</span> registered 5 new residents.</p>
                    <p class="text-xs text-slate-500 mt-1">2 hours ago</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection