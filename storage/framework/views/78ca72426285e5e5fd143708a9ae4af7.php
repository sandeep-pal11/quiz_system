<nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      
      <!-- Logo -->
      <div class="flex items-center gap-3">
        <div class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center shadow-lg shadow-blue-600/20">
            <span class="text-white font-bold text-xl">Q</span>
        </div>
        <a href="/dashboard" class="text-xl font-bold text-gray-900 tracking-tight">
          Admin<span class="text-blue-600">Panel</span>
        </a>
      </div>

      <!-- Navigation Links -->
      <div class="hidden md:block">
        <div class="ml-10 flex items-baseline space-x-2">
          
          <a href="/dashboard" class="px-3 py-2 rounded-lg text-sm font-medium transition-all <?php echo e(request()->is('dashboard') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'); ?>">
            <i class="fa-solid fa-gauge mr-1.5 <?php echo e(request()->is('dashboard') ? 'text-blue-600' : 'text-gray-400'); ?>"></i> Dashboard
          </a>

          <a href="/admin-users" class="px-3 py-2 rounded-lg text-sm font-medium transition-all <?php echo e(request()->is('admin-users') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'); ?>">
            <i class="fa-solid fa-users mr-1.5 <?php echo e(request()->is('admin-users') ? 'text-blue-600' : 'text-gray-400'); ?>"></i> Users
          </a>

          <a href="/admin-categories" class="px-3 py-2 rounded-lg text-sm font-medium transition-all <?php echo e(request()->is('admin-categories') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'); ?>">
            <i class="fa-solid fa-layer-group mr-1.5 <?php echo e(request()->is('admin-categories') ? 'text-blue-600' : 'text-gray-400'); ?>"></i> Categories
          </a>

           <a href="/add-quiz" class="px-3 py-2 rounded-lg text-sm font-medium transition-all <?php echo e(request()->is('add-quiz') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'); ?>">
            <i class="fa-solid fa-plus-circle mr-1.5 <?php echo e(request()->is('add-quiz') ? 'text-blue-600' : 'text-gray-400'); ?>"></i> Add Quiz
          </a>
          
          <a href="/all-quizzes" class="px-3 py-2 rounded-lg text-sm font-medium transition-all <?php echo e(request()->is('all-quizzes') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'); ?>">
            <i class="fa-solid fa-list-check mr-1.5 <?php echo e(request()->is('all-quizzes') ? 'text-blue-600' : 'text-gray-400'); ?>"></i> All Quizzes
          </a>

        </div>
      </div>

      <!-- User Profile & Logout -->
      <div class="flex items-center gap-4">
          <div class="hidden md:flex flex-col items-end text-right">
              <span class="text-sm font-bold text-gray-900 leading-tight block max-w-[150px] truncate" title="<?php echo e($email ?? 'Admin'); ?>">
                  <?php echo e($email ?? 'Admin'); ?>

              </span>
              <span class="text-[10px] uppercase tracking-wider text-blue-600 font-bold block mt-0.5">Administrator</span>
          </div>
          
          <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center border border-gray-200 shadow-sm">
              <i class="fa-solid fa-user-tie text-gray-500 text-lg"></i>
          </div>

          <div class="h-8 w-px bg-gray-200 mx-1"></div>

          <a href="/admin-logout" class="group flex items-center justify-center h-10 w-10 rounded-full hover:bg-red-50 transition-all border border-transparent hover:border-red-100" title="Logout">
             <i class="fa-solid fa-right-from-bracket text-gray-400 group-hover:text-red-500 text-lg transition-colors"></i>
          </a>
      </div>

    </div>
  </div>
</nav>
<?php /**PATH D:\quiz_app\quiz\quiz_system\resources\views/components/navbar.blade.php ENDPATH**/ ?>