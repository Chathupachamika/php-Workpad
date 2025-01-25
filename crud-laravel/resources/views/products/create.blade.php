<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- FontAwesome -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <style>
        .form-container {
            background: linear-gradient(to right, #ece9e6, #ffffff);
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            color: #1a202c;
        }
        .form-label {
            color: #2d3748;
        }
        .form-input {
            border: 1px solid #cbd5e0;
        }
        .form-button {
            background-color: #3182ce;
            border-color: #3182ce;
        }
        .form-button:hover {
            background-color: #2b6cb0;
            border-color: #2b6cb0;
        }
        .cancel-link {
            color: #3182ce;
        }
        .cancel-link:hover {
            color: #2b6cb0;
        }
    </style>
    <title>Create Product</title>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto max-w-md">
        <h1 class="text-3xl font-bold mb-6 text-center form-title"><i class="fas fa-box-open"></i> Create New Product</h1>

        <!-- Displaying Errors -->
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('product.store') }}" class="form-container">
            @csrf
            @method('POST')
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2 form-label" for="name">Name</label>
                <input type="text" name="name" placeholder="Product Name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline form-input">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2 form-label" for="qty">Quantity</label>
                <input type="number" name="qty" placeholder="Quantity"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline form-input">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2 form-label" for="price">Price</label>
                <input type="text" name="price" placeholder="Price"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline form-input">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2 form-label" for="description">Description</label>
                <input type="text" name="description" placeholder="Description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline form-input">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline form-button">
                    <i class="fas fa-save"></i> Save New Product
                </button>
                <a href="{{ route('product.index') }}" class="inline-block align-baseline font-bold text-sm cancel-link">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>

    <!-- SweetAlert2 Notification -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
</body>
</html>
