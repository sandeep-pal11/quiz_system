<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Quiz Master</title>

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

        <!-- Header -->
        <div class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">Contact Us</h1>
                <p class="mt-4 text-xl text-gray-500 max-w-2xl mx-auto">
                    Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                </p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

                <!-- Contact Info Section -->
                <div class="space-y-8">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">Get in touch</h3>
                        <p class="mt-2 text-gray-600 text-lg">
                            We are here to help you with any questions or support you might need.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 text-xl">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900">Our Office</h4>
                                <p class="text-gray-600 mt-1">
                                    123 Innovation Street,<br>
                                    Tech City, India 400001
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 text-xl">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900">Email Us</h4>
                                <p class="text-gray-600 mt-1">
                                    <a href="mailto:support@quizmaster.com" class="hover:text-blue-600 transition">sandeeppal8471@gmail.com.com</a>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 text-xl">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900">Call Us</h4>
                                <p class="text-gray-600 mt-1">
                                    +91 9664561379
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-8 border-t border-gray-200">
                        <h4 class="font-bold text-gray-900 mb-4">Follow us</h4>
                        <div class="flex gap-4">
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-blue-600 hover:text-white transition-all">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-blue-400 hover:text-white transition-all">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-pink-600 hover:text-white transition-all">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-blue-700 hover:text-white transition-all">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 sm:p-10">
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" id="name" name="name" class="block w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none" placeholder="John Doe">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" id="email" name="email" class="block w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none" placeholder="john@example.com">
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea id="message" name="message" rows="4" class="block w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none" placeholder="How can we help you?"></textarea>
                        </div>

                        <button type="button" onclick="alert('Thank you! We will contact you shortly.')" class="w-full bg-blue-600 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-blue-500/30 hover:bg-blue-700 hover:shadow-blue-500/40 hover:-translate-y-0.5 transition-all duration-200">
                            Send Message
                        </button>
                    </form>
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
<?php /**PATH D:\quiz_app\quiz\quiz_system\resources\views/contact-us.blade.php ENDPATH**/ ?>