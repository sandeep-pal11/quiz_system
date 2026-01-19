<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Quiz Master</title>

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
        <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row shadow-indigo-900/10">
            
            <!-- Left Side: Image/Decoration -->
            <div class="md:w-1/2 bg-indigo-600 relative overflow-hidden flex flex-col justify-center items-center text-white p-12 text-center order-last md:order-first">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 to-purple-700"></div>
                <!-- Abstract Pattern -->
                <div class="absolute inset-0 opacity-20">
                    <svg class="h-full w-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <path d="M100 0 C 80 100 50 100 0 0 Z" fill="white" />
                    </svg>
                </div>
                
                <div class="relative z-10">
                    <div class="mb-6 bg-white/20 backdrop-blur-lg p-4 rounded-2xl w-20 h-20 mx-auto flex items-center justify-center">
                        <i class="fa-solid fa-user-plus text-4xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold mb-4">Join Us Today!</h2>
                    <p class="text-indigo-100 text-lg">
                        Create an account to start tracking your progress, competing in quizzes, and earning certificates.
                    </p>
                </div>
                <div class="relative z-10 mt-12 text-sm text-indigo-200">
                    Already have an account? 
                    <a href="/user-login" class="text-white font-bold hover:underline ml-1">Log In</a>
                </div>
            </div>

            <!-- Right Side: Form -->
            <div class="md:w-1/2 p-8 md:p-12 bg-white overflow-y-auto max-h-[85vh]"> <!-- Added overflow for smaller screens just in case -->
                <div class="text-center md:text-left mb-8">
                    <h3 class="text-2xl font-bold text-gray-900">Create Account</h3>
                    <p class="text-gray-500 mt-1">Fill in the details below to get started.</p>
                </div>

                <?php if($errors->has('login_error')): ?>
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 text-red-700 text-sm rounded-r-lg">
                    <?php echo e($errors->first('login_error')); ?>

                </div>
                <?php endif; ?>

                <form action="<?php echo e(url('/user-signup')); ?>" method="POST" class="space-y-5">
                    <?php echo csrf_field(); ?>
                    
                    <!-- Username -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fas fa-user"></i>
                            </div>
                            <input type="text" name="name" id="name" 
                                value="<?php echo e(old('name')); ?>"
                                class="pl-10 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-50 py-3 border <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 ring-red-200 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> transition-all" 
                                placeholder="John Doe">
                        </div>
                        <?php $__errorArgs = ['name'];
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

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input type="email" name="email" id="email" 
                                value="<?php echo e(old('email')); ?>"
                                class="pl-10 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-50 py-3 border <?php $__errorArgs = ['email'];
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
                                class="pl-10 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-50 py-3 border <?php $__errorArgs = ['password'];
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

                     <!-- Confirm Password -->
                     <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input type="password" name="password_confirmation" id="password_confirmation" 
                                class="pl-10 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-50 py-3 border transition-all" 
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Terms Functionality (Optional visual) -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                          <input id="terms" name="terms" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                          <label for="terms" class="font-medium text-gray-700">I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-500">Terms and Conditions</a></label>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div>
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-lg text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all transform hover:-translate-y-0.5">
                            Create Account
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
<?php /**PATH D:\quiz_app\quiz\quiz_system\resources\views/user-signup.blade.php ENDPATH**/ ?>