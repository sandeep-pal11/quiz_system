<nav class="bg-white shadow-md px-6 py-4">
  <div class="flex justify-between items-center max-w-7xl mx-auto">

    <!-- Logo -->
    <div>
      <a href="/dashboard" class="text-2xl font-bold text-gray-800 hover:text-blue-600 transition duration-200">
        Quiz System
      </a>
    </div>

    <!-- Navigation Links -->
    <div class="flex items-center space-x-6 text-base font-medium">
      <a href="/admin-categories" class="text-gray-700 hover:text-blue-500 transition duration-200">
        Categories
      </a>
      <a href="/add-quiz" class="text-gray-700 hover:text-blue-500 transition duration-200">
        Quiz
      </a>
      <span class="text-gray-700 hover:text-green-600 transition duration-200 cursor-default">
        Welcome <?php echo e($email); ?>

      </span>
      <a href="/admin-logout" class="text-gray-700 hover:text-red-500 transition duration-200">
        Logout
      </a>
    </div>

  </div>
</nav>
<?php /**PATH D:\quiz_app\quiz\resources\views/components/navbar.blade.php ENDPATH**/ ?>