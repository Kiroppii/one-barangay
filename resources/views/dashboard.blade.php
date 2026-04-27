@extends('layouts.app')

@section('title', 'Resident Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Welcome back, {{ Auth::user()->name }}!</h1>
    <p class="text-slate-400">Here is an overview of your barangay portal activity.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="card-bg rounded-2xl p-6 border border-blue-900/50 shadow-[0_0_20px_rgba(30,58,138,0.2)] relative overflow-hidden group">
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-500/20 transition-all"></div>
        <h3 class="text-slate-400 text-sm font-medium uppercase tracking-wider mb-1">Total Requests</h3>
        <p class="text-4xl font-bold text-white">{{ $totalRequests ?? 0 }}</p>
    </div>

    <div class="card-bg rounded-2xl p-6 border border-amber-900/30 shadow-[0_0_20px_rgba(245,158,11,0.05)] relative overflow-hidden group">
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-amber-500/10 rounded-full blur-2xl group-hover:bg-amber-500/20 transition-all"></div>
        <h3 class="text-slate-400 text-sm font-medium uppercase tracking-wider mb-1">Pending Review</h3>
        <p class="text-4xl font-bold text-amber-400">{{ $pendingRequests ?? 0 }}</p>
    </div>

    <div class="card-bg rounded-2xl p-6 border border-emerald-900/30 shadow-[0_0_20px_rgba(16,185,129,0.05)] relative overflow-hidden group">
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-emerald-500/10 rounded-full blur-2xl group-hover:bg-emerald-500/20 transition-all"></div>
        <h3 class="text-slate-400 text-sm font-medium uppercase tracking-wider mb-1">Approved Documents</h3>
        <p class="text-4xl font-bold text-emerald-400">{{ $approvedRequests ?? 0 }}</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <div class="lg:col-span-2 space-y-8">
        
        <div class="card-bg rounded-2xl shadow-[0_0_30px_rgba(30,58,138,0.15)] border border-blue-900/50 overflow-hidden">
            <div class="p-6 border-b border-blue-900/50 flex justify-between items-center bg-[#020617]/50">
                <h2 class="text-lg font-bold text-white">Recent Certificate Requests</h2>
                <a href="/certificates" class="text-sm text-blue-400 hover:text-blue-300 font-medium transition-colors">View All &rarr;</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[#020617]/80 text-xs uppercase tracking-wider text-slate-400 border-b border-blue-900/50">
                            <th class="p-4 font-medium">Document</th>
                            <th class="p-4 font-medium">Date</th>
                            <th class="p-4 font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-blue-900/30">
                        @forelse($recentCertificates ?? [] as $cert)
                            <tr class="hover:bg-blue-900/10 transition-colors">
                                <td class="p-4 font-medium text-blue-300">{{ $cert->certificate_type }}</td>
                                <td class="p-4 text-slate-400">{{ $cert->created_at->format('M d, Y') }}</td>
                                <td class="p-4">
                                    @if($cert->status === 'Pending')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-500/10 text-amber-400 border border-amber-500/20">Pending</span>
                                    @elseif($cert->status === 'Approved')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Approved</span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-red-500/10 text-red-400 border border-red-500/20">Rejected</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-8 text-center">
                                    <p class="text-slate-500 text-sm">No recent activity found. Start by requesting a document!</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-bg rounded-2xl shadow-[0_0_30px_rgba(30,58,138,0.15)] border border-blue-900/50 p-6 flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-fuchsia-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Community Events
                </h2>
                <span class="text-xs font-medium bg-fuchsia-500/10 text-fuchsia-400 border border-fuchsia-500/20 px-2.5 py-1 rounded-full">Announcements</span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                
                @php
                    /** @var \App\Models\CommunityEvent $event */
                @endphp

                @forelse($upcomingEvents ?? [] as $event)
                    <div class="bg-[#020617] border border-blue-900/50 p-4 rounded-xl relative overflow-hidden flex flex-col justify-between hover:border-fuchsia-500/50 transition-colors">
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-fuchsia-500"></div>
                        
                        <div>
                            <h4 class="text-white font-bold text-sm mb-1">{{ $event->title ?? 'Barangay Event' }}</h4>
                            <p class="text-xs text-fuchsia-400 mb-3 font-medium">{{ \Carbon\Carbon::parse($event->event_date ?? now())->format('F j, Y - g:i A') }}</p>
                        </div>
                        
                        <div class="flex items-start gap-1.5 pt-3 border-t border-blue-900/30 text-slate-400">
                            <svg class="w-3.5 h-3.5 mt-0.5 shrink-0 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="text-xs line-clamp-2">{{ $event->location ?? 'Barangay Hall' }}</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8 border border-dashed border-blue-900/50 rounded-xl bg-blue-900/5">
                        <svg class="w-8 h-8 text-slate-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="text-slate-400 text-sm font-medium">No upcoming events right now.</p>
                        <p class="text-slate-500 text-xs mt-1">Check back later for announcements!</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

    <div>
        <div class="card-bg rounded-2xl shadow-[0_0_30px_rgba(30,58,138,0.15)] border border-blue-900/50 p-6 flex flex-col h-full sticky top-6">
            <h2 class="text-lg font-bold text-white mb-4">Quick Services</h2>
            <p class="text-sm text-slate-400 mb-8">Need something from the barangay? Access our core services instantly below.</p>
            
            <div class="space-y-4">
                <a href="/certificates/create" class="flex items-center justify-between bg-blue-600/10 hover:bg-blue-600/20 border border-blue-500/30 p-4 rounded-xl transition-all group">
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-600/20 p-2 rounded-lg text-blue-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-white font-medium text-sm">Request Document</h4>
                            <p class="text-xs text-slate-500">Clearances & Permits</p>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-slate-600 group-hover:text-blue-400 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>

                <a href="/incidents/create" class="flex items-center justify-between bg-rose-600/10 hover:bg-rose-600/20 border border-rose-500/30 p-4 rounded-xl transition-all group">
                    <div class="flex items-center gap-4">
                        <div class="bg-rose-600/20 p-2 rounded-lg text-rose-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-white font-medium text-sm">Report Incident</h4>
                            <p class="text-xs text-slate-500">File a blotter or issue</p>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-slate-600 group-hover:text-rose-400 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection