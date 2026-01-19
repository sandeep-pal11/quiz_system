<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard - Quiz Master</title>

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
        <div class="w-full max-w-4xl space-y-8">

            <div class="text-center">
                 <h1 class="text-3xl md:text-4xl font-bold text-gray-900">Your Dashboard</h1>
                 <p class="text-gray-500 mt-2">Track you quiz attempts and progress here.</p>
            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <div class="p-6 md:p-8 bg-blue-600">
                    <h2 class="text-2xl font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-history opacity-70"></i> Recent Activity
                    </h2>
                </div>

                <div class="divide-y divide-gray-100">
                    <!-- Header (Hidden on small, shown on large) -->
                    <div class="hidden md:flex bg-gray-50 p-4 text-xs font-bold text-gray-500 uppercase tracking-wider">
                        <div class="w-1/6 text-center">#</div>
                        <div class="w-1/2">Quiz Name</div>
                        <div class="w-1/4 text-center">Status</div>
                    </div>

                    @forelse ($quizrecord as $key => $record)
                    <div class="p-4 md:p-6 hover:bg-gray-50 transition-colors flex flex-col md:flex-row items-center md:items-center gap-4">
                        
                        <!-- ID -->
                        <div class="w-full md:w-1/6 flex md:justify-center items-center gap-2">
                            <span class="md:hidden text-gray-500 font-bold">#:</span>
                            <span class="bg-gray-100 text-gray-600 font-bold w-8 h-8 rounded-full flex items-center justify-center text-sm">
                                {{ $key + 1 }}
                            </span>
                        </div>
                        
                        <!-- Name & Date -->
                        <div class="w-full md:w-1/3">
                            <div class="font-semibold text-gray-800 text-lg leading-tight">{{ $record->name }}</div>
                            <div class="text-xs text-gray-500 mt-1">
                                <i class="fa-regular fa-calendar mr-1"></i> {{ $record->created_at->format('M d, Y') }}
                            </div>
                        </div>

                        <!-- Score -->
                        <div class="w-full md:w-1/6 flex md:justify-center">
                            @if($record->status == 2)
                                <div class="text-center">
                                    <span class="block text-lg font-bold text-gray-900">
                                        {{ $record->correct_answers }}/{{ $record->total_questions }}
                                    </span>
                                    <span class="text-xs text-gray-500 font-medium uppercase tracking-wide">Score</span>
                                </div>
                            @else
                                <span class="text-gray-400 text-sm">-</span>
                            @endif
                        </div>

                        <!-- Status & Action -->
                        <div class="w-full md:w-1/3 flex flex-col md:flex-row items-center justify-end gap-3">
                            @if($record->status == 2)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 uppercase tracking-wide">
                                    Completed
                                </span>
                                <a href="/quiz-result-details/{{ $record->id }}" class="inline-flex items-center justify-center px-4 py-2 border border-blue-600 rounded-lg text-sm font-medium text-blue-600 bg-white hover:bg-blue-50 transition-colors w-full md:w-auto">
                                    View Result
                                </a>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700 uppercase tracking-wide">
                                    In Progress
                                </span>
                                 <button disabled class="inline-flex items-center justify-center px-4 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-400 bg-gray-50 cursor-not-allowed w-full md:w-auto">
                                    View Result
                                </button>
                            @endif
                        </div>

                    </div>
                    @empty
                    <div class="p-12 text-center text-gray-500">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                             <i class="fa-regular fa-folder-open text-2xl"></i>
                        </div>
                        <p class="text-lg font-medium">No quiz attempts found.</p>
                        <p class="text-sm">Start a quiz to see your history here.</p>
                        <a href="/" class="mt-4 inline-block text-blue-600 font-semibold hover:underline">Explore Quizzes</a>
                    </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    <x-footer-user></x-footer-user>
</body>
</html>
