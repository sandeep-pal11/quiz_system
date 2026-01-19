<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-blue-200 to-blue-300">

    <div class="bg-white shadow-2xl rounded-2xl w-full max-w-md p-8 text-center border border-gray-200">
        <div class="flex justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16 12H8m8 0a4 4 0 11-8 0 4 4 0 018 0zm0 0v6m0-6a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </div>

        <h1 class="text-3xl font-bold text-blue-700 mb-3">Email Verification</h1>
        <p class="text-gray-600 mb-6">Click the link below to verify your email:</p>

        <a href="<?php echo e($link); ?>" 
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full shadow-md transition duration-300">
            Verify Email
        </a>

        <p class="mt-4 text-sm text-gray-500">Or copy the link below into your browser:</p>
        <a href="<?php echo e($link); ?>" class="text-blue-600 break-all hover:underline"><?php echo e($link); ?></a>
    </div>

</body>
</html>
<?php /**PATH D:\quiz_app\quiz\quiz_system\resources\views/mail/user-verify.blade.php ENDPATH**/ ?>