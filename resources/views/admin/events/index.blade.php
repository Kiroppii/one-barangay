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
        <button onclick="document.getElementById('createEventModal').classList.remove('hidden')" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-[0_0_10px_rgba(16,185,129,0.3)] flex items-center gap-2">
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
                    @forelse($events as $event)
                        <tr class="hover:bg-blue-900/10 transition-colors">
                            <td class="p-4">
                                <div class="font-medium text-white flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full {{ \Carbon\Carbon::parse($event->event_date)->isPast() ? 'bg-slate-500' : 'bg-emerald-400 animate-pulse' }}"></span>
                                    {{ $event->title }}
                                </div>
                                <div class="text-xs text-slate-500 mt-0.5 ml-4">{{ $event->location }}</div>
                            </td>
                            <td class="p-4 text-blue-300">
                                <div>{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</div>
                                <div class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($event->event_date)->format('g:i A') }}</div>
                            </td>
                            <td class="p-4 text-center">
                                <span class="inline-flex items-center justify-center bg-blue-900/30 text-blue-400 border border-blue-700/50 rounded-lg px-3 py-1 font-mono text-xs">
                                    {{ $event->registrations_count }} Registered
                                </span>
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <button type="button" onclick="setEvent({{ $event->id }})" class="bg-emerald-600/20 text-emerald-400 hover:bg-emerald-600 hover:text-white border border-emerald-600/50 px-3 py-1.5 rounded text-xs font-medium transition-all">Register</button>
                                <a href="{{ route('admin.events.show', $event->id) }}" class="bg-blue-600/20 text-blue-400 hover:bg-blue-600 hover:text-white border border-blue-600/50 px-3 py-1.5 rounded text-xs font-medium transition-all">View List</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-slate-500">No events found.</td>
                        </tr>
                    @endforelse
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
        
        <form action="{{ url('/admin/events/register') }}" method="POST" class="p-6 space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Select Event</label>
                <select name="community_event_id" required class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-emerald-500 transition-colors">
                    <option value="" disabled selected>Choose an event...</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Search Resident</label>
                <div class="relative">
                    <svg class="w-4 h-4 text-slate-500 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" id="residentSearch" list="residentList" placeholder="Type name..." class="w-full bg-[#020617] border border-blue-900/50 rounded-lg pl-9 pr-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-emerald-500 transition-colors">
                    <input type="hidden" name="user_id" id="resident_id">
                    <datalist id="residentList">
                        @foreach($residents as $resident)
                            <option data-id="{{ $resident->id }}" value="{{ $resident->name }} ({{ $resident->email }})"></option>
                        @endforeach
                    </datalist>
                </div>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Registration Type</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 text-sm text-slate-300 cursor-pointer">
                        <input type="radio" name="reg_type" value="Standard" class="text-emerald-500 focus:ring-emerald-500 bg-[#020617] border-blue-900/50" checked>
                        Standard
                    </label>
                    <label class="flex items-center gap-2 text-sm text-slate-300 cursor-pointer">
                        <input type="radio" name="reg_type" value="Priority" class="text-emerald-500 focus:ring-emerald-500 bg-[#020617] border-blue-900/50">
                        Priority/Senior
                    </label>
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-emerald-600/20 text-emerald-400 hover:bg-emerald-600 hover:text-white border border-emerald-600/50 font-semibold rounded-lg px-4 py-2.5 transition-all flex justify-center items-center gap-2">
                    <span>Register Resident</span>
                </button>
            </div>
        </form>

        <script>
             function setEvent(eventId) {
                 const select = document.querySelector('select[name="community_event_id"]');
                 select.value = eventId;
                 document.getElementById('residentSearch').focus();
             }

             document.getElementById('residentSearch').addEventListener('input', function(e) {
                const val = e.target.value;
                const options = document.querySelectorAll('#residentList option');
                let found = false;
                
                for (let i = 0; i < options.length; i++) {
                    if (options[i].value === val) {
                        document.getElementById('resident_id').value = options[i].getAttribute('data-id');
                        found = true;
                        break;
                    }
                }
                
                if (!found) {
                    document.getElementById('resident_id').value = '';
                }
            });
        </script>
    </div>
</div>

<!-- Create Event Modal -->
<div id="createEventModal" class="fixed inset-0 z-[100] hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-slate-950/80 backdrop-blur-sm"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-[#0f172a] rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-blue-900/50">
            <form action="{{ url('/admin/events') }}" method="POST">
                @csrf
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-white">Create New Event</h3>
                        <button type="button" onclick="document.getElementById('createEventModal').classList.add('hidden')" class="text-slate-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l18 18"></path></svg>
                        </button>
                    </div>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Event Title</label>
                            <input type="text" name="title" required class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-emerald-500 transition-colors" placeholder="e.g. Community Cleanup">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Description</label>
                            <textarea name="description" required rows="3" class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-emerald-500 transition-colors" placeholder="Describe the event..."></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Date & Time</label>
                                <input type="datetime-local" name="event_date" required class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-emerald-500 transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Location</label>
                                <input type="text" name="location" required class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-4 py-2.5 text-sm text-slate-200 focus:outline-none focus:border-emerald-500 transition-colors" placeholder="e.g. Covered Court">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-[#020617]/50 border-t border-blue-900/50 flex justify-end gap-3">
                    <button type="button" onclick="document.getElementById('createEventModal').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-slate-400 hover:text-white transition-colors">Cancel</button>
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg text-sm font-medium transition-colors">Create Event</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection