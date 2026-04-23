@extends('layouts.app')

@section('title', 'Request Certificate')

@section('content')
<div class="mb-8">
    <a href="/certificates" class="text-blue-400 hover:text-blue-300 text-sm font-medium flex items-center gap-2 mb-4">
        &larr; Back to Dashboard
    </a>
    <h1 class="text-3xl font-bold text-white mb-2 tracking-tight glow-text">Request Certificate</h1>
    <p class="text-slate-400">Submit a new request for a barangay document.</p>
</div>

<div class="card-bg rounded-2xl shadow-2xl p-8 md:p-10 mx-auto max-w-2xl relative overflow-hidden">
    <div class="absolute -top-24 -right-24 w-48 h-48 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>

    <form action="#" class="space-y-6 relative z-10">
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Certificate Type</label>
            <select class="w-full input-bg rounded-lg px-4 py-3 text-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="" disabled selected>Select a document...</option>
                <option value="Barangay Clearance">Barangay Clearance</option>
                <option value="Certificate of Indigency">Certificate of Indigency</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Purpose of Request</label>
            <textarea class="w-full input-bg rounded-lg px-4 py-3 text-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" rows="4" placeholder="e.g., For Local Employment"></textarea>
        </div>

        <div class="pt-4">
            <button type="button" class="w-full btn-primary text-white font-semibold rounded-lg px-4 py-3 shadow-[0_0_20px_rgba(29,78,216,0.3)] hover:shadow-[0_0_25px_rgba(29,78,216,0.5)] transition-all">
                Submit Request
            </button>
        </div>
    </form>
</div>
@endsection