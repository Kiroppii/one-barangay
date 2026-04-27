@extends('layouts.admin')

@section('title', 'Request Details')

@section('content')
<div class="mb-6">
    <a href="/admin/certificates" class="text-blue-400 hover:text-blue-300 text-sm font-medium flex items-center gap-2 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Back to Certificates
    </a>
</div>

<div class="card-bg rounded-2xl shadow-[0_0_40px_rgba(30,58,138,0.2)] border border-blue-900/50 overflow-hidden max-w-3xl mx-auto">
    <div class="p-8">
        <h2 class="text-2xl font-bold text-white mb-6">Request #REQ-{{ $certificate->id }}</h2>

        <div class="grid grid-cols-2 gap-6 mb-8">
            <div>
                <label class="block text-xs font-medium text-slate-500 uppercase">Resident Name</label>
                <div class="flex items-center gap-3 mt-2">
                    <img src="https://api.dicebear.com/7.x/initials/svg?seed={{ $certificate->user->name }}&backgroundColor=1e3a8a&textColor=fff" class="w-8 h-8 rounded-full border border-blue-800">
                    <p class="text-lg text-white font-medium">{{ $certificate->user->name }}</p>
                </div>
            </div>
            
            <div>
                <label class="block text-xs font-medium text-slate-500 uppercase">Current Status</label>
                <p class="mt-2">
                    @if($certificate->status === 'Pending')
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-500/10 text-amber-400 border border-amber-500/20">Pending Review</span>
                    @elseif($certificate->status === 'Approved')
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Approved</span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-500/10 text-red-400 border border-red-500/20">Rejected</span>
                    @endif
                </p>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-500 uppercase">Document Type</label>
                <p class="text-slate-300 mt-1 font-medium">{{ $certificate->certificate_type }}</p>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-500 uppercase">Date Filed</label>
                <p class="text-slate-300 mt-1 font-medium">{{ $certificate->created_at->format('M d, Y - h:i A') }}</p>
            </div>

            <div class="col-span-2">
                <label class="block text-xs font-medium text-slate-500 uppercase">Purpose of Request</label>
                <div class="bg-[#020617] border border-blue-900/50 rounded-lg p-4 mt-2">
                    <p class="text-slate-300">{{ $certificate->purpose }}</p>
                </div>
            </div>
        </div>

        @if($certificate->status === 'Pending')
            <div class="flex gap-4 border-t border-blue-900/50 pt-6 mt-4">
                <form action="/admin/certificates/{{ $certificate->id }}/approve" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-lg px-6 py-3 transition-all flex justify-center items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Approve & Notify
                    </button>
                </form>
                
                <form action="/admin/certificates/{{ $certificate->id }}/reject" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full bg-red-600/20 border border-red-600/50 text-red-400 hover:bg-red-600 hover:text-white font-bold rounded-lg px-6 py-3 transition-all flex justify-center items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        Decline Request
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>
@endsection