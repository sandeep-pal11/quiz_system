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

    <?php if (isset($component)) { $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e = $attributes; } ?>
<?php $component = App\View\Components\Navbar::resolve(['email' => $email] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navbar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $attributes = $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $component = $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>

    <main class="flex-grow flex items-center justify-center p-4 py-10">

        <div class="w-full max-w-2xl bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            
            <?php if(!session('quizdetails')): ?>
            
            <div class="p-8">
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-50 text-blue-600 text-3xl mb-4">
                        <i class="fa-solid fa-folder-plus"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Create New Quiz</h2>
                    <p class="text-gray-500 text-sm mt-2">Start by naming your quiz and selecting a category.</p>
                </div>

                <form action="/add-quiz" method="post" class="space-y-6" novalidate>
                    <?php echo csrf_field(); ?>
                    
                    
                    <div>
                        <label for="quiz" class="block text-sm font-medium text-gray-700 mb-1">Quiz Name</label>
                        <input type="text" id="quiz" name="quiz" placeholder="e.g. JavaScript Basics" value="<?php echo e(old('quiz')); ?>"
                               class="block w-full px-4 py-3 border border-gray-300 rounded-xl bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-shadow <?php $__errorArgs = ['quiz'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 focus:ring-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['quiz'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <select id="category_id" name="category_id"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-shadow <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 focus:ring-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value="">-- Select Category --</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                                <?php echo e($category->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Create Quiz <i class="fa-solid fa-arrow-right ml-2 mt-0.5"></i>
                    </button>
                </form>
            </div>

            <?php else: ?>
            
            <div class="bg-gray-50 p-6 border-b border-gray-100 flex justify-between items-center">
                <div>
                     <h3 class="text-lg font-bold text-gray-900"><?php echo e(session('quizdetails')->name); ?></h3>
                     <p class="text-xs text-gray-500">Total MCQs: <span class="font-bold text-blue-600"><?php echo e($totalmcq); ?></span></p>
                </div>
                <div>
                    <a href="<?php echo e(route('show.quiz', ['id' => session('quizdetails')->id, 'quizName' => session('quizdetails')->name])); ?>" 
                       class="text-xs font-semibold text-blue-600 hover:text-blue-800 hover:underline">
                        View Added MCQs <i class="fa-solid fa-external-link-alt ml-1"></i>
                    </a>
                </div>
            </div>

            <div class="p-8">
                <h4 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold"><?php echo e($totalmcq + 1); ?></span>
                    Add Question Details
                </h4>

                <form action="/add-mcq" method="post" class="space-y-5" novalidate>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="category_id" value="<?php echo e(session('quizdetails')->category_id); ?>">

                    
                    <div>
                        <label for="question" class="block text-sm font-medium text-gray-700 mb-1">Question</label>
                        <textarea id="question" name="question" rows="3" placeholder="Type your question here..."
                                  class="block w-full px-4 py-3 border border-gray-300 rounded-xl bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-shadow <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 focus:ring-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('question')); ?></textarea>
                        <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                             <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Option A</label>
                             <input type="text" name="a" value="<?php echo e(old('a')); ?>" placeholder="Option A" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['a'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                             <?php $__errorArgs = ['a'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                             <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Option B</label>
                             <input type="text" name="b" value="<?php echo e(old('b')); ?>" placeholder="Option B" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['b'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                             <?php $__errorArgs = ['b'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                             <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Option C</label>
                             <input type="text" name="c" value="<?php echo e(old('c')); ?>" placeholder="Option C" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['c'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                             <?php $__errorArgs = ['c'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                             <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Option D</label>
                             <input type="text" name="d" value="<?php echo e(old('d')); ?>" placeholder="Option D" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['d'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                             <?php $__errorArgs = ['d'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    
                    <div>
                        <label for="correct_ans" class="block text-sm font-medium text-gray-700 mb-1">Correct Answer</label>
                        <select name="correct_ans"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-shadow">
                            <option value="">-- Select Right Option --</option>
                            <option value="a" <?php echo e(old('correct_ans') == 'a' ? 'selected' : ''); ?>>Option A</option>
                            <option value="b" <?php echo e(old('correct_ans') == 'b' ? 'selected' : ''); ?>>Option B</option>
                            <option value="c" <?php echo e(old('correct_ans') == 'c' ? 'selected' : ''); ?>>Option C</option>
                            <option value="d" <?php echo e(old('correct_ans') == 'd' ? 'selected' : ''); ?>>Option D</option>
                        </select>
                        <?php $__errorArgs = ['correct_ans'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
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
            <?php endif; ?>

        </div>

    </main>

</body>
</html>
<?php /**PATH D:\quiz_app\quiz\quiz_system\resources\views/add-quiz.blade.php ENDPATH**/ ?>