<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Search Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #74ebd5, #ACB6E5);
      font-family: 'Segoe UI', sans-serif;
    }
  </style>
</head>

<body>

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

  <div class="flex flex-col min-h-screen items-center py-10 px-4">

    <!-- Title + Back -->
    <div class="flex items-center justify-between w-full max-w-4xl mb-6">
      <h1 class="text-3xl font-extrabold text-blue-800 drop-shadow-lg">
        Search: <?php echo e($quiz); ?>

      </h1>
      <a href="/" 
         class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md transition flex items-center gap-2">
        <i class="fa fa-arrow-left"></i> Back
      </a>
    </div>

    <!-- Quiz List -->
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
      <h2 class="text-2xl font-bold text-blue-600 text-center py-4 border-b border-gray-200">
        Quiz List
      </h2>

      <ul>
        <!-- Header -->
        <li class="bg-blue-50 font-semibold text-gray-700">
          <ul class="flex justify-between text-center py-3 px-4">
            <li class="w-1/6">Quiz ID</li>
            <li class="w-3/6">Name</li>
            <li class="w-3/6">Mcq Count</li>
            <li class="w-1/6">Action</li>
          </ul>
        </li>

        <!-- Data Rows -->
        <?php $__currentLoopData = $quizdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="hover:bg-blue-100 transition">
          <ul class="flex justify-between text-center py-3 px-4 border-t border-gray-200">
            <li class="w-1/6 flex items-center justify-center font-medium"><?php echo e($key+1); ?></</li>
            <li class="w-3/6 flex items-center justify-center"><?php echo e($item->name); ?></li>
            <li class="w-3/6 flex items-center justify-center"><?php echo e($item->mcq_count); ?></li>
            <li class="w-1/6 flex items-center justify-center">
             <a href="/start-quiz/<?php echo e($item->id); ?>/<?php echo e($item->name); ?>" class="text-blue-500 font-bold">Attempt Quiz</a>
            </li>
          </ul>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  </div>

</body>
</html>
<?php /**PATH D:\quiz_app\quiz\resources\views/user-quiz-search.blade.php ENDPATH**/ ?>