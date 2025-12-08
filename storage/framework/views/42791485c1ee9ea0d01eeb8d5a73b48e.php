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
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
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

<section class="min-vh-100 d-flex align-items-start pt-5">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card p-4">
          <div class="card-body text-center">

<?php if(!session('quizdetails')): ?>

  <h3 class="mb-4">Add Quiz</h3>
  <form action="/add-quiz" method="post">
    <?php echo csrf_field(); ?>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="quiz" placeholder="Enter quiz name" value="<?php echo e(old('quiz')); ?>" required>
      <label for="quiz">Enter Quiz Name</label>
      <?php $__errorArgs = ['quiz'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger text-start small"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-floating mb-3">
      <select class="form-control" name="category_id" required>
        <option value="">-- Select Category --</option>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
          <?php echo e($category->name); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
      <label for="category_id">Select Category</label>
      <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger text-start small"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <button type="submit" class="btn btn-primary w-100">Add</button>
  </form>

<?php else: ?>

  <p class="text-success fw-bold">Quiz : <?php echo e(session('quizdetails')->name); ?></p>
<p class="text-success fw-bold">Total MCQs : <?php echo e($totalmcq); ?></p>

 <a href="<?php echo e(route('show.quiz', [
        'id' => session('quizdetails')->id, 
        'quizName' => session('quizdetails')->name
    ])); ?>" 
   class="btn btn-info mt-2 text-sm">
   Show MCQs
</a>


  <h3 class="mb-4">Add MCQs</h3>

  <form action="/add-mcq" method="post">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="category_id" value="<?php echo e(session('quizdetails')->category_id); ?>">

    <div class="mb-2 text-start">
      <label for="question" class="form-label fw-semibold">Question</label>
      <textarea class="form-control" name="question" rows="4" required><?php echo e(old('question')); ?></textarea>
      <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger text-start small"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <input type="text" class="form-control mb-2" name="a" placeholder="Option A" value="<?php echo e(old('a')); ?>" required>
    <?php $__errorArgs = ['a'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger text-start small"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <input type="text" class="form-control mb-2" name="b" placeholder="Option B" value="<?php echo e(old('b')); ?>" required>
    <?php $__errorArgs = ['b'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger text-start small"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <input type="text" class="form-control mb-2" name="c" placeholder="Option C" value="<?php echo e(old('c')); ?>" required>
    <?php $__errorArgs = ['c'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger text-start small"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <input type="text" class="form-control mb-2" name="d" placeholder="Option D" value="<?php echo e(old('d')); ?>" required>
    <?php $__errorArgs = ['d'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger text-start small"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <div class="form-floating mb-3 text-start">
      <select class="form-control" name="correct_ans" required>
        <option value="">Select right answer</option>
        <option value="a" <?php echo e(old('correct_ans') == 'a' ? 'selected' : ''); ?>>A</option>
        <option value="b" <?php echo e(old('correct_ans') == 'b' ? 'selected' : ''); ?>>B</option>
        <option value="c" <?php echo e(old('correct_ans') == 'c' ? 'selected' : ''); ?>>C</option>
        <option value="d" <?php echo e(old('correct_ans') == 'd' ? 'selected' : ''); ?>>D</option>
      </select>
      <label for="correct_ans">Correct Answer</label>
      <?php $__errorArgs = ['correct_ans'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger text-start small"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <button type="submit" name="submit" value="Add More" class="btn btn-primary w-100 mb-2">Add More</button>
    <button type="submit" name="submit" value="done" class="btn btn-success w-100 mb-2 ">Add and Submit</button><br>
    <a href="/end-quiz" class="btn btn-danger w-100 ">Finish Quiz</a>
    
  </form>

<?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH D:\quiz_app\quiz\resources\views/add-quiz.blade.php ENDPATH**/ ?>