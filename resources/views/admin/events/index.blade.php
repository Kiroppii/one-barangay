@extends('layouts.admin')

@section('title', 'Manage Community Events')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Community Events</h1>
        <p class="text-slate-400">Schedule barangay activities and manage resident attendance.</p>
    </div>
    <div class="flex gap-3">
        <div class="relative">
            <svg class="w-4 h-4 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" placeholder="Search events..." class="bg-[#020617] border border-blue-900/50 text-slate-300 text-sm rounded-lg pl-9 pr-4 py-2 focus:outline-none focus:border-emerald-500 transition-colors w-56">
        </div>
        <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-[0_0_10px_rgba(16,185,129,0.3)] flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Create New Event
        </button>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <div class="lg:col-span-2 card-bg rounded-2xl shadow-2xl overflow-hidden border-t-2 border-t-emerald-900/50 flex flex-col">
        <div class="p-6 border-b border-blue-900/50">
            <h3 class="font-bold text-white text-lg">Scheduled Activities</h3>
        </div>
        <div class="overflow-x-auto flex-1">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#020617]/50 text-xs uppercase tracking-wider text-slate-400">
                        <th class="p-4 font-medium">Event Name</th>
                        <th class="p-4 font-medium">Date & Time</th>
                        <th class="p-4 font-medium text-center">Registered</th>
                        <th class="p-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-blue-900/30">
                    
                    <tr class="hover:bg-blue-900/10 transition-colors">
                        <td class="p-4">
                            <div class="font-medium text-white flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                Medical & Dental Mission
                            </div>
                            <div class="text-xs text-slate-500 mt-0.5 ml-4">Barangay Covered Court</div>
                        </td>
                        <td class="p-4 text-blue-300">
                            <div>Apr 28, 2026</div>
                            <div class="text-xs text-slate-500">8:00 AM</div>
                        </td>
                        <td class="p-4 text-center">
                            <span class="inline-flex items-center justify-center bg-blue-900/30 text-blue-400 border border-blue-700/50 rounded-lg px-3 py-1 font-mono text-xs">
                                145 / 200
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <button class="bg-blue-600/20 text-blue-400 hover:bg-blue-600 hover:text-white border border-blue-600/50 px-3 py-1.5 rounded text-xs font-medium transition-all">View List</button>
                        </td>
                    </tr>

                    <tr class="hover:bg-blue-900/10 transition-colors">
                        <td class="p-4">
                            <div class="font-medium text-white flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                Relief Goods Distribution
                            </div>
                            <div class="text-xs text-slate-500 mt-0.5 ml-4">Barangay Hall Plaza</div>
                        </td>
                        <td class="p-4 text-blue-300">
                            <div>May 02, 2026</div>
                            <div class="text-xs text-slate-500">9:00 AM</div>
                        </td>
                        <td class="p-4 text-center">
                            <span class="inline-flex items-center justify-center bg-blue-900/30 text-blue-400 border border-blue-700/50 rounded-lg px-3 py-1 font-mono text-xs">
                                320 / 500
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <button class="bg-blue-600/20 text-blue-400 hover:bg-blue-600 hover:text-white border border-blue-600/50 px-3 py-1.5 rounded text-xs font-medium transition-all">View List</button>
                        </td>
                    </tr>

                    <tr class="hover:bg-blue-900/10 transition-colors opacity-70">
                        <td class="p-4">
                            <div class="font-medium text-white flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-slate-500"></span>
                                Inter-Purok Basketball
                            </div>
                            <div class="text-xs text-slate-500 mt-0.5 ml-4">Completed</div>
                        </td>
                        <td class="p-4 text-blue-300">
                            <div>Apr 10, 2026</div>
                            <div class="text-xs text-slate-500">4:00 PM</div>
                        </td>
                        <td class="p-4 text-center">
                            <span class="inline-flex items-center justify-center bg-slate-800 text-slate-400 border border-slate-700 rounded-lg px-3 py-1 font-mono text-xs">
                                128 Attended
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <button class="text-slate-500 hover:text-slate-300 font-medium text-xs">Report</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-bg rounded-2xl shadow-2xl overflow-hidden border-t-2 border-t-blue-500">
        <div class="p-6 border-b border-blue-900/50 bg-[#020617]/30">
            <h3 class="font-bold text-white text-lg flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                Walk-in Registration
            </h3>
            <p class="text-xs text-slate-400 mt-1">Manually add a resident to an event list.</p>
        </div>
        
        <form class="p-6 space-y-5">
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Select Event</label>
                <select class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-emerald-500 transition-colors">
                    <option>Medical & Dental Mission</option>
                    <option>Relief Goods Distribution</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Search Resident</label>
                <div class="relative">
                    <svg class="w-4 h-4 text-slate-500 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" placeholder="Type name or ID number..." class="w-full bg-[#020617] border border-blue-900/50 rounded-lg pl-9 pr-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-emerald-500 transition-colors">
                </div>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Registration Type</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 text-sm text-slate-300 cursor-pointer">
                        <input type="radio" name="reg_type" class="text-emerald-500 focus:ring-emerald-500 bg-[#020617] border-blue-900/50" checked>
                        Standard
                    </label>
                    <label class="flex items-center gap-2 text-sm text-slate-300 cursor-pointer">
                        <input type="radio" name="reg_type" class="text-emerald-500 focus:ring-emerald-500 bg-[#020617] border-blue-900/50">
                        Priority/Senior
                    </label>
                </div>
            </div>

            <div class="pt-2">
                <button type="button" class="w-full bg-emerald-600/20 text-emerald-400 hover:bg-emerald-600 hover:text-white border border-emerald-600/50 font-semibold rounded-lg px-4 py-2.5 transition-all flex justify-center items-center gap-2">
                    <span>Register Resident</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection