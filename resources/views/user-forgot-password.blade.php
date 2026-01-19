<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Quiz Master</title>

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

<body class="bg-gray-50 font-[Outfit] text-gray-800 antialiased h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
        <div class="p-8 text-center">
            
            <div class="mb-6 inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-50 text-blue-600 text-3xl">
                <i class="fa-solid fa-key"></i>
            </div>

            <h2 class="text-2xl font-bold text-gray-900 mb-2">Forgot Password?</h2>
            <p class="text-gray-500 mb-8 text-sm">
                Enter your email address below and we'll help you get back into your account.
            </p>

            @if(session('status'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 text-left">
                    <p class="text-sm text-green-700 font-medium">
                        <i class="fa-solid fa-check-circle mr-1"></i> {{ session('status') }}
                    </p>
                </div>
            @endif

            <form action="{{ url('/user-forgot-password') }}" method="POST" class="space-y-5 text-left" novalidate>
                @csrf
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <input type="text" id="email" name="email" placeholder="you@example.com"
                            class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-shadow @error('email') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
                    </div>
                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    Send Reset Link
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100">
                <a href="{{ url('/user-login') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600 transition-colors">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Back to Login
                </a>
            </div>
        </div>
    </div>

</body>
</html>
