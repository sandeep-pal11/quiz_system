<!-- Footer User Component -->
<footer class="bg-gray-900 text-white mt-auto font-[Outfit]">
    <div class="max-w-7xl mx-auto px-6 py-10">

        <!-- Top Links -->
        <div class="flex flex-col md:flex-row justify-between items-center border-b border-gray-800 pb-8 gap-6">
            
            <!-- Brand Name -->
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-gradient-to-tr from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center text-white font-bold">Q</div>
                <h2 class="text-xl font-bold tracking-wide text-white">QuizMaster</h2>
            </div>

            <!-- Navigation Links -->
            <div class="flex gap-8 text-sm font-medium text-gray-400">
                <a href="/" class="hover:text-white transition-colors">Home</a>
                <a href="/about-us" class="hover:text-white transition-colors">About Us</a>
                <a href="/contact-us" class="hover:text-white transition-colors">Contact Us</a>
        
            </div>

            <!-- Social Icons -->
            <div class="flex gap-4">
                <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all transform hover:-translate-y-1">
                    <i class="fab fa-facebook-f text-sm"></i>
                </a>
                <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-sky-500 hover:text-white transition-all transform hover:-translate-y-1">
                    <i class="fab fa-twitter text-sm"></i>
                </a>
                <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-pink-600 hover:text-white transition-all transform hover:-translate-y-1">
                    <i class="fab fa-instagram text-sm"></i>
                </a>
                <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-blue-700 hover:text-white transition-all transform hover:-translate-y-1">
                    <i class="fab fa-linkedin-in text-sm"></i>
                </a>
            </div>
        </div>

        <!-- Bottom Text -->
        <div class="text-center text-sm mt-8 text-gray-500">
            &copy; <?php echo e(date('Y')); ?> QuizMaster. All Rights Reserved. <span class="hidden md:inline">|</span> Unlocking knowledge, one quiz at a time.
        </div>
    </div>
</footer>
<?php /**PATH D:\quiz_app\quiz\quiz_system\resources\views/components/footer-user.blade.php ENDPATH**/ ?>