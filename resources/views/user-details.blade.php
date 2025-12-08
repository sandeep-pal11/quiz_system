<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>User Details page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #74ebd5, #ACB6E5);
      font-family: 'Segoe UI', sans-serif;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <x-user-navbar></x-user-navbar>

  <!-- Page Container -->
  <div class="flex flex-col min-h-screen items-center py-10 px-4">
    <!-- Title -->
    <h1 class="text-4xl font-extrabold text-blue-800 drop-shadow-lg mb-6">
      Attempted Quiz
    </h1>

    <ul class="w-full max-w-3xl bg-white shadow-lg rounded-lg overflow-hidden">
      <!-- Header -->
      <li class="bg-blue-50 font-semibold text-gray-700">
        <ul class="flex justify-between text-center py-3 px-4">
          <li class="w-1/6">S. No</li>
          <li class="w-1/2">Quiz Name</li>
          <li class="w-1/4">Status</li>
        </ul>
      </li>

      <!-- Data Rows -->
      @forelse ($quizrecord as $key => $record)
        <li class="hover:bg-blue-100 transition">
          <ul class="flex justify-between text-center py-3 px-4 border-t border-gray-200">
            <li class="w-1/6 flex items-center justify-center font-medium">{{ $key + 1 }}</li>
            <li class="w-1/2 flex items-center justify-center">{{ $record->name }}</li>
            <li class="w-1/4 flex items-center justify-center">
@if($record->status == 2)
    <span class="text-green-500">Completed</span>
@else
    <span class="text-red-500">Not Completed</span>
@endif

          </ul>
        </li>
      @empty
        <li class="text-center py-4 text-gray-600">No quizzes attempted yet.</li>
      @endforelse
    </ul>
  </div>

  <x-footer-user></x-footer-user>
</body>
</html>
