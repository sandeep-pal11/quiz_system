<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Quiz System Home Page</title>

  <!-- Tailwind CSS & Bootstrap -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background: linear-gradient(135deg, #74ebd5, #ACB6E5);
      font-family: 'Segoe UI', sans-serif;
    }

    .card-hover:hover {
      transform: translateY(-5px);
      transition: all 0.3s ease;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
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

    <h1 class="text-4xl md:text-5xl font-extrabold text-blue-800 drop-shadow-lg mb-10 text-center">
      Check Your Skills
    </h1>

    <!-- Search -->
    <div class="relative w-full max-w-md mb-12">
      <form action="/user-quiz-search" method="get" class="flex items-center">
        <input class="w-full px-5 py-3 text-gray-800 border border-gray-300 rounded-2xl shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
          type="text" name="search" placeholder="Search Quiz...">

        <button class="absolute right-3 top-3 bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full shadow-md transition">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>


    <!-- Category Table -->
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 card-hover mb-10">
      <h2 class="text-2xl font-bold text-blue-600 text-center py-4 border-b border-gray-200 bg-blue-50">
        Top Categories
      </h2>

      <ul>
        <li class="bg-blue-100 font-semibold text-gray-700">
          <ul class="flex justify-between text-center py-3 px-4">
            <li class="w-1/6">S. No</li>
            <li class="w-1/4">Name</li>
            <li class="w-1/4">Quiz Count</li>
            <li class="w-1/6">Action</li>
          </ul>
        </li>

        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li class="hover:bg-blue-50 transition">
          <ul class="flex justify-between text-center py-3 px-4 border-t border-gray-200">
            <li class="w-1/6 flex items-center justify-center font-medium"><?php echo e($key + 1); ?></li>
            <li class="w-1/4 flex items-center justify-center"><?php echo e($category->name); ?></li>
            <li class="w-1/4 flex items-center justify-center"><?php echo e($category->quizzes_count); ?></li>
            <li class="w-1/6 flex items-center justify-center gap-3">
              <a href="user-quiz-list/<?php echo e($category->id); ?>/<?php echo e(str_replace('','-',$category->name)); ?>"
                class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full shadow-md transition">
                <i class="fa-solid fa-eye"></i>
              </a>
            </li>
          </ul>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <li class="text-center py-5 text-gray-500">No categories found.</li>
        <?php endif; ?>
      </ul>
    </div>


    <!-- Quiz Table -->
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 card-hover mb-10">
      <h2 class="text-2xl font-bold text-blue-600 text-center py-4 border-b border-gray-200 bg-blue-50">
        Top Quiz
      </h2>

      <ul>
        <li class="bg-blue-100 font-semibold text-gray-700">
          <ul class="flex justify-between text-center py-3 px-4">
            <li class="w-3/6">Name</li>
            <li class="w-1/6">Action</li>
          </ul>
        </li>

        <?php $__empty_1 = true; $__currentLoopData = $quizdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li class="hover:bg-blue-50 transition">
          <ul class="flex justify-between text-center py-3 px-4 border-t border-gray-200">
            <li class="w-3/6 flex items-center justify-center font-medium"><?php echo e($item->name); ?></li>
            <li class="w-1/6 flex items-center justify-center">
              <a href="/start-quiz/<?php echo e($item->id); ?>/<?php echo e(str_replace('','-',$item->name)); ?>"
                class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-3 py-1.5 rounded-full shadow-md text-sm font-semibold
                       flex items-center gap-1 hover:scale-110 hover:shadow-xl transition-all duration-200">
                <i class="fa-solid fa-play text-xs"></i>
                Attempt
              </a>
            </li>
          </ul>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <li class="text-center py-5 text-gray-500">No quizzes found.</li>
        <?php endif; ?>
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

  <!-- SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Signup Success -->
  <?php if(session('message-success')): ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Registration Successful!',
      text: "<?php echo e(session('message-success')); ?>",
      confirmButtonColor: '#2563eb'
    }).then(() => {
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    });
  </script>
  <?php endif; ?>


  <!-- Login Success -->
  <?php if(session('message')): ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Login Successful!',
      text: "<?php echo e(session('message')); ?>",
      confirmButtonColor: '#2563eb'
    }).then(() => {
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    });
  </script>
  <?php endif; ?>


  <!-- Login Error -->
  <?php if(session('message-error')): ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Login Failed!',
      text: "<?php echo e(session('message-error')); ?>",
      confirmButtonColor: '#d33'
    }).then(() => {
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    });
  </script>
  <?php endif; ?>

</body>

</html>
<?php /**PATH D:\quiz_app\quiz\resources\views/welcome.blade.php ENDPATH**/ ?>