<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$quizname}} - Start Quiz</title>

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

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50 font-[Outfit] text-gray-800 antialiased flex flex-col min-h-screen">

    <x-user-navbar></x-user-navbar>

    <div class="flex-grow flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row shadow-blue-500/10 border border-gray-100">
            
            <!-- Left: Info -->
            <div class="md:w-3/5 p-10 flex flex-col justify-center">
                
                <div class="mb-6">
                    <span class="bg-blue-100 text-blue-700 text-sm font-bold px-3 py-1 rounded-lg uppercase tracking-wider mb-2 inline-block">
                        Ready to Begin?
                    </span>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                        {{$quizname}}
                    </h1>
                </div>

                <div class="space-y-4 mb-10">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 shrink-0">
                            <i class="fa-solid fa-list-ol"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Total Questions</h4>
                            <p class="text-gray-500 text-sm">{{$quizcount}} Questions in this quiz</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                         <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600 shrink-0">
                            <i class="fa-solid fa-infinity"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">No Attempts Limit</h4>
                            <p class="text-gray-500 text-sm">Practice as many times as you want</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                         <div class="w-10 h-10 rounded-full bg-purple-50 flex items-center justify-center text-purple-600 shrink-0">
                            <i class="fa-solid fa-certificate"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Get Certified</h4>
                            <p class="text-gray-500 text-sm">Score high to earn your certificate</p>
                        </div>
                    </div>
                </div>

                @if (session('user'))
                  <a href="/mcq/{{ session('firstmcq')->id }}/{{ str_replace(' ', '%20', $quizname) }}" 
                    class="group relative inline-flex items-center justify-center w-full px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-blue-600 border-2 border-transparent rounded-2xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 shadow-lg shadow-blue-500/30 hover:-translate-y-1">
                    Start Quiz Now <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                  </a>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <a href="/user-quiz-start" 
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-xl text-center transition shadow-lg hover:shadow-indigo-500/30">
                            Sign Up
                        </a>
                        <a href="/user-login-quiz" 
                             class="bg-white border-2 border-gray-200 text-gray-700 hover:border-blue-500 hover:text-blue-600 font-bold py-3 px-4 rounded-xl text-center transition">
                            Login
                        </a>
                    </div>
                    <p class="text-center text-xs text-gray-400 mt-4">You need to be logged in to start.</p>
                @endif

            </div>

            <!-- Right: Illustration -->
            <div class="md:w-2/5 bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center p-12 relative overflow-hidden">
                <div class="absolute inset-0 bg-white/5 opacity-30"></div>
                <!-- Simple Geometric Objects (CSS only) -->
                 <div class="absolute top-10 right-10 w-20 h-20 bg-yellow-400 rounded-full mix-blend-overlay filter blur-xl opacity-70 animate-pulse"></div>
                 <div class="absolute bottom-10 left-10 w-32 h-32 bg-purple-400 rounded-full mix-blend-overlay filter blur-xl opacity-70"></div>

                <div class="relative z-10 text-center text-white">
                    <i class="fa-solid fa-rocket text-8xl mb-6 drop-shadow-lg"></i>
                    <h3 class="text-2xl font-bold mb-2">Good Luck!</h3>
                    <p class="text-blue-100 text-sm">Review your answers carefully before submitting.</p>
                </div>
            </div>

        </div>
    </div>

    <x-footer-user></x-footer-user>
</body>
</html>
