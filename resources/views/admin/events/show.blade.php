@extends('layouts.admin')

@section('title', 'Event Registration List')

@section('content')
<div class="mb-8 flex items-center gap-4">
    <a href="{{ url('/admin/events') }}" class="text-slate-400 hover:text-white transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    </a>
    <div>
        <h1 class="text-3xl font-bold text-white mb-1 tracking-tight">{{ $event->title }}</h1>
        <p class="text-slate-400">Registration list for {{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y') }} at {{ $event->location }}</p>
    </div>
</div>

<div class="grid grid-cols-1 gap-8">
    <div class="card-bg rounded-2xl shadow-2xl overflow-hidden border-t-2 border-t-blue-500 flex flex-col">
        <div class="p-6 border-b border-blue-900/50 flex justify-between items-center">
            <h3 class="font-bold text-white text-lg">Registered Residents</h3>
            <span class="bg-blue-900/30 text-blue-400 border border-blue-700/50 rounded-lg px-3 py-1 font-mono text-sm">
                {{ $event->registrations->count() }} Total Registrations
            </span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#020617]/50 text-xs uppercase tracking-wider text-slate-400">
                        <th class="p-4 font-medium">Resident Name</th>
                        <th class="p-4 font-medium">Contact Details</th>
                        <th class="p-4 font-medium">Registration Date</th>
                        <th class="p-4 font-medium text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-blue-900/30">
                    @forelse($event->registrations as $registration)
                        <tr class="hover:bg-blue-900/10 transition-colors">
                            <td class="p-4">
                                <div class="font-medium text-white flex items-center gap-3">
                                    <img src="https://api.dicebear.com/7.x/initials/svg?seed={{ urlencode($registration->user->name) }}&backgroundColor=1e3a8a&textColor=fff" class="w-8 h-8 rounded-full border border-blue-600/50" alt="Profile">
                                    {{ $registration->user->name }}
                                </div>
                            </td>
                            <td class="p-4">
                                <div class="text-slate-300">{{ $registration->user->email }}</div>
                                <div class="text-xs text-slate-500">{{ $registration->user->contact_number ?? 'No contact number' }}</div>
                            </td>
                            <td class="p-4 text-slate-400">
                                {{ $registration->created_at->format('M d, Y') }}
                                <div class="text-xs">{{ $registration->created_at->format('g:i A') }}</div>
                            </td>
                            <td class="p-4 text-center">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider 
                                    {{ $registration->status === 'Attended' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 
                                       ($registration->status === 'Cancelled' ? 'bg-red-500/10 text-red-400 border border-red-500/20' : 'bg-blue-500/10 text-blue-400 border border-blue-500/20') }}">
                                    {{ $registration->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-12 text-center">
                                <svg class="w-12 h-12 text-slate-700 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                <p class="text-slate-500 text-sm">No residents have registered for this event yet.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
