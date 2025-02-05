@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-4xl font-extrabold mb-8 text-center text-blue-700">
        <i class="fas fa-box"></i> Products Management
    </h1>

    <!-- Tab Navigation -->
    <div class="flex mb-4">
        <a href="{{ route('product.index') }}" class="flex items-center px-4 py-2 rounded-t-lg {{ !request()->is('products/recycle-bin') ? 'bg-white text-blue-600 border-t border-l border-r' : 'bg-gray-200 text-gray-600' }}">
            <i class="fas fa-box mr-2"></i> Products
        </a>
        <a href="{{ route('product.recycle-bin') }}" class="flex items-center px-4 py-2 rounded-t-lg ml-2 {{ request()->is('products/recycle-bin') ? 'bg-white text-blue-600 border-t border-l border-r' : 'bg-gray-200 text-gray-600' }}">
            <i class="fas fa-trash-restore mr-2"></i> Recycle Bin
            @if($recycledCount > 0)
                <span class="ml-2 bg-red-500 text-white rounded-full px-2 py-1 text-xs">{{ $recycledCount }}</span>
            @endif
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 flex items-center" role="alert">
            <i class="fas fa-check-circle mr-2"></i>
            <span>{{ session('success') }}</span>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                <i class="fas fa-times text-green-700"></i>
            </button>
        </div>
    @endif

    @if($recycledItems->isEmpty())
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <p class="text-gray-600">Recycle bin is empty.</p>
        </div>
    @else
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Id</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">QTY</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Price</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Deleted At</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recycledItems as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-4">{{ $item->id }}</td>
                            <td class="px-5 py-4">{{ $item->name }}</td>
                            <td class="px-5 py-4">{{ $item->qty }}</td>
                            <td class="px-5 py-4">${{ number_format($item->price, 2) }}</td>
                            <td class="px-5 py-4">{{ $item->deleted_at->diffForHumans() }}</td>
                            <td class="px-5 py-4 flex space-x-2">
                                <form method="POST" action="{{ route('product.restore', $item->id) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded text-xs inline-flex items-center">
                                        <i class="fas fa-trash-restore mr-1"></i> Restore
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('product.permanent-delete', $item->id) }}" class="inline permanent-delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 rounded text-xs inline-flex items-center">
                                        <i class="fas fa-trash-alt mr-1"></i> Delete Forever
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@push('scripts')
<script>
    document.querySelectorAll('.permanent-delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Delete Forever?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete forever!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>
@endpush
@endsection
