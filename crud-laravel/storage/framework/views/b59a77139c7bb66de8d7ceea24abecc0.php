<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-yskj+Bd+l8FSfVmUxsnAPGqsE6iTVomxq+r7PL2HX5i5xL7/NkxVTOXjOQRHyE0nIpHpEQXhOWF/0F6wM1ybQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <title>Edit Product</title>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto max-w-md">
        <h1 class="text-3xl font-bold mb-6 text-center form-title">
            <i class="fas fa-edit"></i> Edit Product
        </h1>

        <?php if($errors->any()): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul class="list-disc list-inside">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><i class="fas fa-exclamation-circle"></i> <?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('product.update', ['product' => $product->id])); ?>" class="form-container">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2 form-label" for="name">
                    <i class="fas fa-tag"></i> Name
                </label>
                <input type="text" name="name" placeholder="Product Name" value="<?php echo e($product->name); ?>"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline form-input"
                    title="Enter the product name">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2 form-label" for="qty">
                    <i class="fas fa-cubes"></i> Quantity
                </label>
                <input type="number" name="qty" placeholder="Quantity" value="<?php echo e($product->qty); ?>"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline form-input"
                    title="Enter the quantity">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2 form-label" for="price">
                    <i class="fas fa-dollar-sign"></i> Price
                </label>
                <input type="text" name="price" placeholder="Price" value="<?php echo e($product->price); ?>"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline form-input"
                    title="Enter the price">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2 form-label" for="description">
                    <i class="fas fa-info-circle"></i> Description
                </label>
                <input type="text" name="description" placeholder="Description" value="<?php echo e($product->description); ?>"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline form-input"
                    title="Enter a description">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline form-button">
                    <i class="fas fa-save"></i> Update Product
                </button>
                <a href="<?php echo e(route('product.index')); ?>" class="inline-block align-baseline font-bold text-sm cancel-link">
                    <i class="fas fa-arrow-left"></i> Cancel
                </a>
            </div>
        </form>
    </div>

    <script>
        // SweetAlert for form submission confirmation
        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Confirm Update',
                text: "Are you sure you want to update this product?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>
</body>
</html>
<?php /**PATH E:\laravel\git repo\crud-laravel\resources\views/products/edit.blade.php ENDPATH**/ ?>