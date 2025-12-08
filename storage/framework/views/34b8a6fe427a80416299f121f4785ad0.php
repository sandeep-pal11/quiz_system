<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz System</title>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Navbar -->
  <nav class="bg-white shadow-md px-6 py-4 sticky top-0 z-50">
    <div class="flex justify-between items-center max-w-7xl mx-auto">

      <!-- Logo -->
      <div>
        <a href="/" class="text-2xl font-bold text-gray-800 hover:text-blue-600 transition duration-200">
          Quiz System
        </a>
      </div>

      <!-- Navigation Links -->
      <div class="flex items-center space-x-6 text-base font-medium">
        <a href="/" class="text-gray-700 hover:text-blue-500 transition duration-200">
          Home
        </a>
        <a href="/categories-list" class="text-gray-700 hover:text-blue-500 transition duration-200">
          Categories
        </a>
        <?php if(session('user')): ?>
        <a href="/user-details" class="text-gray-700 hover:text-blue-500 transition duration-200">
          Welcome,<?php echo e(session('user')->name); ?>

        </a>
        <a href="/user-logout" class="text-gray-700 hover:text-blue-500 transition duration-200">
          Logout
        </a>
        <?php else: ?>
        <a href="/user-login" class="text-gray-700 hover:text-blue-500 transition duration-200">
          Login
        </a>
        <a href="/user-signup" class="text-gray-700 hover:text-blue-500 transition duration-200">
          Sign-Up
        </a>
        <?php endif; ?>
      </div>
    </div>
  </nav>

</body>
</html>
<?php /**PATH D:\quiz_app\quiz\resources\views/components/user-navbar.blade.php ENDPATH**/ ?>