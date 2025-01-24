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
        @if($errors-> any())

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        @endif
    </div>

    <form method="POST" action="{{ route('product.store') }}">
        @csrf
        @method('POST')
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
