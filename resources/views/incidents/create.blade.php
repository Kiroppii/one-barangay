@extends('layouts.app')
@section('title', 'Report an Incident')
@section('content')
<div class="flex justify-between items-end mb-8">
<form method="POST" action="/incidents" class="space-y-6 relative z-10">
    @csrf

    @if($errors->any())
        <div class="bg-red-500/10 border border-red-500/50 text-red-400 px-4 py-3 rounded-lg text-sm mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <label class="block text-sm font-medium text-slate-300 mb-2">Type of Incident</label>
        <select name="incident_type" required class="w-full input-bg rounded-lg px-4 py-3 text-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
            <option value="" disabled selected>Select category...</option>
            <option value="Noise Complaint">Noise Complaint</option>
            <option value="Fallen Tree / Hazard">Public Hazard (Fallen Tree, Pothole)</option>
            <option value="Suspicious Activity">Suspicious Activity</option>
            <option value="Other Dispute">Other Dispute / Blotter</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-300 mb-2">Specific Location</label>
        <input type="text" name="location" value="{{ old('location') }}" required class="w-full input-bg rounded-lg px-4 py-3 text-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="e.g., Purok 3, in front of the bakery">
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-300 mb-2">Detailed Description</label>
        <textarea name="description" required class="w-full input-bg rounded-lg px-4 py-3 text-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" rows="4" placeholder="Please describe what happened...">{{ old('description') }}</textarea>
    </div>

    <div class="pt-4">
        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg px-4 py-3 shadow-[0_0_20px_rgba(220,38,38,0.3)] transition-all">
            Submit Report
        </button>
    </div>
</form>
@if($errors->any())
    <div class="absolute inset-0 bg-red-900/50 backdrop-blur-sm flex items-center justify-center p-4 rounded-lg">
        <div class="bg-red-500/10 border border-red-500/50 text-red-400 px-6 py-4 rounded-lg text-sm max-w-md w-full">
            <h2 class="text-lg font-semibold mb-2">Please fix the following errors:</h2>
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
</div>
@endsection