<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>User Details page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #74ebd5, #ACB6E5);
      font-family: 'Segoe UI', sans-serif;
    }
  </style>
</head>

<body>
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

  <!-- Page Container -->
  <div class="flex flex-col min-h-screen items-center py-10 px-4">
    <!-- Title -->
    <h1 class="text-4xl font-extrabold text-blue-800 drop-shadow-lg mb-6">
      Attempted Quiz
    </h1>

    <ul class="w-full max-w-3xl bg-white shadow-lg rounded-lg overflow-hidden">
      <!-- Header -->
      <li class="bg-blue-50 font-semibold text-gray-700">
        <ul class="flex justify-between text-center py-3 px-4">
          <li class="w-1/6">S. No</li>
          <li class="w-1/2">Quiz Name</li>
          <li class="w-1/4">Status</li>
        </ul>
      </li>

      <!-- Data Rows -->
      <?php $__empty_1 = true; $__currentLoopData = $quizrecord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li class="hover:bg-blue-100 transition">
          <ul class="flex justify-between text-center py-3 px-4 border-t border-gray-200">
            <li class="w-1/6 flex items-center justify-center font-medium"><?php echo e($key + 1); ?></li>
            <li class="w-1/2 flex items-center justify-center"><?php echo e($record->name); ?></li>
            <li class="w-1/4 flex items-center justify-center">
<?php if($record->status == 2): ?>
    <span class="text-green-500">Completed</span>
<?php else: ?>
    <span class="text-red-500">Not Completed</span>
<?php endif; ?>

          </ul>
        </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <li class="text-center py-4 text-gray-600">No quizzes attempted yet.</li>
      <?php endif; ?>
    </ul>
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
<?php /**PATH D:\quiz_app\quiz\resources\views/user-details.blade.php ENDPATH**/ ?>