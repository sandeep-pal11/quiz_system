<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories - Admin Portal</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 font-[Outfit] text-gray-800 antialiased flex flex-col min-h-screen">

    <x-navbar :email="$email" />

    <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <!-- Header & Breadcrumb -->
        <div class="mb-8">
            <nav class="flex mb-3" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li><a href="/dashboard" class="text-gray-400 hover:text-gray-500"><i class="fa-solid fa-home"></i></a></li>
                    <li><span class="text-gray-300">/</span></li>
                    <li><span class="text-sm font-medium text-gray-900" aria-current="page">Categories</span></li>
                </ol>
            </nav>
            <h2 class="text-3xl font-bold leading-7 text-gray-900 sm:text-4xl sm:truncate">
                Manage Categories
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                Create new categories or manage existing ones.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Column: Add Category Form -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 sticky top-24">
                    <div class="p-6 bg-gradient-to-r from-blue-600 to-indigo-600">
                        <h3 class="text-xl font-bold text-white flex items-center gap-2">
                            <i class="fa-solid fa-plus-circle"></i> Add New Category
                        </h3>
                        <p class="text-blue-100 text-sm mt-1">Create a new quiz category.</p>
                    </div>

                    <div class="p-6">
                        @if($errors->any())
                        <div class="bg-red-50 text-red-700 p-4 rounded-xl mb-4 text-sm border-l-4 border-red-500">
                            {{ $errors->first() }}
                        </div>
                        @endif

                        <form action="/add-category" method="POST" class="space-y-4" novalidate>
                            @csrf
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <i class="fa-solid fa-tag"></i>
                                    </div>
                                    <input type="text" id="category" name="category" placeholder="e.g. Science, Math" value="{{ old('category') }}"
                                        class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-shadow @error('category') border-red-500 focus:ring-red-500 @enderror">
                                </div>
                                @error('category')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                Create Category
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column: Categories List -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                        <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            <i class="fa-solid fa-layer-group text-blue-600"></i> Existing Categories
                        </h2>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                            Total: {{ count($categories) }}
                        </span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        S. No
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Category Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Created By
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($categories as $key => $category)
                                <tr class="hover:bg-blue-50/50 transition-colors duration-200 group">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        #{{ $key + 1 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900">{{ $category->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                             <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-xs font-bold mr-2">
                                                 <i class="fa-solid fa-user"></i>
                                             </div>
                                             <span class="text-sm text-gray-600">{{ $category->creator }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="quiz-list/{{$category->id}}/{{ $category->name }}" 
                                               class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors" title="View Quizzes">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <button onclick="confirmDelete({{ $category->id }})" 
                                                class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors" title="Delete Category">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                        <p class="text-lg font-medium">No categories found.</p>
                                        <p class="text-sm">Start by adding a new category on the left.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>

    </main>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this! All quizzes in this category might be affected.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/category/delete/" + id;
                }
            })
        }

        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#3b82f6',
            timer: 3000,
            timerProgressBar: true
        });
        @endif
    </script>

</body>
</html>
