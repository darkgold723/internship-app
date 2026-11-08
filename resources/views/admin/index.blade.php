<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <h2 class="text-xl font-bold mb-4">Admin: Pending Applications</h2>
            
            @if($applications->isEmpty())
                <p class="text-gray-500">No pending applications to review.</p>
            @else
                @foreach($applications as $app)
                    <div class="border p-4 mb-3 rounded bg-gray-50">
                        <strong class="text-lg">{{ $app->company_name }}</strong> - {{ $app->position }} <br>
                        <span class="text-sm text-gray-600">Submitted by: {{ $app->user->name }} ({{ $app->user->email }})</span> <br>
                        <span class="text-sm text-gray-600">Date: {{ $app->apply_date }}</span> <br>
                        <span class="font-bold text-blue-600">Status: {{ strtoupper($app->status) }}</span>
                        
                        <div class="mt-3 flex gap-2">
                            <form method="POST" action="{{ route('admin.approve', $app) }}">
                                @csrf @method('PATCH')
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm font-bold">Approve</button>
                            </form>
                            <form method="POST" action="{{ route('admin.reject', $app) }}">
                                @csrf @method('PATCH')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm font-bold">Reject</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>