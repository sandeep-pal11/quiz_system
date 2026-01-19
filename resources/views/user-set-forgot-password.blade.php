<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Password - Quiz Master</title>

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

    <x-user-navbar></x-user-navbar>

    <div class="flex-grow flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            <div class="p-8">
                
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-50 text-blue-600 text-3xl mb-4">
                        <i class="fa-solid fa-lock-open"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Set New Password</h2>
                    <p class="text-gray-500 text-sm mt-2">
                        Create a strong password for your account.
                    </p>
                </div>

                {{-- Global Error --}}
                @if ($errors->has('login_error'))
                  <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4">
                    <p class="text-sm text-red-700 font-medium">
                        {{ $errors->first('login_error') }}
                    </p>
                  </div>
                @endif

                <form action="{{ url('/user-set-password') }}" method="POST" class="space-y-5" novalidate>
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <input type="password" id="password" name="password" placeholder="••••••••"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-shadow @error('password') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
                        </div>
                        @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                         <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-shadow @error('password_confirmation') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
                        </div>
                        @error('password_confirmation')
                           <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" 
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors shadow-blue-500/30">
                        Update Password
                    </button>
                </form>

            </div>
        </div>
    </div>

    <x-footer-user></x-footer-user>

</body>
</html>
