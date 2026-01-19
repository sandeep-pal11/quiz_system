<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result - Quiz Master</title>

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
</head>

<body class="bg-gray-50 font-[Outfit] text-gray-800 antialiased flex flex-col min-h-screen">

    <x-user-navbar></x-user-navbar>

    <div class="flex-grow flex items-center justify-center p-4">
        <div class="w-full max-w-5xl space-y-8">
            
            <div class="text-center">
                <h1 class="text-3xl md:text-5xl font-extrabold text-blue-900 mb-2">Quiz Results</h1>
                <p class="text-gray-500">Here is a detailed breakdown of your performance.</p>
            </div>

            @php 
                $total = count($resultData);
                $percentage = $total > 0 ? round(($correctAns / $total) * 100) : 0;
            @endphp

            <!-- Summary Card -->
            <div class="w-full max-w-3xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 p-8 text-center relative">
                
                @if($percentage >= 70)
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-green-100 text-green-500 text-5xl mb-6 shadow-sm animate-bounce">
                        <i class="fa-solid fa-trophy"></i>
                    </div>
                @elseif($percentage >= 40)
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-yellow-100 text-yellow-500 text-5xl mb-6 shadow-sm">
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                @else
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-red-100 text-red-500 text-5xl mb-6 shadow-sm">
                        <i class="fa-solid fa-heart-crack"></i>
                    </div>
                @endif

                <h2 class="text-3xl font-bold text-gray-900 mb-2">
                    {{ $percentage >= 70 ? 'Excellent Job!' : ($percentage >= 40 ? 'Good Effort!' : 'Keep Practicing!') }}
                </h2>
                
                <p class="text-lg text-gray-600 mb-8">
                    You answered <span class="font-bold text-blue-600">{{ $correctAns }}</span> out of <span class="font-bold text-gray-800">{{ $total }}</span> questions correctly.
                </p>

                <!-- Percentage Bar -->
                <div class="w-full max-w-md mx-auto bg-gray-100 rounded-full h-4 mb-8 overflow-hidden">
                    <div class="h-full rounded-full transition-all duration-1000 ease-out {{ $percentage >= 70 ? 'bg-green-500' : ($percentage >= 40 ? 'bg-yellow-500' : 'bg-red-500') }}" 
                         style="width: {{ $percentage }}%"></div>
                </div>

                @if($percentage > 70)
                <a href="/certificate" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-xl text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-1">
                    <i class="fa-solid fa-certificate mr-2"></i> Download Certificate
                </a>
                @endif
            </div>

            <!-- Detailed Analysis -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <div class="p-6 md:p-8 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <i class="fa-solid fa-list-check text-blue-500"></i> Question Analysis
                    </h3>
                </div>

                <div class="divide-y divide-gray-100">
                    @foreach ($resultData as $key => $item)
                    <div class="p-6 flex flex-col md:flex-row items-start md:items-center gap-4 hover:bg-gray-50 transition-colors">
                        
                        <div class="flex-shrink-0">
                            <span class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm
                                {{ $item->is_correct ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                {{ $key + 1 }}
                            </span>
                        </div>

                        <div class="flex-grow">
                            <p class="text-gray-800 font-medium text-lg">{{ $item->question }}</p>
                        </div>

                        <div class="flex-shrink-0 min-w-[120px] text-right">
                             @if($item->is_correct)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-sm font-bold bg-green-50 text-green-600 border border-green-100">
                                    <i class="fa-solid fa-check"></i> Correct
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-sm font-bold bg-red-50 text-red-600 border border-red-100">
                                    <i class="fa-solid fa-xmark"></i> Incorrect
                                </span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div class="text-center mt-8">
                 <a href="/" class="text-gray-500 hover:text-blue-600 font-semibold transition-colors">
                    Back to Home
                 </a>
            </div>

        </div>
    </div>

    <x-footer-user></x-footer-user>

</body>
</html>
