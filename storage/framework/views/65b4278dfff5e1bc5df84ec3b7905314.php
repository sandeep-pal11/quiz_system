<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Quiz Master</title>

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

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50 font-[Outfit] text-gray-800 antialiased h-screen flex flex-col">

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

    <div class="flex-grow flex items-center justify-center p-4">
        <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row shadow-blue-900/10">
            
            <!-- Left Side: Image/Decoration -->
            <div class="md:w-1/2 bg-blue-600 relative overflow-hidden flex flex-col justify-center items-center text-white p-12 text-center">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-indigo-700"></div>
                <!-- Abstract Pattern -->
                <div class="absolute inset-0 opacity-20">
                     <svg class="h-full w-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <path d="M0 100 C 20 0 50 0 100 100 Z" fill="white" />
                     </svg>
                </div>
                
                <div class="relative z-10">
                    <div class="mb-6 bg-white/20 backdrop-blur-lg p-4 rounded-2xl w-20 h-20 mx-auto flex items-center justify-center">
                        <i class="fa-solid fa-right-to-bracket text-4xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold mb-4">Welcome Back!</h2>
                    <p class="text-blue-100 text-lg">
                        Ready to test your knowledge? Login to access your personalized dashboard and continue your learning journey.
                    </p>
                </div>
                <div class="relative z-10 mt-12 text-sm text-blue-200">
                    Don't have an account? 
                    <a href="/user-signup" class="text-white font-bold hover:underline ml-1">Sign Up</a>
                </div>
            </div>

            <!-- Right Side: Form -->
            <div class="md:w-1/2 p-8 md:p-12 bg-white">
                <div class="text-center md:text-left mb-8">
                    <h3 class="text-2xl font-bold text-gray-900">Sign In</h3>
                    <p class="text-gray-500 mt-1">Please enter your details to sign in.</p>
                </div>

                <!-- Messages -->
                <?php if(session('message-error')): ?>
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 text-red-700 text-sm rounded-r-lg" role="alert">
                    <p class="font-bold">Error</p>
                    <p><?php echo e(session('message-error')); ?></p>
                </div>
                <?php endif; ?>
                
                <?php if(session('message-success')): ?>
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 text-green-700 text-sm rounded-r-lg" role="alert">
                    <p class="font-bold">Success</p>
                    <p><?php echo e(session('message-success')); ?></p>
                </div>
                <?php endif; ?>

                <?php if($errors->has('login_error')): ?>
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 text-red-700 text-sm rounded-r-lg">
                    <?php echo e($errors->first('login_error')); ?>

                </div>
                <?php endif; ?>

                <form action="<?php echo e(url('/user-login')); ?>" method="POST" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input type="email" name="email" id="email" 
                                value="<?php echo e(old('email')); ?>"
                                class="pl-10 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm bg-gray-50 py-3 border <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 ring-red-200 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> transition-all" 
                                placeholder="you@example.com">
                        </div>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input type="password" name="password" id="password" 
                                class="pl-10 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm bg-gray-50 py-3 border <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 ring-red-200 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> transition-all" 
                                placeholder="••••••••">
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Options -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="rememberMe" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="rememberMe" class="ml-2 block text-sm text-gray-700">Remember me</label>
                        </div>
                        <div class="text-sm">
                            <a href="<?php echo e(url('/user-forgot-password')); ?>" class="font-medium text-blue-600 hover:text-blue-500">
                                Forgot password?
                            </a>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div>
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all transform hover:-translate-y-0.5">
                            Sign In
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Simple Footer for Auth Pages -->
    <div class="bg-white border-t border-gray-200 py-6 text-center text-sm text-gray-500">
        &copy; <?php echo e(date('Y')); ?> Quiz Master. All rights reserved.
    </div>

</body>
</html>
<?php /**PATH D:\quiz_app\quiz\quiz_system\resources\views/user-login.blade.php ENDPATH**/ ?>