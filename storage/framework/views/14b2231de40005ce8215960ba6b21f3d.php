<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Quiz Master</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tailwind CSS -->
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

<body class="bg-gray-50 font-[Outfit] text-gray-800 antialiased flex flex-col min-h-screen">

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

    <main class="flex-grow">

        <!-- Hero Section -->
        <div class="relative bg-blue-700 overflow-hidden">
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-blue-900 mix-blend-multiply opacity-50"></div>
                <div class="absolute top-0 left-0 w-full h-full bg-[url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071&auto=format&fit=crop')] bg-cover bg-center opacity-30"></div>
            </div>
            
            <div class="relative max-w-7xl mx-auto py-24 px-4 sm:px-6 lg:px-8 text-center sm:text-left flex flex-col sm:flex-row items-center justify-between gap-8">
                <div class="sm:max-w-xl">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                        About <span class="text-blue-200">Quiz Master</span>
                    </h1>
                    <p class="mt-6 text-xl text-blue-100 max-w-3xl">
                        We are passionate about learning and assessment. Our mission is to make creating and taking quizzes effortless, engaging, and accessible for everyone.
                    </p>
                </div>
            </div>
        </div>

        <!-- Mission Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-bold uppercase tracking-wider text-sm">Our Philosophy</span>
                <h2 class="text-3xl font-bold text-gray-900 mt-2">Why We Built This?</h2>
                <div class="w-24 h-1.5 bg-blue-600 mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-gray-500 max-w-2xl mx-auto">
                    In a world of information overload, testing your knowledge should be clean, focused, and fun.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100 text-center hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mx-auto mb-6">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Learn Anywhere</h3>
                    <p class="text-gray-500 leading-relaxed">
                        Access quizzes from any device, anytime. Whether you're a student or a professional, learning never stops.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100 text-center hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center text-2xl mx-auto mb-6">
                        <i class="fa-solid fa-chart-pie"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Real-time Analytics</h3>
                    <p class="text-gray-500 leading-relaxed">
                        Track your progress instantly. See your scores, review answers, and identify areas for improvement.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100 text-center hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center text-2xl mx-auto mb-6">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Secure & Private</h3>
                    <p class="text-gray-500 leading-relaxed">
                        Your data and results are safe with us. We value your privacy and insure a secure testing environment.
                    </p>
                </div>
            </div>
        </div>

        <!-- Team Stats Section (Optional Visual Filler) -->
        <div class="bg-gray-900 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="text-4xl font-bold text-blue-400 mb-2">10k+</div>
                        <div class="text-gray-400 font-medium">Active Users</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-blue-400 mb-2">500+</div>
                        <div class="text-gray-400 font-medium">Quizzes Created</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-blue-400 mb-2">1M+</div>
                        <div class="text-gray-400 font-medium">Questions Answered</div>
                    </div>
                    <div>
                         <div class="text-4xl font-bold text-blue-400 mb-2">4.9</div>
                        <div class="text-gray-400 font-medium">User Rating</div>
                    </div>
                </div>
            </div>
        </div>

    </main>

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

</body>
</html>
<?php /**PATH D:\quiz_app\quiz\quiz_system\resources\views/about.blade.php ENDPATH**/ ?>