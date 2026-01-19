<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(str_replace('-',' ',$category)); ?> - Quizzes</title>

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

    <!-- Navbar -->
    <?php if (isset($component)) { $__componentOriginal6a5b028d56427635ed7bca89932da026 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6a5b028d56427635ed7bca89932da026 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6a5b028d56427635ed7bca89932da026)): ?>
<?php $attributes = $__attributesOriginal6a5b028d56427635ed7bca89932da026; ?>
<?php unset($__attributesOriginal6a5b028d56427635ed7bca89932da026); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6a5b028d56427635ed7bca89932da026)): ?>
<?php $component = $__componentOriginal6a5b028d56427635ed7bca89932da026; ?>
<?php unset($__componentOriginal6a5b028d56427635ed7bca89932da026); ?>
<?php endif; ?>

    <!-- Main Content -->
    <div class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 w-full">

        <!-- Title + Back -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-12">
            <div>
                <h1 class="text-3xl md:text-5xl font-bold text-gray-900 mb-2 capitalize">
                    <?php echo e(str_replace('-',' ',$category)); ?>

                </h1>
                <p class="text-gray-500 text-lg">
                    Select a quiz below to start testing your knowledge.
                </p>
            </div>
            <div class="mt-4 md:mt-0">
                 <a href="/categories-list"
                    class="group flex items-center gap-2 text-gray-600 bg-white border border-gray-200 hover:border-blue-500 hover:text-blue-600 px-5 py-2.5 rounded-xl font-medium shadow-sm hover:shadow-md transition-all">
                    <i class="fa fa-arrow-left group-hover:-translate-x-1 transition-transform"></i> Back to Categories
                </a>
            </div>
        </div>

        <!-- Quiz List Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__empty_1 = true; $__currentLoopData = $quizdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 hover:-translate-y-1 group relative overflow-hidden">
                <!-- Decorative Circle -->
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full bg-blue-50 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-6">
                        <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-lg uppercase tracking-wider">
                            Quiz #<?php echo e($key+1); ?>

                        </span>
                        <div class="text-gray-400 text-sm flex items-center gap-1">
                             <i class="fa-regular fa-clock"></i> 10 min
                        </div>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2 min-h-[3.5rem]">
                        <?php echo e($item->name); ?>

                    </h3>

                    <div class="flex items-center gap-4 mb-6 text-sm text-gray-500">
                        <div class="flex items-center gap-1.5">
                            <i class="fa-solid fa-list-check text-blue-500"></i>
                            <span class="font-medium text-gray-700"><?php echo e($item->mcq_count); ?></span> Questions
                        </div>
                        <div class="flex items-center gap-1.5">
                            <i class="fa-solid fa-trophy text-yellow-500"></i>
                             <span class="font-medium text-gray-700">100</span> Points
                        </div>
                    </div>

                    <a href="/start-quiz/<?php echo e($item->id); ?>/<?php echo e($item->name); ?>"
                        class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all duration-300 gap-2">
                        <i class="fa-solid fa-play text-sm"></i> Attempt Quiz
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-dashed border-gray-300">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-blue-50 text-blue-500 mb-6">
                    <i class="fa-solid fa-folder-open text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">No Quizzes Found</h3>
                <p class="text-gray-500 mb-6">There are no quizzes available in this category yet.</p>
                <a href="/" class="text-blue-600 font-semibold hover:underline">Return Home</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <?php if (isset($component)) { $__componentOriginal90756785005661d591c23b794d0377ea = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal90756785005661d591c23b794d0377ea = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer-user','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('footer-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal90756785005661d591c23b794d0377ea)): ?>
<?php $attributes = $__attributesOriginal90756785005661d591c23b794d0377ea; ?>
<?php unset($__attributesOriginal90756785005661d591c23b794d0377ea); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90756785005661d591c23b794d0377ea)): ?>
<?php $component = $__componentOriginal90756785005661d591c23b794d0377ea; ?>
<?php unset($__componentOriginal90756785005661d591c23b794d0377ea); ?>
<?php endif; ?>

</body>
</html>
<?php /**PATH D:\quiz_app\quiz\quiz_system\resources\views/user-quiz-list.blade.php ENDPATH**/ ?>