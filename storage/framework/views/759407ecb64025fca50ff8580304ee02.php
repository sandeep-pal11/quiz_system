<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Admin Categories Page</title>
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

  <div class="flex flex-col items-center py-10 px-4 min-h-screen">

    <!-- Title -->
    <h1 class="text-4xl font-extrabold text-blue-800 drop-shadow-lg mb-8">
      Manage Categories
    </h1>

    <!-- Add Category Card -->
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl p-6 mb-10">

      <h3 class="text-2xl font-bold text-center text-blue-700 mb-6">Add Category</h3>

      <?php if($errors->any()): ?>
      <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 flex justify-between items-center">
        <?php echo e($errors->first()); ?>

        <button type="button" onclick="this.parentElement.remove()">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
      <?php endif; ?>

      <form action="/add-category" method="POST" class="space-y-4">
        <?php echo csrf_field(); ?>
        <div>
          <label for="category" class="block mb-1 font-medium text-gray-700">
            <i class="fas fa-tag me-2"></i>Category Name
          </label>
          <input type="text" id="category" name="category"
                 value="<?php echo e(old('category')); ?>"
                 class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
          <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold shadow-md transition">
          Add
        </button>
      </form>
    </div>

    <!-- Category List -->
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
      <h2 class="text-2xl font-bold text-blue-600 text-center py-4 border-b border-gray-200">
        Category List
      </h2>

      <ul>
        <!-- Header -->
        <li class="bg-blue-50 font-semibold text-gray-700">
          <ul class="flex justify-between text-center py-3 px-4">
            <li class="w-1/6">S. No</li>
            <li class="w-1/4">Name</li>
            <li class="w-2/4">Creator</li>
            <li class="w-1/6">Action</li>
          </ul>
        </li>

        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="hover:bg-blue-100 transition">
          <ul class="flex justify-between text-center py-3 px-4 border-t border-gray-200">
            <li class="w-1/6 flex items-center justify-center font-medium"><?php echo e($key+1); ?></li>
            <li class="w-1/4 flex items-center justify-center"><?php echo e($category->name); ?></li>
            <li class="w-2/4 flex items-center justify-center"><?php echo e($category->creator); ?></li>
            <li class="w-1/6 flex items-center justify-center gap-3">

              <!-- 🚨 DELETE SWEET ALERT -->
              <button onclick="confirmDelete(<?php echo e($category->id); ?>)"
                class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full shadow-md transition">
                <i class="fa-solid fa-trash"></i>
              </button>

              <!-- View Quiz -->
              <a href="quiz-list/<?php echo e($category->id); ?>/<?php echo e($category->name); ?>"
                 class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full shadow-md transition">
                <i class="fa-solid fa-eye"></i>
              </a>

            </li>
          </ul>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </ul>
    </div>

  </div>

  <p class="text-center mt-6 text-white">&copy; 2025 Admin Portal</p>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- DELETE CONFIRM -->
  <script>
    function confirmDelete(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "This category will be permanently deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Delete!",
        cancelButtonText: "Cancel",
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "/category/delete/" + id;
        }
      });
    }
  </script>

  <!-- SUCCESS POPUP (MCQ or Category Save) -->
  <?php if(session('success')): ?>
  <script>
    Swal.fire({
      icon: "success",
      title: "Success!",
      text: "<?php echo e(session('success')); ?>",
      confirmButtonColor: "#2563eb"
    }).then(() => {
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    });
  </script>
  <?php endif; ?>

</body>
</html>
<?php /**PATH D:\quiz_app\quiz\resources\views/categories.blade.php ENDPATH**/ ?>