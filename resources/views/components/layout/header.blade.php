<!-- Header -->
<div class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-4 px-6">
        <h2 class="text-2xl font-semibold">{{ $title ?? 'Dashboard' }}</h2>
        @if(auth()->user()->branch_id && !auth()->user()->isOwner())
            <p class="text-sm text-gray-600">{{ auth()->user()->branch->name }} - {{ auth()->user()->branch->city }}</p>
        @endif
    </div>
</div>
