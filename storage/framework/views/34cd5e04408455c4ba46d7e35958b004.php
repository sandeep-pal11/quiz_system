<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>MCQ Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- 🔹 SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    <!-- Title + Quiz Info -->
    <div class="w-full max-w-4xl text-center space-y-4">
      <!-- Quiz Name -->
      <h1 class="text-3xl font-extrabold text-blue-900 drop-shadow-lg">
        <?php echo e($quizname); ?>

      </h1>

      <!-- Question Progress -->
      <?php if(session()->has('currentquiz')): ?>
        <div class="flex justify-center items-center space-x-3">
          <span class="bg-blue-600 text-white px-4 py-1 rounded-full text-lg font-semibold shadow">
            Question <?php echo e(session('currentquiz')['currentmcq']); ?>

          </span>
          <span class="text-gray-700 font-medium text-lg">
            of <?php echo e(session('currentquiz')['totalmcq']); ?>

          </span>
        </div>
      <?php else: ?>
        <h2 class="text-lg font-bold text-red-600">Question not available</h2>
      <?php endif; ?>

      <!-- Question Box -->
      <div class="mt-4 p-6 bg-white shadow-2xl rounded-2xl w-full">
        <h3 class="text-blue-900 font-bold text-xl mb-4">
          <?php echo e($mcqdata->question); ?>

        </h3>

        <form action="/submit-next/<?php echo e($mcqdata->id); ?>" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" value="<?php echo e($mcqdata->id); ?>">

          <!-- Options -->
          <label for="option_1" class="flex border p-3 mt-2 rounded-xl cursor-pointer hover:bg-blue-50 transition">
            <input id="option_1" name="answer" class="mt-1 text-blue-500" type="radio" value="a">
            <span class="pl-2"><?php echo e($mcqdata->a); ?></span>
          </label>

          <label for="option_2" class="flex border p-3 mt-2 rounded-xl cursor-pointer hover:bg-blue-50 transition">
            <input id="option_2" name="answer" class="mt-1 text-blue-500" type="radio" value="b">
            <span class="pl-2"><?php echo e($mcqdata->b); ?></span>
          </label>

          <label for="option_3" class="flex border p-3 mt-2 rounded-xl cursor-pointer hover:bg-blue-50 transition">
            <input id="option_3" name="answer" class="mt-1 text-blue-500" type="radio" value="c">
            <span class="pl-2"><?php echo e($mcqdata->c); ?></span>
          </label>

          <label for="option_4" class="flex border p-3 mt-2 rounded-xl cursor-pointer hover:bg-blue-50 transition">
            <input id="option_4" name="answer" class="mt-1 text-blue-500" type="radio" value="d">
            <span class="pl-2"><?php echo e($mcqdata->d); ?></span>
          </label>

          <!-- Submit Button -->
          <button type="submit"
            class="mt-6 bg-blue-600 text-white px-8 py-3 rounded-xl shadow-lg font-semibold text-lg hover:bg-blue-700 transition">
            Submit Answer & Next <i class="fa-solid fa-arrow-right ml-2"></i>
          </button>
        </form>

        <!-- 🔹 SweetAlert2 Validation Script -->
        <script>
          document.querySelector("form").addEventListener("submit", function(e) {
            let selected = document.querySelector('input[name="answer"]:checked');

            if (!selected) {
              e.preventDefault();
              Swal.fire({
                icon: 'warning',
                title: 'Please Select an Option!',
                text: '⚠️ You must select an answer before moving to next question!',
                confirmButtonColor: '#2563eb',
                confirmButtonText: 'OK'
              });
            }
          });
        </script>

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
<?php /**PATH D:\quiz_app\quiz\resources\views/mcq-page.blade.php ENDPATH**/ ?>