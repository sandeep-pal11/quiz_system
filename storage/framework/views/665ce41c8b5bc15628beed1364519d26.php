<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Categories list</title>

  <!-- Tailwind CSS & Bootstrap -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Datatable CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

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

    html {
      scroll-behavior: smooth;
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

  <!-- Page -->
  <div class="flex flex-col min-h-screen items-center py-10 px-4">

    <?php if(session('message-success')): ?>
    <div class="mb-6 bg-green-100 border-l-4 border-green-600 text-green-800 p-3 rounded shadow-md w-full max-w-md text-center">
      <p class="font-semibold"><?php echo e(session('message-success')); ?></p>
    </div>
    <?php endif; ?>

    <h1 class="text-4xl md:text-5xl font-extrabold text-blue-800 drop-shadow-lg mb-10 text-center">
      Check Your Skills
    </h1>



    <!-- Category List -->
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 card-hover mb-10">
      <h2 class="text-2xl font-bold text-blue-600 text-center py-4 border-b border-gray-200 bg-blue-50">
        Top Categories
      </h2>

      <div class="p-4">
        <table id="catTable" class="table table-striped table-bordered w-100 text-center">
          <thead class="bg-blue-100 text-gray-800 font-semibold">
            <tr>
              <th>S. No</th>
              <th>Name</th>
              <th>Quiz Count</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($category->name); ?></td>
              <td><?php echo e($category->quizzes_count); ?></td>
              <td>
                <a href="/user-quiz-list/<?php echo e($category->id); ?>/<?php echo e(str_replace(' ', '-', $category->name)); ?>"
                  class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full shadow-md transition">
                  <i class="fa-solid fa-eye"></i>
                </a>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
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

  <!-- jQuery + Datatable JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#catTable').DataTable({
        paging: true,
        searching: true,
        ordering: true
      });
    });
  </script>

</body>
</html>
<?php /**PATH D:\quiz_app\quiz\resources\views/categories-list.blade.php ENDPATH**/ ?>