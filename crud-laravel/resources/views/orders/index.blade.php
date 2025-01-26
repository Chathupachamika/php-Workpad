<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/orders/create.blade.php -->
<div class="container">
    <h1>Create Order</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div id="product-selection">
            @foreach($products as $product)
            <div class="product-item">
                <h3>{{ $product->name }}</h3>
                <p>Price: ${{ $product->price }}</p>
                <input type="number" name="products[{{ $product->id }}][id]" value="{{ $product->id }}" hidden>
                <input type="number" name="products[{{ $product->id }}][quantity]" min="0" value="0">
            </div>
            @endforeach
        </div>
        <button type="submit">Place Order</button>
    </form>
</div>

<!-- resources/views/orders/index.blade.php -->
<div class="container">
    <h1>Your Orders</h1>
    @foreach($orders as $order)
    <div class="order">
        <h3>Order #{{ $order->id }}</h3>
        <p>Total: ${{ $order->total_price }}</p>
        <p>Status: {{ $order->status }}</p>
        <h4>Products:</h4>
        <ul>
            @foreach($order->products as $product)
            <li>
                {{ $product->name }}
                (Quantity: {{ $product->pivot->quantity }},
                Price: ${{ $product->pivot->price }})
            </li>
            @endforeach
        </ul>
    </div>
    @endforeach
</div>
</body>
</html>
