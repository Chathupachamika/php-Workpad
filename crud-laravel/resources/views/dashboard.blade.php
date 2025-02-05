<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="hidden md:block">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-1">
                        <!-- Quick Actions -->
                        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-4 transform hover:scale-105 transition duration-300 mb-4">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-shopping-cart text-2xl text-blue-500 mr-2"></i>
                                <h3 class="text-lg font-bold">Orders</h3>
                            </div>
                            <p class="text-xs text-gray-600 mb-2">Manage and track all your business orders efficiently.</p>
                            <div class="flex space-x-1">
                                <a href="" class="block bg-blue-500 hover:bg-blue-600 text-white py-1 px-2 rounded-md text-xs flex items-center">
                                    <i class="fas fa-list mr-1"></i> View Orders
                                </a>
                                <a href="" class="block bg-green-500 hover:bg-green-600 text-white py-1 px-2 rounded-md text-xs flex items-center">
                                    <i class="fas fa-plus-circle mr-1"></i> Create Order
                                </a>
                            </div>
                        </div>

                        <!-- Product Management -->
                        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-4 transform hover:scale-105 transition duration-300 mb-4">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-box-open text-2xl text-green-500 mr-2"></i>
                                <h3 class="text-lg font-bold">Products</h3>
                            </div>
                            <p class="text-xs text-gray-600 mb-2">Manage your product inventory with ease.</p>
                            <div class="flex space-x-1">
                                <a href="{{ route('product.index') }}" class="block bg-green-500 hover:bg-green-600 text-white py-1 px-2 rounded-md text-xs flex items-center">
                                    <i class="fas fa-list mr-1"></i> View Products
                                </a>
                                <a href="{{ route('product.create') }}" class="block bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-2 rounded-md text-xs flex items-center">
                                    <i class="fas fa-plus-circle mr-1"></i> Add Product
                                </a>
                            </div>
                        </div>

                        <!-- Customer Management -->
                        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-4 transform hover:scale-105 transition duration-300">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-users text-2xl text-purple-500 mr-2"></i>
                                <h3 class="text-lg font-bold">Customers</h3>
                            </div>
                            <p class="text-xs text-gray-600 mb-2">Manage and grow your customer relationships.</p>
                            <div class="flex space-x-1">
                                <a href="/customers" class="block bg-purple-500 hover:bg-purple-600 text-white py-1 px-2 rounded-md text-xs flex items-center">
                                    <i class="fas fa-user-friends mr-1"></i> Customer List
                                </a>
                                <a href="/customers" class="block bg-indigo-500 hover:bg-indigo-600 text-white py-1 px-2 rounded-md text-xs flex items-center">
                                    <i class="fas fa-user-plus mr-1"></i> Add Customer
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <img src="{{ asset('images/image.jpg') }}" alt="Dashboard Image" class="w-1/2 h-auto object-cover rounded-lg">
                    </div>
                </div>
            </div>
            <div class="block md:hidden">
                <div class="grid grid-cols-1 gap-4">
                    <!-- Quick Actions -->
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg p-4 transform hover:scale-105 transition duration-300 col-span-1"> <!-- Change col-span-2 to col-span-1 -->
                        <div class="flex items-center mb-2">
                            <i class="fas fa-shopping-cart text-2xl text-blue-500 mr-2"></i>
                            <h3 class="text-lg font-bold">Orders</h3>
                        </div>
                        <p class="text-xs text-gray-600 mb-2">Manage orders efficiently.</p> <!-- Shortened text -->
                        <div class="flex space-x-1">
                            <a href="" class="block bg-blue-500 hover:bg-blue-600 text-white py-1 px-2 rounded-md text-2xs flex items-center">
                                <i class="fas fa-list mr-1"></i> View
                            </a>
                            <a href="" class="block bg-green-500 hover:bg-green-600 text-white py-1 px-2 rounded-md text-2xs flex items-center">
                                <i class="fas fa-plus-circle mr-1"></i> Create
                            </a>
                        </div>
                    </div>

                    <!-- Product Management -->
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg p-4 transform hover:scale-105 transition duration-300">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-box-open text-2xl text-green-500 mr-2"></i>
                            <h3 class="text-lg font-bold">Products</h3>
                        </div>
                        <p class="text-xs text-gray-600 mb-2">Manage your product inventory with ease.</p>
                        <div class="flex space-x-1">
                            <a href="{{ route('product.index') }}" class="block bg-green-500 hover:bg-green-600 text-white py-1 px-2 rounded-md text-xs flex items-center">
                                <i class="fas fa-list mr-1"></i> View Products
                            </a>
                            <a href="{{ route('product.create') }}" class="block bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-2 rounded-md text-xs flex items-center">
                                <i class="fas fa-plus-circle mr-1"></i> Add Product
                            </a>
                        </div>
                    </div>

                    <!-- Customer Management -->
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg p-2 transform hover:scale-105 transition duration-300">
                        <div class="flex items-center mb-1">
                            <i class="fas fa-users text-2xl text-purple-500 mr-2"></i>
                            <h3 class="text-lg font-bold">Customers</h3>
                        </div>
                        <p class="text-xs text-gray-600 mb-1">Manage and grow your customer relationships.</p>
                        <div class="flex space-x-1">
                            <a href="#" class="block bg-purple-500 hover:bg-purple-600 text-white py-1 px-2 rounded-md text-xs flex items-center">
                                <i class="fas fa-user-friends mr-1"></i> Customer List
                            </a>
                            <a href="#" class="block bg-indigo-500 hover:bg-indigo-600 text-white py-1 px-2 rounded-md text-xs flex items-center">
                                <i class="fas fa-user-plus mr-1"></i> Add Customer
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <img src="{{ asset('images/image.jpg') }}" alt="Dashboard Image" class="w-1/3 h-auto object-cover rounded-lg mx-auto">
                </div>
            </div>
<br>
            <!-- Quick Stats -->
            <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6 col-span-full grid grid-cols-4 gap-4">
                <div class="text-center">
                    <i class="fas fa-shopping-bag text-3xl text-blue-500"></i>
                    <p class="font-bold text-xl">sfdsds</p>
                    <p class="text-sm text-gray-600">Total Orders</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-box text-3xl text-green-500"></i>
                    <p class="font-bold text-xl">xgdssd</p>
                    <p class="text-sm text-gray-600">Total Products</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-users text-3xl text-purple-500"></i>
                    <p class="font-bold text-xl">sdfsd</p>
                    <p class="text-sm text-gray-600">Total Customers</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-dollar-sign text-3xl text-green-600"></i>
                    <p class="font-bold text-xl">sdfsds</p>
                    <p class="text-sm text-gray-600">Total Revenue</p>
                </div>
            </div>
<br>
            <!-- Recent Activities -->
            <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6 col-span-full">
                <div class="flex items-center mb-4">
                    <i class="fas fa-clock text-3xl text-orange-500 mr-4"></i>
                    <h3 class="text-xl font-bold">Recent Activities</h3>
                </div>
                {{-- <ul class="divide-y divide-gray-200">
                    @foreach()
                    <li class="py-4 flex items-center">
                        <i class="fas fa-{{ $activity['icon'] }} mr-4 text-lg text-gray-600"></i>
                        <span></span>
                        <small class="ml-auto text-gray-500"></small>
                    </li>
                    @endforeach
                </ul> --}}
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>
