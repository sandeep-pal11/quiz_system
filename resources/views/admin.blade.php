<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    body {
      background: linear-gradient(135deg, #74ebd5, #ACB6E5);
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      border-radius: 1rem;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
    }

    .form-control {
      border-radius: 0.5rem;
    }

    .btn-primary {
      border-radius: 0.5rem;
      font-weight: bold;
    }

    .form-label {
      font-weight: 500;
    }

    .form-check-label {
      cursor: pointer;
    }
  </style>
  </head>
  <body class="bg-gray-100">
    
    <x-navbar :email="$email" />

     <!-- Category List -->
    <!-- Users List Card -->
<div class="w-full max-w-4xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-200 mt-10">
  <h2 class="text-3xl font-bold text-blue-600 text-center py-5 border-b border-gray-200 tracking-wide">
    👥 Users List
  </h2>

  <ul class="divide-y divide-gray-100">
    <!-- Header -->
    <li class="bg-blue-50 font-semibold text-gray-700">
      <ul class="flex justify-between items-center text-center py-3 px-6 uppercase tracking-wide text-sm">
        <li class="w-1/6">S. No</li>
        <li class="w-1/4">Name</li>
        <li class="w-2/4">Email</li>
      </ul>
    </li>

    <!-- Rows -->
    @foreach ($users as $key=>$user)
    <li class="hover:bg-blue-100 transition-all duration-300">
      <ul class="flex justify-between items-center text-center py-3 px-6">
        <li class="w-1/6 text-gray-700 font-semibold">{{ $key+1 }}</li>
        <li class="w-1/4 text-gray-800 font-medium">{{ $user->name }}</li>
        <li class="w-2/4 text-gray-600">{{ $user->email }}</li>
      </ul>
    </li>
    @endforeach

    <!-- No Users -->
    @if($users->isEmpty())
    <li class="text-center py-6 text-gray-500 italic bg-gray-50">
      No users found.
    </li>
    @endif
  </ul>
</div>

  </body>
</html>
