@extends('layouts.admin')

@section('title', 'Resident Records')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Resident Records</h1>
        <p class="text-slate-400">Manage registered profiles, verify identities, and handle access roles.</p>
    </div>
    <div class="flex gap-3">
        <div class="relative">
            <svg class="w-4 h-4 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" placeholder="Search residents..." class="bg-[#020617] border border-blue-900/50 text-slate-300 text-sm rounded-lg pl-9 pr-4 py-2 focus:outline-none focus:border-purple-500 transition-colors w-64">
        </div>
        
        <a href="/admin/residents/create" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-[0_0_10px_rgba(147,51,234,0.3)] flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Register Resident
        </a>
    </div>
</div>

<div class="card-bg rounded-2xl shadow-2xl overflow-hidden border-t-2 border-t-purple-600 flex flex-col">
    <div class="p-6 border-b border-blue-900/50 flex justify-between items-center bg-[#020617]/30">
        <h3 class="font-bold text-white text-lg">Registered Directory</h3>
        <span class="bg-purple-500/10 text-purple-400 border border-purple-500/20 text-xs px-2 py-1 rounded">1,248 Total</span>
    </div>
    <div class="overflow-x-auto flex-1">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#020617]/50 text-xs uppercase tracking-wider text-slate-400 border-b border-blue-900/50">
                    <th class="p-4 font-medium">Resident Details</th>
                    <th class="p-4 font-medium">Location</th>
                    <th class="p-4 font-medium text-center">Verification</th>
                    <th class="p-4 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-blue-900/30">
                <tr class="hover:bg-blue-900/10 transition-colors">
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <img src="https://api.dicebear.com/7.x/initials/svg?seed=Ralph&backgroundColor=1e3a8a&textColor=fff" class="w-10 h-10 rounded-full border border-purple-800/50">
                            <div>
                                <div class="font-medium text-white">Ralph</div>
                                <div class="text-xs text-slate-500">ralph@nexora.test</div>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 text-slate-300">
                        <div>Purok 1</div>
                        <div class="text-xs text-slate-500">Resident since 2023</div>
                    </td>
                    <td class="p-4 text-center">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-500/10 text-blue-400 border border-blue-500/20">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            Verified
                        </span>
                    </td>
                    <td class="p-4 text-right space-x-2">
                        <button class="text-purple-400 hover:text-purple-300 font-medium text-xs">View Profile</button>
                    </td>
                </tr>
                <tr class="hover:bg-blue-900/10 transition-colors">
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <img src="https://api.dicebear.com/7.x/initials/svg?seed=Gabriele&backgroundColor=1e3a8a&textColor=fff" class="w-10 h-10 rounded-full border border-amber-800/50 opacity-70">
                            <div>
                                <div class="font-medium text-white">Gabriele</div>
                                <div class="text-xs text-slate-500">gab@nexora.test</div>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 text-slate-300">
                        <div>Purok 2</div>
                        <div class="text-xs text-slate-500">Registered Today</div>
                    </td>
                    <td class="p-4 text-center">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-500/10 text-amber-400 border border-amber-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span> Pending ID
                        </span>
                    </td>
                    <td class="p-4 text-right space-x-2">
                        <button class="bg-purple-600/20 text-purple-400 hover:bg-purple-600 hover:text-white border border-purple-600/50 px-3 py-1.5 rounded text-xs font-medium transition-all">Verify Now</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection