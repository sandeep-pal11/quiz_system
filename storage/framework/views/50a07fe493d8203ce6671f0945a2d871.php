<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Details - <?php echo e($quizName); ?></title>
    
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
        
        <!-- Header Section -->
        <div class="mb-8">
            <a href="/user-details" class="inline-flex items-center text-sm text-gray-500 hover:text-blue-600 mb-4 transition-colors">
                <i class="fa-solid fa-arrow-left mr-2"></i> Back to Dashboard
            </a>
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                     <h1 class="text-3xl font-bold text-gray-900"><?php echo e($quizName); ?> <span class="text-gray-400 font-light">Results</span></h1>
                     <p class="text-gray-500 text-sm mt-1">Detailed breakdown of your performance.</p>
                </div>
                
                <!-- Score Card -->
                <div class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-gray-200 flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-xs uppercase tracking-wider font-bold text-gray-400">Your Score</p>
                        <p class="text-2xl font-bold <?php echo e($score >= 50 ? 'text-green-600' : 'text-orange-500'); ?>">
                            <?php echo e($score); ?>%
                        </p>
                    </div>
                    <div class="h-10 w-px bg-gray-200"></div>
                     <div class="text-left">
                        <p class="text-xs uppercase tracking-wider font-bold text-gray-400">Correct</p>
                        <p class="text-lg font-bold text-gray-800">
                            <?php echo e($correctAnswers); ?> <span class="text-gray-400 text-sm">/ <?php echo e($totalQuestions); ?></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Questions Analysis -->
        <div class="space-y-6 max-w-4xl mx-auto">
            
            <?php $__currentLoopData = $resultData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                <!-- Question Header -->
                <div class="p-6 border-b border-gray-50 flex items-start gap-4">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm
                        <?php echo e($result->is_correct ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'); ?>">
                        <?php echo e($index + 1); ?>

                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 leading-snug">
                            <?php echo e($result->mcq->question); ?>

                        </h3>
                    </div>
                    <div class="ml-auto flex-shrink-0">
                         <?php if($result->is_correct): ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Correct
                            </span>
                        <?php else: ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                Incorrect
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Answer Analysis -->
                <div class="p-6 bg-gray-50/50">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        
                        <!-- User Selected Answer -->
                        <div class="p-4 rounded-xl border <?php echo e($result->is_correct ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200'); ?>">
                            <p class="text-xs font-bold uppercase tracking-wider mb-2 <?php echo e($result->is_correct ? 'text-green-600' : 'text-red-600'); ?>">
                                Your Answer
                            </p>
                            <p class="font-medium text-gray-800">
                                <span class="font-bold mr-1 uppercase"><?php echo e($result->select_answer); ?>.</span>
                                <?php echo e($result->mcq->{$result->select_answer}); ?>

                            </p>
                        </div>

                        <!-- Correct Answer (Show only if wrong) -->
                        <?php if(!$result->is_correct): ?>
                        <div class="p-4 rounded-xl border bg-blue-50 border-blue-200">
                            <p class="text-xs font-bold uppercase tracking-wider mb-2 text-blue-600">
                                Correct Answer
                            </p>
                            <p class="font-medium text-gray-800">
                                <span class="font-bold mr-1 uppercase"><?php echo e($result->mcq->correct_ans); ?>.</span>
                                <?php echo e($result->mcq->{$result->mcq->correct_ans}); ?>

                            </p>
                        </div>
                        <?php else: ?>
                         <div class="p-4 rounded-xl border border-gray-200 bg-white opacity-50 flex items-center justify-center text-gray-400 text-sm">
                            <i class="fa-solid fa-check mr-2"></i> You got it right!
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

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
<?php /**PATH D:\quiz_app\quiz\quiz_system\resources\views/user-quiz-result-details.blade.php ENDPATH**/ ?>