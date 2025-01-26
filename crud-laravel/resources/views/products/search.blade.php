<form method="GET" action="{{ route('product.index') }}" class="mb-4 bg-gray-100 p-4 rounded shadow-md">
    <div class="flex">
        <input type="text" name="search" placeholder="Search products..." class="border rounded py-2 px-4 mb-2 w-full col-6">
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded col-6 ml-2">Search</button>
    </div>
</form>
