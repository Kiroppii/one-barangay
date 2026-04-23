@extends('layouts.app')

@section('title', 'Report an Incident')

@section('content')
<div class="mb-8">
    <a href="/incidents" class="text-blue-400 hover:text-blue-300 text-sm font-medium flex items-center gap-2 mb-4">
        &larr; Back to Reports
    </a>
    <h1 class="text-3xl font-bold text-red-400 mb-2 tracking-tight" style="text-shadow: 0 0 10px rgba(248, 113, 113, 0.4);">Report a New Incident</h1>
    <p class="text-slate-400">File a blotter or report an issue that requires barangay attention.</p>
</div>

<div class="card-bg rounded-2xl shadow-2xl p-8 md:p-10 mx-auto max-w-2xl relative overflow-hidden">
    <div class="absolute -top-24 -right-24 w-48 h-48 bg-red-900 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>

    <form action="#" class="space-y-6 relative z-10">
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Type of Incident</label>
            <select class="w-full input-bg rounded-lg px-4 py-3 text-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="" disabled selected>Select category...</option>
                <option value="Noise Complaint">Noise Complaint</option>
                <option value="Fallen Tree / Hazard">Public Hazard (Fallen Tree, Pothole)</option>
                <option value="Suspicious Activity">Suspicious Activity</option>
                <option value="Other Dispute">Other Dispute / Blotter</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Specific Location</label>
            <input type="text" class="w-full input-bg rounded-lg px-4 py-3 text-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="e.g., Purok 3, in front of the bakery">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Detailed Description</label>
            <textarea class="w-full input-bg rounded-lg px-4 py-3 text-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" rows="4" placeholder="Please describe what happened..."></textarea>
        </div>

        <div class="pt-4">
            <button type="button" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg px-4 py-3 shadow-[0_0_20px_rgba(220,38,38,0.3)] transition-all">
                Submit Report
            </button>
        </div>
    </form>
</div>
@endsection