<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Quiz List</title>
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

  <div class="flex flex-col min-h-screen items-center py-10 px-4">

    <!-- Title + Back -->
    <div class="flex items-center justify-between w-full max-w-4xl mb-6">
      <h1 class="text-3xl font-extrabold text-blue-800 drop-shadow-lg">
        Category: <?php echo e($category); ?>

      </h1>
      <a href="/add-quiz" 
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
            <li class="w-1/6">Action</li>
          </ul>
        </li>

        <!-- Data Rows -->
        <?php $__currentLoopData = $quizdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="hover:bg-blue-100 transition">
          <ul class="flex justify-between text-center py-3 px-4 border-t border-gray-200">
            <li class="w-1/6 flex items-center justify-center font-medium"><?php echo e($key+1); ?></li>
            <li class="w-3/6 flex items-center justify-center"><?php echo e($item->name); ?></li>
            <li class="w-1/6 flex items-center justify-center">
              <a href="<?php echo e(route('show.quiz', [$item->id, $item->name])); ?>" 
                 class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full shadow-md transition">
                <i class="fa-solid fa-eye"></i>
              </a>
            </li>
          </ul>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>

    <p class="text-center mt-6 text-gray-600">&copy; 2025 Admin Portal</p>
  </div>

</body>
</html>
<?php /**PATH D:\quiz_app\quiz\resources\views/quiz-list.blade.php ENDPATH**/ ?>