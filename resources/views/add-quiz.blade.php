<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz & MCQs - Admin Portal</title>

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

    <main class="flex-grow flex items-center justify-center p-4 py-10">

        <div class="w-full max-w-2xl bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            
            @if(!session('quizdetails'))
            {{-- STEP 1: ADD QUIZ --}}
            <div class="p-8">
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-50 text-blue-600 text-3xl mb-4">
                        <i class="fa-solid fa-folder-plus"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Create New Quiz</h2>
                    <p class="text-gray-500 text-sm mt-2">Start by naming your quiz and selecting a category.</p>
                </div>

                <form action="/add-quiz" method="post" class="space-y-6" novalidate>
                    @csrf
                    
                    {{-- Quiz Name --}}
                    <div>
                        <label for="quiz" class="block text-sm font-medium text-gray-700 mb-1">Quiz Name</label>
                        <input type="text" id="quiz" name="quiz" placeholder="e.g. JavaScript Basics" value="{{ old('quiz') }}"
                               class="block w-full px-4 py-3 border border-gray-300 rounded-xl bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-shadow @error('quiz') border-red-500 focus:ring-red-500 @enderror">
                        @error('quiz')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Category Select --}}
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <select id="category_id" name="category_id"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-shadow @error('category_id') border-red-500 focus:ring-red-500 @enderror">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Create Quiz <i class="fa-solid fa-arrow-right ml-2 mt-0.5"></i>
                    </button>
                </form>
            </div>

            @else
            {{-- STEP 2: ADD MCQS --}}
            <div class="bg-gray-50 p-6 border-b border-gray-100 flex justify-between items-center">
                <div>
                     <h3 class="text-lg font-bold text-gray-900">{{ session('quizdetails')->name }}</h3>
                     <p class="text-xs text-gray-500">Total MCQs: <span class="font-bold text-blue-600">{{ $totalmcq }}</span></p>
                </div>
                <div>
                    <a href="{{ route('show.quiz', ['id' => session('quizdetails')->id, 'quizName' => session('quizdetails')->name]) }}" 
                       class="text-xs font-semibold text-blue-600 hover:text-blue-800 hover:underline">
                        View Added MCQs <i class="fa-solid fa-external-link-alt ml-1"></i>
                    </a>
                </div>
            </div>

            <div class="p-8">
                <h4 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">{{ $totalmcq + 1 }}</span>
                    Add Question Details
                </h4>

                <form action="/add-mcq" method="post" class="space-y-5" novalidate>
                    @csrf
                    <input type="hidden" name="category_id" value="{{ session('quizdetails')->category_id }}">

                    {{-- Question --}}
                    <div>
                        <label for="question" class="block text-sm font-medium text-gray-700 mb-1">Question</label>
                        <textarea id="question" name="question" rows="3" placeholder="Type your question here..."
                                  class="block w-full px-4 py-3 border border-gray-300 rounded-xl bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-shadow @error('question') border-red-500 focus:ring-red-500 @enderror">{{ old('question') }}</textarea>
                        @error('question')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Options Grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                             <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Option A</label>
                             <input type="text" name="a" value="{{ old('a') }}" placeholder="Option A" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('a') border-red-500 @enderror">
                             @error('a') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                             <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Option B</label>
                             <input type="text" name="b" value="{{ old('b') }}" placeholder="Option B" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('b') border-red-500 @enderror">
                             @error('b') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                             <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Option C</label>
                             <input type="text" name="c" value="{{ old('c') }}" placeholder="Option C" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('c') border-red-500 @enderror">
                             @error('c') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                             <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Option D</label>
                             <input type="text" name="d" value="{{ old('d') }}" placeholder="Option D" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('d') border-red-500 @enderror">
                             @error('d') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Correct Answer --}}
                    <div>
                        <label for="correct_ans" class="block text-sm font-medium text-gray-700 mb-1">Correct Answer</label>
                        <select name="correct_ans"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-shadow">
                            <option value="">-- Select Right Option --</option>
                            <option value="a" {{ old('correct_ans') == 'a' ? 'selected' : '' }}>Option A</option>
                            <option value="b" {{ old('correct_ans') == 'b' ? 'selected' : '' }}>Option B</option>
                            <option value="c" {{ old('correct_ans') == 'c' ? 'selected' : '' }}>Option C</option>
                            <option value="d" {{ old('correct_ans') == 'd' ? 'selected' : '' }}>Option D</option>
                        </select>
                        @error('correct_ans')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Action Buttons --}}
                    <div class="pt-4 flex flex-col gap-3">
                        <button type="submit" name="submit" value="Add More" 
                            class="w-full py-3 px-4 border border-blue-600 rounded-xl text-sm font-bold text-blue-600 hover:bg-blue-50 focus:outline-none transition-colors">
                            <i class="fa-solid fa-plus mr-1"></i> Add Question & Continue
                        </button>
                        
                        <div class="grid grid-cols-2 gap-3">
                            <button type="submit" name="submit" value="done" 
                                class="w-full py-3 px-4 border border-transparent rounded-xl text-sm font-bold text-white bg-green-600 hover:bg-green-700 focus:outline-none transition-colors shadow-lg shadow-green-500/30">
                                <i class="fa-solid fa-check mr-1"></i> Save & Finish
                            </button>
                            
                            <a href="/end-quiz" 
                               class="w-full py-3 px-4 border border-gray-300 rounded-xl text-sm font-bold text-center text-gray-600 hover:bg-gray-100 focus:outline-none transition-colors">
                                Cancel / Finish
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            @endif

        </div>

    </main>

</body>
</html>
