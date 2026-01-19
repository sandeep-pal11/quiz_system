<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Quiz Master</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

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
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-50 font-[Outfit] text-gray-800 antialiased flex flex-col min-h-screen">

    <x-navbar :email="$email" />

    <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="mb-8">
            <h2 class="text-3xl font-bold leading-7 text-gray-900 sm:text-4xl sm:truncate">
                Dashboard Overview
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                Welcome back, Admin! Here's what's happening today.
            </p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            
            <!-- Total Users -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Users</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">{{ $total_users }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 text-xl">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-green-500 font-medium flex items-center gap-1">
                        <i class="fa-solid fa-arrow-trend-up"></i> Active
                    </span>
                    <span class="text-gray-400 mx-2">•</span>
                    <a href="/admin-users" class="text-blue-600 hover:text-blue-800">View All</a>
                </div>
            </div>

            <!-- Total Quizzes -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Quizzes</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">{{ $total_quizzes }}</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center text-purple-600 text-xl">
                        <i class="fa-solid fa-list-check"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                     <span class="text-gray-500">Across all categories</span>
                </div>
            </div>

            <!-- Categories -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Categories</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">{{ $total_categories }}</p>
                    </div>
                    <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 text-xl">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>
                </div>
                 <div class="mt-4 flex items-center text-sm">
                    <a href="/admin-categories" class="text-indigo-600 hover:text-indigo-800">Manage Categories</a>
                </div>
            </div>

             <!-- Total MCQs -->
             <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Question Bank</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">{{ $total_mcqs }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-600 text-xl">
                        <i class="fa-solid fa-file-circle-question"></i>
                    </div>
                </div>
                 <div class="mt-4 flex items-center text-sm">
                    <span class="text-gray-500">Total questions added</span>
                </div>
            </div>

        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Quick Actions -->
            <div class="bg-gradient-to-br from-indigo-600 to-blue-500 rounded-2xl p-8 shadow-xl text-white relative overflow-hidden">
                <!-- Decorative background elements -->
                <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 rounded-full bg-white/10 blur-3xl"></div>
                <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 rounded-full bg-black/5 blur-3xl"></div>

                <h3 class="text-xl font-bold mb-6 relative z-10">Quick Actions</h3>
                <div class="grid grid-cols-2 gap-4 relative z-10">
                    <a href="/add-quiz" class="group flex flex-col items-center justify-center bg-white/10 hover:bg-white/20 p-6 rounded-xl transition-all border border-white/10 backdrop-blur-sm shadow-lg">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform shadow-inner">
                            <i class="fa-solid fa-plus text-white text-xl"></i>
                        </div>
                        <span class="font-medium text-white/90">Create Quiz</span>
                    </a>

                    <a href="/admin-categories" class="group flex flex-col items-center justify-center bg-white/10 hover:bg-white/20 p-6 rounded-xl transition-all border border-white/10 backdrop-blur-sm shadow-lg">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform shadow-inner">
                            <i class="fa-solid fa-folder-plus text-white text-xl"></i>
                        </div>
                        <span class="font-medium text-white/90">Add Category</span>
                    </a>

                     <a href="/admin-users" class="group flex flex-col items-center justify-center bg-white/10 hover:bg-white/20 p-6 rounded-xl transition-all border border-white/10 backdrop-blur-sm shadow-lg">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform shadow-inner">
                            <i class="fa-solid fa-user-gear text-white text-xl"></i>
                        </div>
                        <span class="font-medium text-white/90">Manage Users</span>
                    </a>

                     <a href="/all-quizzes" class="group flex flex-col items-center justify-center bg-white/10 hover:bg-white/20 p-6 rounded-xl transition-all border border-white/10 backdrop-blur-sm shadow-lg">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform shadow-inner">
                            <i class="fa-solid fa-eye text-white text-xl"></i>
                        </div>
                        <span class="font-medium text-white/90">View All</span>
                    </a>
                </div>
            </div>

            <!-- Analytics Chart -->
            <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 flex flex-col">
                <div class="mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Quizzes per Category</h3>
                    <p class="text-sm text-gray-500">Distribution of quizzes across various categories.</p>
                </div>
                <div class="relative h-64 w-full">
                    <canvas id="quizChart"></canvas>
                </div>
            </div>
            
        </div>

    </main>

    <script>
        const ctx = document.getElementById('quizChart').getContext('2d');
        const quizChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartLabels),
                datasets: [{
                    label: 'Number of Quizzes',
                    data: @json($chartValues),
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.6)',
                        'rgba(16, 185, 129, 0.6)',
                        'rgba(245, 158, 11, 0.6)',
                        'rgba(239, 68, 68, 0.6)',
                        'rgba(139, 92, 246, 0.6)',
                        'rgba(236, 72, 153, 0.6)'
                    ],
                    borderColor: [
                        'rgb(59, 130, 246)',
                        'rgb(16, 185, 129)',
                        'rgb(245, 158, 11)',
                        'rgb(239, 68, 68)',
                        'rgb(139, 92, 246)',
                        'rgb(236, 72, 153)'
                    ],
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</body>
</html>
