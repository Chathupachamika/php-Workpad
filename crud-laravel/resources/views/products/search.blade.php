<form method="GET" action="{{ route('product.index') }}" class="mb-4 bg-gray-100 p-4 rounded shadow-md">

    <div class="flex">
        <input type="text" name="search" placeholder="Search products..." class="border rounded py-2 px-4 mb-2 w-full col-6">
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded col-6 ml-2">Search</button>

    <div class="flex items-center">
        <div class="relative w-full col-6">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                <i class="fas fa-search"></i>
            </span>
            <input type="text" name="search" placeholder="Search products..." class="border rounded py-2 pl-10 pr-4 mb-2 w-full focus:outline-none focus:ring-2 focus:ring-yellow-500">
        </div>
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded col-6 ml-2 flex items-center">
            <i class="fas fa-search mr-2"></i> Search
        </button>

    </div>
</form>
