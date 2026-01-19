<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Access Control</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>

<body class="bg-gray-900 font-[Outfit] text-gray-100 antialiased h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Background Decoration -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-[-10%] right-[-10%] w-[40%] h-[40%] bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-[-10%] left-[20%] w-[40%] h-[40%] bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Login Card -->
    <div class="w-full max-w-md bg-gray-800/80 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-gray-700 relative z-10">
        <div class="p-8">
            
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-tr from-blue-600 to-purple-600 text-white text-3xl mb-4 shadow-lg shadow-blue-500/30">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
                <h2 class="text-2xl font-bold text-white tracking-tight">Admin Portal</h2>
                <p class="text-gray-400 text-sm mt-2">Secure access for administrators only.</p>
            </div>

            
            <?php if($errors->has('login_error')): ?>
              <div class="mb-6 bg-red-900/50 border-l-4 border-red-500 p-4 rounded-r-lg backdrop-blur-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fa-solid fa-circle-exclamation text-red-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-200 font-medium">
                            <?php echo e($errors->first('login_error')); ?>

                        </p>
                    </div>
                </div>
              </div>
            <?php endif; ?>

            <form action="<?php echo e(url('/admin-login')); ?>" method="POST" class="space-y-6" novalidate>
                <?php echo csrf_field(); ?>

                
                <div class="space-y-2">
                    <label for="email" class="text-sm font-medium text-gray-300 ml-1">Email Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500 group-focus-within:text-blue-500 transition-colors">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <input type="text" id="email" name="email" placeholder="admin@quizmaster.com" value="<?php echo e(old('email')); ?>"
                            class="block w-full pl-10 pr-3 py-3 border border-gray-600 rounded-xl bg-gray-900/50 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent sm:text-sm transition-all shadow-inner <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 focus:ring-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-xs text-red-400 ml-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="space-y-2">
                    <label for="password" class="text-sm font-medium text-gray-300 ml-1">Password</label>
                     <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500 group-focus-within:text-blue-500 transition-colors">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input type="password" id="password" name="password" placeholder="••••••••"
                            class="block w-full pl-10 pr-3 py-3 border border-gray-600 rounded-xl bg-gray-900/50 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent sm:text-sm transition-all shadow-inner <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 focus:ring-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                       <p class="text-xs text-red-400 ml-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="flex items-center justify-between mt-4">
                     <label class="flex items-center space-x-2 cursor-pointer group">
                        <input type="checkbox" class="form-checkbox w-4 h-4 text-blue-600 bg-gray-700 border-gray-600 rounded focus:ring-blue-500 focus:ring-offset-gray-800 transition">
                        <span class="text-sm text-gray-400 group-hover:text-gray-200 transition-colors">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-blue-400 hover:text-blue-300 font-medium transition-colors">Forgot Password?</a>
                </div>

                <button type="submit" 
                    class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-blue-600/20 text-sm font-bold text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-blue-500 transition-all transform hover:-translate-y-0.5">
                    Sign In to Dashboard <i class="fa-solid fa-arrow-right ml-2 mt-0.5"></i>
                </button>
            </form>

        </div>
        <div class="bg-gray-800/50 p-4 border-t border-gray-700 text-center">
            <p class="text-xs text-gray-500">&copy; <?php echo e(date('Y')); ?> Quiz Master Admin System</p>
        </div>
    </div>
    
    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>

</body>
</html>
<?php /**PATH D:\quiz_app\quiz\quiz_system\resources\views/admin-login.blade.php ENDPATH**/ ?>