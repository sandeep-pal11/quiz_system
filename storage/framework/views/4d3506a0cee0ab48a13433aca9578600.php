<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Quiz Result Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #74ebd5, #ACB6E5);
      font-family: 'Segoe UI', sans-serif;
    }
    .fa-check-circle, .fa-times-circle {
      margin-right: 6px;
      vertical-align: middle;
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

    <h1 class="text-4xl font-extrabold text-blue-900 drop-shadow-lg mb-6">
      Quiz Result
    </h1>

    <?php 
      $total = count($resultData);
      $percentage = round(($correctAns / $total) * 100);
    ?>

    <?php if($percentage > 70): ?>
    <a class="text-green-600 font-bold block mb-4" href="/certificate">
      🎉 View and Download Certificate
    </a>
    <?php endif; ?>

    <!-- Summary Card -->
    <div class="w-full max-w-2xl mb-8">
      <div class="rounded-2xl shadow-lg p-6 text-center
        <?php echo e($percentage >= 70 ? 'bg-green-100 border-l-8 border-green-500' : 
           ($percentage >= 40 ? 'bg-yellow-100 border-l-8 border-yellow-500' : 
           'bg-red-100 border-l-8 border-red-500')); ?>">
        <h2 class="text-2xl font-bold text-gray-800">
          You got <span class="text-blue-700"><?php echo e($correctAns); ?></span> out of 
          <span class="text-blue-700"><?php echo e($total); ?></span> correct (<?php echo e($percentage); ?>%)
        </h2>
      </div>
    </div>

    <!-- Result Table -->
    <div class="w-full max-w-5xl bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
      <h2 class="text-2xl font-bold text-blue-600 text-center py-4 border-b border-gray-200">
        Answer Details
      </h2>

      <ul>
        <li class="bg-blue-50 font-semibold text-gray-700">
          <ul class="flex justify-between text-center py-3 px-4">
            <li class="w-1/6">S. No</li>
            <li class="w-1/2">Question</li>
            <li class="w-1/4">Result</li>
          </ul>
        </li>

        <?php $__currentLoopData = $resultData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="hover:bg-blue-50 transition">
          <ul class="flex justify-between text-center py-3 px-4 border-t border-gray-200">
            <li class="w-1/6 flex items-center justify-center font-medium"><?php echo e($key + 1); ?></li>
            <li class="w-1/2 flex items-center justify-center"><?php echo e($item->question); ?></li>

            <?php if($item->is_correct): ?>
            <li class="w-1/4 flex items-center justify-center">
              <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 font-semibold text-sm">
                <i class="fa-solid fa-check-circle"></i> Correct
              </span>
            </li>
            <?php else: ?>
            <li class="w-1/4 flex items-center justify-center">
              <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 font-semibold text-sm">
                <i class="fa-solid fa-times-circle"></i> Incorrect
              </span>
            </li>
            <?php endif; ?>
          </ul>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
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
<?php /**PATH D:\quiz_app\quiz\resources\views/quiz-result.blade.php ENDPATH**/ ?>