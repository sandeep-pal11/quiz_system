<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$quizname}} - Question</title>

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

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 font-[Outfit] text-gray-800 antialiased flex flex-col min-h-screen">

    <x-user-navbar></x-user-navbar>

    <div class="flex-grow flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 flex flex-col">
            
            <!-- Header: Progress & Title -->
            <div class="bg-white p-6 md:p-8 border-b border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-500 uppercase tracking-widest">
                        {{$quizname}}
                    </h2>
                     @if(session()->has('currentquiz'))
                    <span class="bg-blue-100 text-blue-800 text-sm font-bold px-3 py-1 rounded-full">
                         {{ session('currentquiz')['currentmcq'] }} / {{ session('currentquiz')['totalmcq'] }}
                    </span>
                    @endif
                </div>

                @if(session()->has('currentquiz'))
                    <!-- Progress Bar -->
                    @php
                        $percentage = (session('currentquiz')['currentmcq'] / session('currentquiz')['totalmcq']) * 100;
                    @endphp
                    <div class="w-full bg-gray-100 rounded-full h-2.5 mb-2">
                         <div class="bg-blue-600 h-2.5 rounded-full transition-all duration-500 ease-out" style="width: {{ $percentage }}%"></div>
                    </div>
                @endif
            </div>

            <!-- Question & Options -->
            <div class="p-6 md:p-10 flex-grow">
                 
                @if(session()->has('currentquiz'))
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8 leading-snug">
                         {{$mcqdata->question}}
                    </h3>

                    <form action="/submit-next/{{$mcqdata->id}}" method="post" id="quizForm">
                        @csrf
                        <input type="hidden" name="id" value="{{$mcqdata->id}}">

                        <div class="grid grid-cols-1 gap-4">
                            <!-- Option A -->
                            <label class="group relative flex items-center p-4 border-2 border-gray-200 rounded-2xl cursor-pointer hover:border-blue-500 hover:bg-blue-50/30 transition-all duration-200">
                                <input type="radio" name="answer" value="a" class="peer sr-only">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full border-2 border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white mr-4 text-gray-400 font-bold transition-all">
                                    A
                                </span>
                                <span class="text-lg text-gray-700 peer-checked:text-gray-900 font-medium group-hover:text-gray-900">
                                    {{$mcqdata->a}}
                                </span>
                                <div class="absolute inset-0 border-2 border-transparent peer-checked:border-blue-600 rounded-2xl pointer-events-none transition-all"></div>
                            </label>

                            <!-- Option B -->
                            <label class="group relative flex items-center p-4 border-2 border-gray-200 rounded-2xl cursor-pointer hover:border-blue-500 hover:bg-blue-50/30 transition-all duration-200">
                                <input type="radio" name="answer" value="b" class="peer sr-only">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full border-2 border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white mr-4 text-gray-400 font-bold transition-all">
                                    B
                                </span>
                                <span class="text-lg text-gray-700 peer-checked:text-gray-900 font-medium group-hover:text-gray-900">
                                    {{$mcqdata->b}}
                                </span>
                                <div class="absolute inset-0 border-2 border-transparent peer-checked:border-blue-600 rounded-2xl pointer-events-none transition-all"></div>
                            </label>

                            <!-- Option C -->
                            <label class="group relative flex items-center p-4 border-2 border-gray-200 rounded-2xl cursor-pointer hover:border-blue-500 hover:bg-blue-50/30 transition-all duration-200">
                                <input type="radio" name="answer" value="c" class="peer sr-only">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full border-2 border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white mr-4 text-gray-400 font-bold transition-all">
                                    C
                                </span>
                                <span class="text-lg text-gray-700 peer-checked:text-gray-900 font-medium group-hover:text-gray-900">
                                    {{$mcqdata->c}}
                                </span>
                                <div class="absolute inset-0 border-2 border-transparent peer-checked:border-blue-600 rounded-2xl pointer-events-none transition-all"></div>
                            </label>

                            <!-- Option D -->
                            <label class="group relative flex items-center p-4 border-2 border-gray-200 rounded-2xl cursor-pointer hover:border-blue-500 hover:bg-blue-50/30 transition-all duration-200">
                                <input type="radio" name="answer" value="d" class="peer sr-only">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full border-2 border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white mr-4 text-gray-400 font-bold transition-all">
                                    D
                                </span>
                                <span class="text-lg text-gray-700 peer-checked:text-gray-900 font-medium group-hover:text-gray-900">
                                    {{$mcqdata->d}}
                                </span>
                                <div class="absolute inset-0 border-2 border-transparent peer-checked:border-blue-600 rounded-2xl pointer-events-none transition-all"></div>
                            </label>
                        </div>

                        <div class="mt-8 flex justify-end">
                            <button type="submit"
                                class="bg-blue-600 text-white px-8 py-3 rounded-xl shadow-lg border-2 border-transparent font-bold text-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-all flex items-center gap-2">
                                Next Question <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                @else
                    <div class="text-center py-10">
                        <h2 class="text-2xl font-bold text-red-500 mb-2">Question Unavailable</h2>
                         <p class="text-gray-500">There seems to be an issue loading this question.</p>
                         <a href="/" class="mt-4 inline-block text-blue-600 hover:underline">Go Home</a>
                    </div>
                @endif
            </div>

        </div>
    </div>

    <script>
        document.getElementById("quizForm").addEventListener("submit", function(e) {
            let selected = document.querySelector('input[name="answer"]:checked');
            if (!selected) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'No Option Selected',
                    text: 'Please select an answer to continue.',
                    confirmButtonColor: '#2563eb',
                    confirmButtonText: 'Got it'
                });
            }
        });
    </script>

    <x-footer-user></x-footer-user>
</body>
</html>
