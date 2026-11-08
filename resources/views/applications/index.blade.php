<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            
            <!-- THIS IS THE HEADER WITH THE ADD BUTTON -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">My Internship Applications</h2>
                <a href="{{ route('applications.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded font-bold">
                    + Add New
                </a>
            </div>
            
            <hr class="mb-4">

            <!-- List of Applications -->
            @if($applications->isEmpty())
                <p class="text-gray-500">No applications found. Click "+ Add New" to create one.</p>
            @else
                @foreach($applications as $app)
                    <div class="border p-4 mb-3 rounded bg-gray-50">
                        <strong class="text-lg">{{ $app->company_name }}</strong> - {{ $app->position }} <br>
                        
                        <div class="text-sm text-gray-600 mt-1">
                            Date: {{ $app->apply_date }} | 
                            Status: <span class="font-bold {{ $app->status === 'pending' ? 'text-blue-600' : ($app->status === 'approved' ? 'text-green-600' : 'text-red-600') }}">
                                {{ strtoupper($app->status) }}
                            </span>
                        </div>
                        
                        @if($app->remarks)
                            <div class="text-sm text-gray-500 mt-1 italic">
                                Remarks: {{ $app->remarks }}
                            </div>
                        @endif

                        <!-- Edit/Delete Buttons (Only show if PENDING) -->
                        @if($app->status === 'pending')
                            <div class="mt-3 flex gap-2">
                                <a href="{{ route('applications.edit', $app) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm font-bold">
                                    Edit
                                </a>
                                
                                <form method="POST" action="{{ route('applications.destroy', $app) }}" onsubmit="return confirm('Are you sure you want to delete this application?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm font-bold">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
</x-app-layout>