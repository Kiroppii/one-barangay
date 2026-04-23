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
            <input type="text" placeholder="Search residents by name or ID..." class="bg-[#020617] border border-blue-900/50 text-slate-300 text-sm rounded-lg pl-9 pr-4 py-2 focus:outline-none focus:border-purple-500 transition-colors w-64">
        </div>
        <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-[0_0_10px_rgba(147,51,234,0.3)] flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Export Directory
        </button>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <div class="lg:col-span-2 card-bg rounded-2xl shadow-2xl overflow-hidden border-t-2 border-t-purple-600 flex flex-col">
        <div class="p-6 border-b border-blue-900/50 flex justify-between items-center">
            <h3 class="font-bold text-white text-lg">Registered Residents</h3>
            <span class="bg-purple-500/10 text-purple-400 border border-purple-500/20 text-xs px-2 py-1 rounded">1,248 Total</span>
        </div>
        <div class="overflow-x-auto flex-1">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#020617]/50 text-xs uppercase tracking-wider text-slate-400">
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
                                <img src="https://api.dicebear.com/7.x/initials/svg?seed=Mariejo&backgroundColor=1e3a8a&textColor=fff" class="w-10 h-10 rounded-full border border-purple-800/50">
                                <div>
                                    <div class="font-medium text-white">Mariejo</div>
                                    <div class="text-xs text-slate-500">mariejo@nexora.test</div>
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
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-bg rounded-2xl shadow-2xl overflow-hidden border-t-2 border-t-blue-500">
        <div class="p-6 border-b border-blue-900/50 bg-[#020617]/30">
            <h3 class="font-bold text-white text-lg flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                Register New Resident
            </h3>
            <p class="text-xs text-slate-400 mt-1">Manually create a portal account for walk-ins.</p>
        </div>
        
        <form class="p-6 space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">First Name</label>
                    <input type="text" class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-3 py-2 text-sm text-slate-200 focus:outline-none focus:border-purple-500 transition-colors">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Last Name</label>
                    <input type="text" class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-3 py-2 text-sm text-slate-200 focus:outline-none focus:border-purple-500 transition-colors">
                </div>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Email Address</label>
                <input type="email" class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-3 py-2 text-sm text-slate-200 focus:outline-none focus:border-purple-500 transition-colors">
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Account Password</label>
                <input type="password" placeholder="Assign a temporary password..." class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-3 py-2 text-sm text-slate-200 focus:outline-none focus:border-purple-500 transition-colors">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Purok</label>
                    <select class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-3 py-2 text-sm text-slate-200 focus:outline-none focus:border-purple-500 transition-colors">
                        <option>Purok 1</option>
                        <option>Purok 2</option>
                        <option>Purok 3</option>
                        <option>Purok 4</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Contact No.</label>
                    <input type="text" placeholder="09XX..." class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-3 py-2 text-sm text-slate-200 focus:outline-none focus:border-purple-500 transition-colors">
                </div>
            </div>

            <div class="pt-2">
                <button type="button" class="w-full bg-purple-600/20 text-purple-400 hover:bg-purple-600 hover:text-white border border-purple-600/50 font-semibold rounded-lg px-4 py-2.5 transition-all flex justify-center items-center gap-2">
                    <span>Create Account</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection