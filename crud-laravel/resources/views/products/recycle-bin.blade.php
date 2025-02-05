<!-- resources/views/products/recycle-bin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Recycle Bin</title>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-extrabold text-blue-700">
                <i class="fas fa-trash-restore"></i> Recycle Bin
            </h1>
            <a href="{{ route('product.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-arrow-left"></i> Back to Products
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            @if($recycledProducts->isEmpty())
                <p class="p-6 text-gray-600 text-center">No items in recycle bin.</p>
            @else
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">QTY</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Price</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Deleted At</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recycledProducts as $product)
                            <tr class="hover:bg-gray-50">
                                <td class="px-5 py-5 border-b border-gray-200">{{ $product->name }}</td>
                                <td class="px-5 py-5 border-b border-gray-200">{{ $product->qty }}</td>
                                <td class="px-5 py-5 border-b border-gray-200">${{ number_format($product->price, 2) }}</td>
                                <td class="px-5 py-5 border-b border-gray-200">{{ $product->deleted_at->diffForHumans() }}</td>
                                <td class="px-5 py-5 border-b border-gray-200">
                                    <div class="flex space-x-2">
                                        <form action="{{ route('product.restore', $product->id) }}" method="POST" class="restore-form">
                                            @csrf
                                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded text-xs">
                                                <i class="fas fa-trash-restore"></i> Restore
                                            </button>
                                        </form>
                                        <form action="{{ route('product.permanent-delete', $product->id) }}" method="POST" class="permanent-delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs">
                                                <i class="fas fa-trash"></i> Delete Permanently
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <script>
        // Confirmation for restore
        document.querySelectorAll('.restore-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Restore Product?',
                    text: "This product will be restored to the active products list.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, restore it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });

        // Confirmation for permanent delete
        document.querySelectorAll('.permanent-delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Delete Permanently?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete permanently!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>
</body>
</html>
