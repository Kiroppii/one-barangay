@extends('layouts.app')

@section('title', 'Request Document')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <div class="mb-8">
        <a href="/certificates" class="text-blue-400 hover:text-blue-300 text-sm font-medium flex items-center gap-2 mb-4 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Certificates
        </a>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Request a Document</h1>
        <p class="text-slate-400">Fill out the form below to request a barangay clearance, permit, or certification.</p>
    </div>

    <div class="card-bg rounded-2xl shadow-[0_0_40px_rgba(30,58,138,0.2)] border border-blue-900/50 overflow-hidden relative">
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/10 rounded-full blur-[80px] pointer-events-none"></div>

        <div class="p-8 relative z-10">
            <form method="POST" action="/certificates" class="space-y-6">
                @csrf

                @if($errors->any())
                    <div class="bg-red-500/10 border border-red-500/50 text-red-400 px-4 py-3 rounded-lg text-sm">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Document Type</label>
                    <div class="relative">
                        <select name="document_type" class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-4 py-3 text-sm text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all cursor-pointer appearance-none" required>
                            <option value="" disabled selected>Select a document...</option>
                            <option value="Barangay Clearance">Barangay Clearance</option>
                            <option value="Certificate of Indigency">Certificate of Indigency</option>
                            <option value="Business Permit">Business Permit</option>
                            <option value="Certificate of Residency">Certificate of Residency</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5 uppercase tracking-wider">Purpose of Request</label>
                    <textarea name="purpose" rows="3" placeholder="E.g., For local employment, scholarship application, etc." class="w-full bg-[#020617] border border-blue-900/50 rounded-lg px-4 py-3 text-sm text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all resize-none" required>{{ old('purpose') }}</textarea>
                </div>

                <div class="pt-4 border-t border-blue-900/50 mt-6 flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-lg px-6 py-2.5 shadow-[0_0_20px_rgba(37,99,235,0.4)] transition-all flex items-center gap-2 group">
                        Submit Request
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection