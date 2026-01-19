<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Quiz MCQs - Admin Portal</title>

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

        <!-- Header -->
        <div class="md:flex md:items-center md:justify-between mb-8">
            <div class="flex-1 min-w-0">
                 <nav class="flex mb-2" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li><a href="/dashboard" class="text-gray-400 hover:text-gray-500"><i class="fa-solid fa-home"></i></a></li>
                        <li><span class="text-gray-300">/</span></li>
                        <li><a href="/quiz-list" class="text-sm font-medium text-gray-500 hover:text-gray-700">Quizzes</a></li>
                        <li><span class="text-gray-300">/</span></li>
                        <li><span class="text-sm font-medium text-gray-900" aria-current="page">{{ $quizName }}</span></li>
                    </ol>
                </nav>
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Quiz: {{ $quizName }}
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Viewing all multiple choice questions for this quiz.
                </p>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                 <a href="/add-quiz" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-xl shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Back
                 </a>
            </div>
        </div>

        <!-- MCQ List Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-16">
                                #
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Question
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($mcqs as $key => $mcq)
                        <tr class="hover:bg-blue-50/50 transition-colors duration-200">
                            <td class="px-6 py-6 whitespace-nowrap text-sm text-gray-500 align-top">
                                <span class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 font-bold text-gray-600">
                                    {{ $key + 1 }}
                                </span>
                            </td>
                            <td class="px-6 py-6 text-sm text-gray-800 align-top">
                                <p class="font-medium text-lg mb-2">{{ $mcq->question }}</p>
                                <!-- Potentially show options if available in $mcq object later -->
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="px-6 py-12 text-center text-gray-500">
                                 <div class="flex flex-col items-center justify-center">
                                    <i class="fa-solid fa-file-circle-question text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-lg font-medium">No questions found.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
    </main>

</body>
</html>
