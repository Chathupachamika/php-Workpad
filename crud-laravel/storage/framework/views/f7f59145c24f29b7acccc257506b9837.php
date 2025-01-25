<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-K6qC1J7PgrZAwFqxB1xCjN5GvHYqQMK3TL9M13KUhlZ76PNhvGhtq1c0oTFD5U9q6O3HzR0NH2mqLZnXxIMVYw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Products</title>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-4xl font-extrabold mb-8 text-center text-blue-700">
            <i class="fas fa-box"></i> Products Management
        </h1>

        <div class="mb-6 text-right">
            <a href="<?php echo e(route('product.create')); ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <i class="fas fa-plus mr-2"></i> Add New Product
            </a>
        </div>

        <?php if(session('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 flex items-center" role="alert">
                <i class="fas fa-check-circle mr-2"></i>
                <span><?php echo e(session('success')); ?></span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                    <i class="fas fa-times text-green-700"></i>
                </button>
            </div>
        <?php endif; ?>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <?php if($products->isEmpty()): ?>
                <p class="p-6 text-gray-600 text-center">No products available.</p>
            <?php else: ?>
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
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-5 py-4"><?php echo e($product->id); ?></td>
                                <td class="px-5 py-4"><?php echo e($product->name); ?></td>
                                <td class="px-5 py-4"><?php echo e($product->qty); ?></td>
                                <td class="px-5 py-4">$<?php echo e(number_format($product->price, 2)); ?></td>
                                <td class="px-5 py-4"><?php echo e($product->description); ?></td>
                                <td class="px-5 py-4 flex space-x-2">
                                    <a href="<?php echo e(route('product.edit', ['product' => $product])); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-xs inline-flex items-center">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <form method="POST" action="<?php echo e(route('product.destroy', ['product' => $product])); ?>" class="inline delete-form">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs inline-flex items-center">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>

    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
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
<?php /**PATH E:\laravel\git repo\crud-laravel\resources\views/products/index.blade.php ENDPATH**/ ?>