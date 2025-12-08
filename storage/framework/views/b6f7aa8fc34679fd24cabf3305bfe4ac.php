<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    body {
      background: linear-gradient(135deg, #74ebd5, #ACB6E5);
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      border-radius: 1rem;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
    }

    .form-control {
      border-radius: 0.5rem;
    }

    .btn-primary {
      border-radius: 0.5rem;
      font-weight: bold;
    }

    .form-label {
      font-weight: 500;
    }

    .form-check-label {
      cursor: pointer;
    }
  </style>
  </head>
  <body class="bg-gray-100">
    
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

     <!-- Category List -->
    <!-- Users List Card -->
<div class="w-full max-w-4xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-200 mt-10">
  <h2 class="text-3xl font-bold text-blue-600 text-center py-5 border-b border-gray-200 tracking-wide">
    👥 Users List
  </h2>

  <ul class="divide-y divide-gray-100">
    <!-- Header -->
    <li class="bg-blue-50 font-semibold text-gray-700">
      <ul class="flex justify-between items-center text-center py-3 px-6 uppercase tracking-wide text-sm">
        <li class="w-1/6">S. No</li>
        <li class="w-1/4">Name</li>
        <li class="w-2/4">Email</li>
      </ul>
    </li>

    <!-- Rows -->
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="hover:bg-blue-100 transition-all duration-300">
      <ul class="flex justify-between items-center text-center py-3 px-6">
        <li class="w-1/6 text-gray-700 font-semibold"><?php echo e($key+1); ?></li>
        <li class="w-1/4 text-gray-800 font-medium"><?php echo e($user->name); ?></li>
        <li class="w-2/4 text-gray-600"><?php echo e($user->email); ?></li>
      </ul>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- No Users -->
    <?php if($users->isEmpty()): ?>
    <li class="text-center py-6 text-gray-500 italic bg-gray-50">
      No users found.
    </li>
    <?php endif; ?>
  </ul>
</div>

  </body>
</html>
<?php /**PATH D:\quiz_app\quiz\resources\views/admin.blade.php ENDPATH**/ ?>