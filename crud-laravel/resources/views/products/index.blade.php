@extends('layouts.app')

<<<<<<< HEAD
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
=======

        @include('products.search')


        @include('products.search')

        <form method="GET" action="{{ route('product.index') }}" class="mb-4 bg-gray-100 p-4 rounded shadow-md">
            <div class="flex items-center">
                <div class="relative w-full col-6">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" name="search" placeholder="Search products..." class="border rounded py-2 pl-10 pr-4 mb-2 w-full">
                </div>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded col-6 ml-2">Search</button>
            </div>
        </form>


        <div class="mb-6 text-right">
            <a href="{{ route('product.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <i class="fas fa-plus mr-2"></i> Add New Product
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

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            @if($products->isEmpty())
                <p class="p-6 text-gray-600 text-center">No products available.</p>
            @else
                <table class="min-w-full leading-normal">
                    <thead class="bg-blue-100">
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Id</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">QTY</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Price</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($products as $product)
                            <tr class="hover:bg-gray-50">
                                <td class="px-5 py-4">{{ $product->id }}</td>
                                <td class="px-5 py-4">{{ $product->name }}</td>
                                <td class="px-5 py-4">{{ $product->qty }}</td>
                                <td class="px-5 py-4">${{ number_format($product->price, 2) }}</td>
                                <td class="px-5 py-4">{{ $product->description }}</td>
                                <td class="px-5 py-4 flex space-x-2">
                                    <a href="{{ route('product.edit', ['product' => $product]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-xs inline-flex items-center">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('product.destroy', ['product' => $product]) }}" class="inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs inline-flex items-center">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
>>>>>>> 7e686a27c7f01aa042b77b964cfbf5eb2a52ad80
            @endif
        </a>
    </div>

    <form method="GET" action="{{ route('product.index') }}" class="mb-4 bg-gray-100 p-4 rounded shadow-md">
        <div class="flex items-center">
            <div class="relative w-full">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." class="border rounded py-2 pl-10 pr-4 w-full">
            </div>
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-2">Search</button>
        </div>
    </form>

    <div class="mb-6 text-right">
        <a href="{{ route('product.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
            <i class="fas fa-plus mr-2"></i> Add New Product
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

    @if($products->isEmpty())
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <p class="text-gray-600">No products available.</p>
        </div>
    @else
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Id</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">QTY</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Price</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-4">{{ $product->id }}</td>
                            <td class="px-5 py-4">{{ $product->name }}</td>
                            <td class="px-5 py-4">{{ $product->qty }}</td>
                            <td class="px-5 py-4">${{ number_format($product->price, 2) }}</td>
                            <td class="px-5 py-4">{{ $product->description }}</td>
                            <td class="px-5 py-4 flex space-x-2">
                                <a href="{{ route('product.edit', $product) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-xs inline-flex items-center">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('product.destroy', $product) }}" class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs inline-flex items-center">
                                        <i class="fas fa-trash mr-1"></i> Move to Bin
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
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Move to Recycle Bin?',
                text: "You can restore this item later from the recycle bin",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, move it!'
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
