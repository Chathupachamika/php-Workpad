<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
</head>
<body>
    <h1>Create Product</h1>

    <div>
        <?php if($errors-> any()): ?>

        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

        <?php endif; ?>
    </div>

    <form method="POST" action="<?php echo e(route('product.store')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>
        <div>
            <label>Name : </label>
            <input type="text" name="name" placeholder="Name">
        </div>

        <div>
            <label>QTY : </label>
            <input type="number" name="qty" placeholder="qty">
        </div>

        <div>
            <label>Price : </label>
            <input type="text" name="price" placeholder="Price">
        </div>

        <div>
            <label>Description : </label>
            <input type="text" name="description" placeholder="Description">
        </div>
        <div>
            <input type="submit" value="Save a New Product"/>
        </div>
    </form>

    <!-- Add form or content here -->
</body>
</html>
<?php /**PATH E:\laravel\new\crud-app\resources\views/products/create.blade.php ENDPATH**/ ?>