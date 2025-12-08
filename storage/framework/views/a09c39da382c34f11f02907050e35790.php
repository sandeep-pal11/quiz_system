<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Admin Categories Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

 <style>
  body {
    background: linear-gradient(135deg, #74ebd5, #ACB6E5);
    font-family: 'Segoe UI', sans-serif;
  }

  .card {
    border-radius: 1rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    background: white;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
  }

  .form-control {
    border-radius: 0.5rem;
  }

  /* Back Button */
  .btn-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(90deg, #0d6efd, #4a8dfd);
    color: white;
    padding: 6px 16px;
    border-radius: 0.5rem;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .btn-back:hover {
    background: linear-gradient(90deg, #084298, #2e6de6);
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
    text-decoration: none;
    color: white;
  }

  /* Table Header */
  .table-header {
    background: linear-gradient(90deg, #f0f4ff, #dbe7ff);
    border-radius: 0.3rem;
    font-weight: 600;
    color: #0d6efd;
  }

  /* Table Rows */
  .mcq-row {
    transition: background 0.3s ease, transform 0.15s ease;
    background: white;
    border-bottom: 1px solid rgba(0,0,0,0.05);
  }

  .mcq-row:hover {
    background: rgba(13, 110, 253, 0.08);
    transform: scale(1.01);
  }

  /* Footer */
  .footer-text {
    font-size: 0.85rem;
    color: rgba(0, 0, 0, 0.6);
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

  <section class="vh-100 d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card p-4">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Quiz Name : <?php echo e($quizName); ?></h3>
                <a class="btn-back" href="/add-quiz">
                  <i class="fa fa-arrow-left"></i> Back
                </a>
              </div>

              <div class="w-full max-w-4xl mx-auto">
                <ul class="border border-gray-200 rounded">
                  <!-- Header Row -->
                  <li class="p-2 table-header">
                    <ul class="flex justify-between text-center">
                      <li class="w-30">MCQ Id</li>
                      <li class="w-170">Question</li>
                    </ul>
                  </li>

                  <!-- Data Rows -->
                  <?php $__currentLoopData = $mcqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$mcq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="p-2 mcq-row">
                    <ul class="flex justify-between text-center">
                      <li class="w-30 flex items-center justify-center"><?php echo e($key+1); ?></li>
                      <li class="w-170 flex items-center justify-center"><?php echo e($mcq->question); ?></li>
                    </ul>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            </div>
          </div>
          <p class="text-center mt-3 text-muted">&copy; 2025 Admin Portal</p>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH D:\quiz_app\quiz\resources\views/show-quiz.blade.php ENDPATH**/ ?>