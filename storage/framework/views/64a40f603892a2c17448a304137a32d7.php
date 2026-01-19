<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - <?php echo e($quiz); ?></title>

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

    <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="md:flex md:items-center md:justify-between mb-10">
            <div class="flex-1 min-w-0">
                <nav class="flex mb-2" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                         <li><a href="/" class="text-gray-400 hover:text-gray-500"><i class="fa-solid fa-home"></i></a></li>
                        <li><span class="text-gray-300">/</span></li>
                        <li><span class="text-sm font-medium text-gray-900" aria-current="page">Search</span></li>
                    </ol>
                </nav>
                <h2 class="text-3xl font-bold leading-9 text-gray-900 sm:text-4xl sm:truncate">
                    Results for "<span class="text-blue-600"><?php echo e($quiz); ?></span>"
                </h2>
                <p class="mt-2 text-sm text-gray-500">
                    Found <?php echo e(count($quizdata)); ?> quizzes matching your search.
                </p>
            </div>
             <div class="mt-4 flex md:mt-0 md:ml-4">
                 <a href="/" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-xl shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Clear Search
                 </a>
            </div>
        </div>

        <?php if(count($quizdata) > 0): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php $__currentLoopData = $quizdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl border border-gray-100 overflow-hidden transition-all duration-300 transform hover:-translate-y-1 flex flex-col">
                <div class="h-3 bg-gradient-to-r from-blue-500 to-indigo-600"></div>
                <div class="p-6 flex-grow">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl font-bold">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2.5 py-1 rounded-full border border-blue-200">
                           <?php echo e($item->mcq_count); ?> Qs
                        </span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors line-clamp-2">
                        <?php echo e($item->name); ?>

                    </h3>
                    <p class="text-gray-500 text-sm mb-4 line-clamp-2">
                        Test your knowledge in <?php echo e($item->name); ?>. Complete all questions to earn your certificate.
                    </p>
                </div>
                
                <div class="p-6 pt-0 mt-auto">
                    <a href="/start-quiz/<?php echo e($item->id); ?>/<?php echo e($item->name); ?>" 
                       class="block w-full py-3 px-4 bg-gray-50 hover:bg-blue-600 text-gray-700 hover:text-white font-semibold rounded-xl text-center transition-all duration-300 border border-gray-200 hover:border-blue-600 group-hover:shadow-lg">
                        Attempt Quiz <i class="fa-solid fa-arrow-right ml-2 text-sm opacity-70"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <div class="bg-white rounded-3xl shadow-lg border border-gray-200 p-12 text-center max-w-2xl mx-auto mt-10">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 text-gray-400 mb-6">
                <i class="fa-solid fa-magnifying-glass text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">No quizzes found</h3>
            <p class="text-gray-500 mb-8 max-w-md mx-auto">
                We couldn't find any quizzes matching "<strong><?php echo e($quiz); ?></strong>". Try searching for a different topic or browse all categories.
            </p>
            <a href="/" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 transition-colors shadow-lg shadow-blue-500/30">
                Browse All Quizzes
            </a>
        </div>
        <?php endif; ?>

    </main>
    
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
<?php /**PATH D:\quiz_app\quiz\quiz_system\resources\views/user-quiz-search.blade.php ENDPATH**/ ?>