<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Details - {{ $quizName }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tailwind CSS -->
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

    <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <!-- Header Section -->
        <div class="mb-8">
            <a href="/user-details" class="inline-flex items-center text-sm text-gray-500 hover:text-blue-600 mb-4 transition-colors">
                <i class="fa-solid fa-arrow-left mr-2"></i> Back to Dashboard
            </a>
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                     <h1 class="text-3xl font-bold text-gray-900">{{ $quizName }} <span class="text-gray-400 font-light">Results</span></h1>
                     <p class="text-gray-500 text-sm mt-1">Detailed breakdown of your performance.</p>
                </div>
                
                <!-- Score Card -->
                <div class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-gray-200 flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-xs uppercase tracking-wider font-bold text-gray-400">Your Score</p>
                        <p class="text-2xl font-bold {{ $score >= 50 ? 'text-green-600' : 'text-orange-500' }}">
                            {{ $score }}%
                        </p>
                    </div>
                    <div class="h-10 w-px bg-gray-200"></div>
                     <div class="text-left">
                        <p class="text-xs uppercase tracking-wider font-bold text-gray-400">Correct</p>
                        <p class="text-lg font-bold text-gray-800">
                            {{ $correctAnswers }} <span class="text-gray-400 text-sm">/ {{ $totalQuestions }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Questions Analysis -->
        <div class="space-y-6 max-w-4xl mx-auto">
            
            @foreach($resultData as $index => $result)
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                <!-- Question Header -->
                <div class="p-6 border-b border-gray-50 flex items-start gap-4">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm
                        {{ $result->is_correct ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $index + 1 }}
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 leading-snug">
                            {{ $result->mcq->question }}
                        </h3>
                    </div>
                    <div class="ml-auto flex-shrink-0">
                         @if($result->is_correct)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Correct
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                Incorrect
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Answer Analysis -->
                <div class="p-6 bg-gray-50/50">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        
                        <!-- User Selected Answer -->
                        <div class="p-4 rounded-xl border {{ $result->is_correct ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200' }}">
                            <p class="text-xs font-bold uppercase tracking-wider mb-2 {{ $result->is_correct ? 'text-green-600' : 'text-red-600' }}">
                                Your Answer
                            </p>
                            <p class="font-medium text-gray-800">
                                <span class="font-bold mr-1 uppercase">{{ $result->select_answer }}.</span>
                                {{ $result->mcq->{$result->select_answer} }}
                            </p>
                        </div>

                        <!-- Correct Answer (Show only if wrong) -->
                        @if(!$result->is_correct)
                        <div class="p-4 rounded-xl border bg-blue-50 border-blue-200">
                            <p class="text-xs font-bold uppercase tracking-wider mb-2 text-blue-600">
                                Correct Answer
                            </p>
                            <p class="font-medium text-gray-800">
                                <span class="font-bold mr-1 uppercase">{{ $result->mcq->correct_ans }}.</span>
                                {{ $result->mcq->{$result->mcq->correct_ans} }}
                            </p>
                        </div>
                        @else
                         <div class="p-4 rounded-xl border border-gray-200 bg-white opacity-50 flex items-center justify-center text-gray-400 text-sm">
                            <i class="fa-solid fa-check mr-2"></i> You got it right!
                        </div>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </main>

    <x-footer-user></x-footer-user>

</body>
</html>
