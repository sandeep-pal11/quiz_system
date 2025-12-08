<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>User Start Quiz</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #74ebd5, #ACB6E5);
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
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
  <?php if(session('message-success')): ?>
  <div>
    <p class="text-green-500 font-bold"><?php echo e(session('message-success')); ?></p>
  </div>
  <?php endif; ?>

  <!-- Full Page Container -->
  <div class="flex-1 flex items-center justify-center px-6 py-12">

    <div class="w-full max-w-3xl bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl p-10 text-center space-y-8 border border-blue-200">

      <!-- Quiz Title -->
      <h1 class="text-5xl font-extrabold text-blue-900 drop-shadow-md">
        <?php echo e($quizname); ?>

      </h1>

      <!-- Quiz Info -->
      <p class="text-lg text-gray-700 font-medium">
        This Quiz Contains 
        <span class="text-blue-700 font-bold"><?php echo e($quizcount); ?></span> Questions 
        and <span class="text-green-600 font-semibold">no limit</span> to attempt this Quiz.
      </p>

      <!-- Motivation -->
      <h2 class="text-3xl font-bold text-blue-800">
        🚀 Good Luck!
      </h2>

      <!-- Start / Login Buttons -->
      <div class="mt-6 flex flex-wrap justify-center gap-6">
        <?php if(session('user')): ?>
          <a href="/mcq/<?php echo e(session('firstmcq')->id); ?>/<?php echo e($quizname); ?>" 
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-10 py-4 rounded-2xl shadow-xl transition transform hover:scale-105">
            Start Quiz <i class="fa-solid fa-play ml-2"></i>
          </a>
        <?php else: ?>
          <a href="/user-quiz-start" 
            class="bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-xl shadow-md transition">
            SignUp to Start Quiz
          </a>
          <a href="/user-login-quiz" 
            class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-8 py-3 rounded-xl shadow-md transition">
            Login to Start Quiz
          </a>
        <?php endif; ?>
      </div>

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
<?php /**PATH D:\quiz_app\quiz\resources\views/user-start-quiz.blade.php ENDPATH**/ ?>