@extends('layouts.app')

@section('title', 'Community Events')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Community Events</h1>
    <p class="text-slate-400">Stay updated with the latest happenings and announcements in our barangay.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    
    @php
        /** @var \App\Models\CommunityEvent $event */
    @endphp

    @forelse($events as $event)
        <div class="card-bg rounded-2xl shadow-[0_0_30px_rgba(30,58,138,0.15)] border border-blue-900/50 p-6 flex flex-col h-full relative overflow-hidden hover:border-fuchsia-500/50 transition-all group">
            <div class="absolute left-0 top-0 bottom-0 w-1 bg-fuchsia-500 group-hover:w-2 transition-all"></div>
            
            <div class="mb-4">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-fuchsia-500/10 text-fuchsia-400 border border-fuchsia-500/20 mb-4">Announcement</span>
                
                <h2 class="text-xl font-bold text-white mb-2 leading-tight">{{ $event->title }}</h2>
                
                <div class="flex items-center gap-2 text-fuchsia-400 text-sm font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y - g:i A') }}
                </div>
            </div>

            <div class="text-slate-300 text-sm mb-6 flex-1 leading-relaxed">
                {{ $event->description ?? 'Join us for this community event. More details to follow as the date approaches.' }}
            </div>

            <div class="flex items-start gap-2 pt-4 border-t border-blue-900/50 text-slate-400 mt-auto">
                <svg class="w-4 h-4 mt-0.5 shrink-0 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span class="text-sm">{{ $event->location ?? 'Barangay Hall' }}</span>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-16 border border-dashed border-blue-900/50 rounded-2xl bg-[#020617]/50">
            <svg class="w-16 h-16 text-slate-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <h3 class="text-xl font-bold text-white mb-2">No Events Scheduled</h3>
            <p class="text-slate-400 text-sm max-w-sm mx-auto">There are no upcoming community events or announcements at the moment. Check back later!</p>
        </div>
    @endforelse
</div>
@endsection