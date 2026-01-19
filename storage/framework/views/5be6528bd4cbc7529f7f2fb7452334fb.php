<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Categories - Quiz Master</title>

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
    <div class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 w-full" 
         x-data="{ search: '' }">

        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4">Explore Categories</h1>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">Find the perfect topic to test your knowledge. Choose from our wide range of categories below.</p>
        </div>

        <!-- Search & Filter Bar -->
        <div class="mb-10 max-w-md mx-auto relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fa-solid fa-search text-gray-400"></i>
            </div>
            <input 
                x-model="search"
                type="text" 
                class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-xl leading-5 bg-white placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm shadow-sm transition-all" 
                placeholder="Search categories...">
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div x-show="'<?php echo e(strtolower($category->name)); ?>'.includes(search.toLowerCase())" 
                 class="bg-white rounded-xl shadow-sm hover:shadow-xl border border-gray-100 p-6 transition-all duration-300 transform hover:-translate-y-1 group flex flex-col h-full">
                
                <div class="flex items-center justify-between mb-4">
                     <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center text-2xl font-bold shadow-lg shadow-blue-500/30">
                        <?php echo e(substr($category->name, 0, 1)); ?>

                    </div>
                    <span class="bg-gray-50 text-gray-600 text-xs font-semibold px-3 py-1 rounded-full border border-gray-200">
                        <?php echo e($category->quizzes_count); ?> Quizzes
                    </span>
                </div>

                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                    <?php echo e($category->name); ?>

                </h3>
                
                <p class="text-gray-500 text-sm mb-6 flex-grow">
                    Browse all quizzes available under <?php echo e($category->name); ?>.
                </p>

                <div class="mt-auto">
                    <a href="/user-quiz-list/<?php echo e($category->id); ?>/<?php echo e(str_replace(' ', '-', $category->name)); ?>" 
                       class="block w-full text-center py-2.5 bg-gray-50 text-gray-700 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition-colors border border-gray-200 hover:border-transparent">
                        View Quizzes
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- No Results State -->
        <div x-show="search.length > 0 && $el.querySelectorAll('.grid > div[x-show=\'true\']').length === 0" 
             x-effect="if (search.length > 0) $el.style.display = document.querySelectorAll('.grid > div').length > 0 && Array.from(document.querySelectorAll('.grid > div')).every(el => el.style.display === 'none') ? 'block' : 'none'"
             class="hidden text-center py-12">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                <i class="fa-solid fa-magnifying-glass text-gray-400 text-2xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900">No categories found</h3>
            <p class="text-gray-500">Try adjusting your search query.</p>
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
<?php /**PATH D:\quiz_app\quiz\quiz_system\resources\views/categories-list.blade.php ENDPATH**/ ?>