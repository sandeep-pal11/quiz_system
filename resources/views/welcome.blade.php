<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Master - Test Your Knowledge</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
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


    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        .hero-pattern {
            background-color: #ffffff;
            opacity: 0.1;
            background-image:  linear-gradient(#4f46e5 1px, transparent 1px), linear-gradient(to right, #4f46e5 1px, transparent 1px);
            background-size: 40px 40px;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased flex flex-col min-h-screen">

    <!-- Navbar -->
    <x-user-navbar></x-user-navbar>

    <!-- Hero Section -->
    <div class="relative bg-white overflow-hidden">
        <div class="absolute inset-0 z-0">
             <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-indigo-50"></div>
             <div class="absolute inset-0 hero-pattern z-10"></div>
        </div>

        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-24 text-center lg:text-left lg:flex lg:items-center lg:justify-between">
            <div class="lg:w-1/2">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
                    Master Your Skills <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                        One Quiz at a Time
                    </span>
                </h1>
                <p class="text-lg md:text-xl text-gray-600 mb-10 max-w-2xl mx-auto lg:mx-0">
                    Join thousands of learners challenging themselves with our diverse collection of quizzes. Level up your knowledge today!
                </p>

                <!-- Search Bar -->
                <div class="max-w-md mx-auto lg:mx-0 bg-white p-2 rounded-full shadow-xl border border-gray-100 flex items-center transform transition hover:scale-105 duration-300">
                     <form action="/user-quiz-search" method="get" class="flex w-full items-center">
                        <div class="pl-5 flex items-center justify-center text-blue-500">
                            <i class="fa-solid fa-search text-xl"></i>
                        </div>
                        <input class="w-full px-4 py-3 text-gray-700 focus:outline-none bg-transparent font-medium placeholder-gray-400"
                            type="text" name="search" placeholder="Search for any topic...">
                        <button type="submit" class="bg-blue-600 text-white rounded-full px-6 py-3 font-bold hover:bg-blue-700 transition shadow-md">
                            Search
                        </button>
                    </form>
                </div>
            </div>

            <!-- Hero Ilustration / Image -->
            <div class="lg:w-1/2 mt-16 lg:mt-0 relative">
                <div class="relative w-full max-w-lg mx-auto">
                    <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                    <div class="absolute top-0 -right-4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                    <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
                    
                    <img src="{{ asset('quiz-hero.png') }}" 
                         alt="Quiz Illustration" 
                         class="relative rounded-2xl shadow-2xl border-4 border-white transform rotate-3 hover:rotate-0 transition duration-500 w-full object-cover h-auto">
                     <!-- Note: Using a generic placeholder if image generation fails, but ideally this is a custom asset -->
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-white border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="p-4">
                    <div class="text-4xl font-bold text-blue-600 mb-2">{{ count($categories) }}</div>
                    <div class="text-gray-500 font-medium">Categories</div>
                </div>
                <div class="p-4">
                     <div class="text-4xl font-bold text-indigo-600 mb-2">{{ count($quizdata) }}</div>
                     <div class="text-gray-500 font-medium">Active Quizzes</div>
                </div>
                <div class="p-4">
                     <div class="text-4xl font-bold text-purple-600 mb-2">100+</div>
                     <div class="text-gray-500 font-medium">Daily Users</div>
                </div>
                <div class="p-4">
                     <div class="text-4xl font-bold text-pink-600 mb-2">FREE</div>
                     <div class="text-gray-500 font-medium">Forever</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Container -->
    <div class="flex-grow bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Categories Section -->
            <div class="mb-20">
                <div class="flex justify-between items-end mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 group">
                            Popular Categories
                            <div class="h-1 w-20 bg-blue-500 mt-2 rounded-full group-hover:w-32 transition-all duration-300"></div>
                        </h2>
                    </div>
                    <a href="/categories-list" class="text-blue-600 font-semibold hover:text-blue-800 transition flex items-center gap-1">
                        View All <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse ($categories->take(4) as $category)
                    <a href="user-quiz-list/{{ $category->id }}/{{ str_replace('','-',$category->name) }}" class="group">
                        <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-1 h-full flex flex-col">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center text-xl font-bold group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                    {{ substr($category->name, 0, 1) }}
                                </div>
                                <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full font-medium">
                                    {{ $category->quizzes_count }} Quizzes
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">{{ $category->name }}</h3>
                            <p class="text-gray-500 text-sm line-clamp-2 mt-auto">Explore quizzes in {{ $category->name }} and test your knowledge.</p>
                        </div>
                    </a>
                    @empty
                    <div class="col-span-full text-center py-10 bg-white rounded-xl border border-dashed border-gray-300 text-gray-500">
                        No categories found.
                    </div>
                    @endforelse
                </div>
            </div>


            <!-- Trending Quizzes Section -->
            <div>
                <div class="flex justify-between items-end mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 group">
                            Trending Quizzes
                            <div class="h-1 w-20 bg-indigo-500 mt-2 rounded-full group-hover:w-32 transition-all duration-300"></div>
                        </h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($quizdata as $item)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 group hover:-translate-y-1">
                        <!-- Card Header Gradient -->
                        <div class="h-3 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500"></div>
                        
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <span class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                                    Active
                                </span>
                                <i class="fa-regular fa-star text-gray-400 hover:text-yellow-400 cursor-pointer transition"></i>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors line-clamp-1">
                                {{ $item->name }}
                            </h3>
                            
                            <p class="text-gray-500 text-sm mb-6 line-clamp-2">
                                Ready to challenge yourself? Take this quiz now and see how much you score!
                            </p>

                            <div class="flex items-center justify-between mt-auto">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fa-regular fa-clock mr-2"></i> 10 Mins
                                </div>
                                
                                <a href="/start-quiz/{{ $item->id }}/{{ str_replace('','-',$item->name) }}" 
                                   class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all shadow-md hover:shadow-lg">
                                    <i class="fa-solid fa-play mr-2 text-xs"></i> Start Quiz
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-10 bg-white rounded-xl border border-dashed border-gray-300 text-gray-500">
                        No quizzes available at the moment.
                    </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <x-footer-user></x-footer-user>

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Signup Success -->
    @if(session('message-success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Welcome Aboard!',
        text: "{{ session('message-success') }}",
        confirmButtonColor: '#4f46e5',
        backdrop: `rgba(0,0,123,0.4)`
      }).then(() => {
        if (window.history.replaceState) {
          window.history.replaceState(null, null, window.location.href);
        }
      });
    </script>
    @endif

    <!-- Login Success -->
    @if(session('message'))
    <script>
      const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'success',
          title: "{{ session('message') }}"
        })
    </script>
    @endif

    <!-- Login Error -->
    @if(session('message-error'))
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ session('message-error') }}",
        confirmButtonColor: '#ef4444'
      });
    </script>
    @endif

</body>
</html>
