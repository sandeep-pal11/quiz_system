<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - User Management</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">

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

<body class="bg-gray-50 font-[Outfit] text-gray-800 antialiased flex flex-col min-h-screen">

    <?php if (isset($component)) { $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e = $attributes; } ?>
<?php $component = App\View\Components\Navbar::resolve(['email' => $email] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navbar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $attributes = $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $component = $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>

    <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="md:flex md:items-center md:justify-between mb-8">
            <div class="flex-1 min-w-0">
                <nav class="flex mb-3" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li><a href="/dashboard" class="text-gray-400 hover:text-gray-500"><i class="fa-solid fa-home"></i></a></li>
                        <li><span class="text-gray-300">/</span></li>
                        <li><span class="text-sm font-medium text-gray-900" aria-current="page">Users</span></li>
                    </ol>
                </nav>
                <h2 class="text-3xl font-bold leading-7 text-gray-900 sm:text-4xl sm:truncate">
                    User Management
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    View and manage all registered users in the system.
                </p>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                 <!-- Example action button if needed later -->
                 <!-- <button type="button" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <i class="fa-solid fa-download mr-2"></i> Export Users
                 </button> -->
            </div>
        </div>

        <!-- Users Table Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                S. No
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                User Name
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Email Address
                            </th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-blue-50/50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                #<?php echo e($key + 1); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <span class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold text-lg shadow-sm">
                                            <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                                        </span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-gray-900"><?php echo e($user->name); ?></div>
                                        <div class="text-xs text-gray-500">Registered User</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-600 flex items-center gap-2">
                                    <i class="fa-regular fa-envelope text-gray-400"></i> <?php echo e($user->email); ?>

                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <?php if($user->active > 0): ?>
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">
                                        Active
                                    </span>
                                <?php else: ?>
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">
                                        Blocked
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end gap-3">
                                    <?php if($user->active > 0): ?>
                                    <a href="<?php echo e(url('toggle-user-status/'.$user->id)); ?>" class="text-orange-500 hover:text-orange-700 bg-orange-50 hover:bg-orange-100 p-2 rounded-lg transition-colors border border-transparent hover:border-orange-200" title="Block User">
                                        <i class="fa-solid fa-ban"></i>
                                    </a>
                                    <?php else: ?>
                                    <a href="<?php echo e(url('toggle-user-status/'.$user->id)); ?>" class="text-green-500 hover:text-green-700 bg-green-50 hover:bg-green-100 p-2 rounded-lg transition-colors border border-transparent hover:border-green-200" title="Unblock User">
                                        <i class="fa-solid fa-check"></i>
                                    </a>
                                    <?php endif; ?>

                                    <button onclick="confirmUserDelete(<?php echo e($user->id); ?>)" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors border border-transparent hover:border-red-200" title="Delete User">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fa-solid fa-users-slash text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-lg font-medium">No users found.</p>
                                    <p class="text-sm">New registered users will appear here.</p>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
             <!-- Pagination if available in future -->
            <div class="bg-gray-50 px-4 py-3 border-t border-gray-200 sm:px-6">
                <!-- <div class="text-xs text-center text-gray-500">Showing all <?php echo e(count($users)); ?> users</div> -->
            </div>
        </div>

    </main>

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmUserDelete(id) {
            Swal.fire({
                title: 'Delete User?',
                text: "This action cannot be undone. The user will be permanently removed.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete user!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/delete-user/" + id;
                }
            })
        }

        <?php if(session('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "<?php echo e(session('success')); ?>",
                showConfirmButton: false,
                timer: 1500
            });
        <?php endif; ?>

        <?php if($errors->any()): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "<?php echo e($errors->first()); ?>",
            });
        <?php endif; ?>
    </script>
</body>
</html>
<?php /**PATH D:\quiz_app\quiz\quiz_system\resources\views/admin-users.blade.php ENDPATH**/ ?>