@extends('layouts.admin')

@section('title', 'Manage Incidents')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Incident Management</h1>
        <p class="text-slate-400">Review, investigate, and resolve resident blotters and hazard reports.</p>
    </div>
    
    <div class="flex gap-3 items-center">
        <div class="relative flex-1">
            <form method="GET" action="/admin/incidents" class="flex gap-3 items-center">
                <div class="relative flex-1">
                    <svg class="w-4 h-4 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by type or location..." class="bg-[#020617] border border-blue-900/50 text-slate-300 text-sm rounded-lg pl-9 pr-4 py-2 focus:outline-none focus:border-red-500 transition-colors w-64">
                </div>
                
                <select name="status" onchange="this.form.submit()" class="bg-[#020617] border border-blue-900/50 text-slate-300 text-sm rounded-lg px-4 py-2 focus:outline-none focus:border-red-500 transition-colors cursor-pointer">
                    <option value="All Statuses" {{ request('status') == 'All Statuses' ? 'selected' : '' }}>All Incidents</option>
                    <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending Review</option>
                    <option value="Under Investigation" {{ request('status') == 'Under Investigation' ? 'selected' : '' }}>Under Investigation</option>
                    <option value="Resolved" {{ request('status') == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                </select>
            </form>
        </div>
        
        <form method="GET" action="/admin/incidents" class="flex gap-3">
            <input type="hidden" name="search" value="{{ request('search') }}">
            <input type="hidden" name="status" value="{{ request('status') }}">
            <button type="submit" name="export" value="1" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-[0_0_10px_rgba(220,38,38,0.3)] flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Export Log
            </button>
        </form>
    </div>
</div>

@if(session('success'))
    <div class="bg-emerald-500/10 border border-emerald-500/50 text-emerald-400 px-4 py-3 rounded-lg text-sm mb-6">
        {{ session('success') }}
    </div>
@endif

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
                
                @forelse($incidents as $incident)
                    <tr class="hover:bg-blue-900/10 transition-colors {{ $incident->status === 'Resolved' ? 'opacity-70' : '' }}">
                        <td class="p-4 text-slate-500 font-mono text-xs">#INC-{{ $incident->id }}</td>
                        
                        <td class="p-4 font-medium text-white flex items-center gap-3">
                            <img src="https://api.dicebear.com/7.x/initials/svg?seed={{ urlencode($incident->user->name ?? 'U') }}&backgroundColor=1e3a8a&textColor=fff" class="w-8 h-8 rounded-full border border-blue-800">
                            {{ $incident->user->name ?? 'Unknown Resident' }}
                        </td>
                        
                        <td class="p-4 {{ $incident->incident_type == 'Fallen Tree / Hazard' ? 'text-red-400' : 'text-blue-300' }} font-medium">
                            {{ $incident->incident_type }}
                        </td>
                        
                        <td class="p-4 text-slate-300">{{ $incident->location }}</td>
                        
                        <td class="p-4 text-slate-400">{{ $incident->created_at->diffForHumans() }}</td>
                        
                        <td class="p-4">
                            @if($incident->status === 'Resolved')
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Resolved
                                </span>
                            @elseif($incident->status === 'Under Investigation')
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-purple-500/10 text-purple-400 border border-purple-500/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-purple-400 animate-pulse"></span> Investigating
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-500/10 text-red-400 border border-red-500/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-400 animate-pulse"></span> Pending
                                </span>
                            @endif
                        </td>
                        
                        <td class="p-4 text-right space-x-2 flex justify-end gap-2">
                            @if($incident->status === 'Pending')
                                <form action="/admin/incidents/{{ $incident->id }}/investigate" method="POST" class="m-0 p-0">
                                    @csrf
                                    <button type="submit" class="bg-blue-600/20 text-blue-400 hover:bg-blue-600 hover:text-white border border-blue-600/50 px-3 py-1.5 rounded text-xs font-medium transition-all">Investigate</button>
                                </form>
                            @endif

                            @if($incident->status !== 'Resolved')
                                <form action="/admin/incidents/{{ $incident->id }}/resolve" method="POST" class="m-0 p-0">
                                    @csrf
                                    <button type="submit" class="bg-emerald-600/20 text-emerald-400 hover:bg-emerald-600 hover:text-white border border-emerald-600/50 px-3 py-1.5 rounded text-xs font-medium transition-all">Resolve</button>
                                </form>
                            @else
                                <span class="text-slate-500 font-medium text-xs py-1.5">Case Closed</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-8 text-center text-slate-400">
                            No incidents found matching your criteria.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection