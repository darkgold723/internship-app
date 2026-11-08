<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <h2 class="text-xl font-bold mb-4">Admin: Application History</h2>
            
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if($applications->isEmpty())
                <p class="text-gray-500">No history found. You haven't approved or rejected anything yet.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="p-3">Student Name</th>
                                <th class="p-3">Company</th>
                                <th class="p-3">Position</th>
                                <th class="p-3">Date Applied</th>
                                <th class="p-3">Final Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applications as $app)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">{{ $app->user->name }}</td>
                                    <td class="p-3 font-bold">{{ $app->company_name }}</td>
                                    <td class="p-3">{{ $app->position }}</td>
                                    <td class="p-3">{{ $app->apply_date }}</td>
                                    <td class="p-3">
                                        <span class="font-bold {{ $app->status === 'approved' ? 'text-green-600' : 'text-red-600' }}">
                                            {{ strtoupper($app->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>