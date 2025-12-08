<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Quiz System Home Page</title>

  <!-- Tailwind CSS & Bootstrap -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background: linear-gradient(135deg, #74ebd5, #ACB6E5);
      font-family: 'Segoe UI', sans-serif;
    }

    .card-hover:hover {
      transform: translateY(-5px);
      transition: all 0.3s ease;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <x-user-navbar></x-user-navbar>

  <!-- Page Container -->
  <div class="flex flex-col min-h-screen items-center py-10 px-4">

    <h1 class="text-4xl md:text-5xl font-extrabold text-blue-800 drop-shadow-lg mb-10 text-center">
      Check Your Skills
    </h1>

    <!-- Search -->
    <div class="relative w-full max-w-md mb-12">
      <form action="/user-quiz-search" method="get" class="flex items-center">
        <input class="w-full px-5 py-3 text-gray-800 border border-gray-300 rounded-2xl shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
          type="text" name="search" placeholder="Search Quiz...">

        <button class="absolute right-3 top-3 bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full shadow-md transition">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>


    <!-- Category Table -->
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 card-hover mb-10">
      <h2 class="text-2xl font-bold text-blue-600 text-center py-4 border-b border-gray-200 bg-blue-50">
        Top Categories
      </h2>

      <ul>
        <li class="bg-blue-100 font-semibold text-gray-700">
          <ul class="flex justify-between text-center py-3 px-4">
            <li class="w-1/6">S. No</li>
            <li class="w-1/4">Name</li>
            <li class="w-1/4">Quiz Count</li>
            <li class="w-1/6">Action</li>
          </ul>
        </li>

        @forelse ($categories as $key => $category)
        <li class="hover:bg-blue-50 transition">
          <ul class="flex justify-between text-center py-3 px-4 border-t border-gray-200">
            <li class="w-1/6 flex items-center justify-center font-medium">{{ $key + 1 }}</li>
            <li class="w-1/4 flex items-center justify-center">{{ $category->name }}</li>
            <li class="w-1/4 flex items-center justify-center">{{ $category->quizzes_count }}</li>
            <li class="w-1/6 flex items-center justify-center gap-3">
              <a href="user-quiz-list/{{ $category->id }}/{{ str_replace('','-',$category->name) }}"
                class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full shadow-md transition">
                <i class="fa-solid fa-eye"></i>
              </a>
            </li>
          </ul>
        </li>
        @empty
        <li class="text-center py-5 text-gray-500">No categories found.</li>
        @endforelse
      </ul>
    </div>


    <!-- Quiz Table -->
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 card-hover mb-10">
      <h2 class="text-2xl font-bold text-blue-600 text-center py-4 border-b border-gray-200 bg-blue-50">
        Top Quiz
      </h2>

      <ul>
        <li class="bg-blue-100 font-semibold text-gray-700">
          <ul class="flex justify-between text-center py-3 px-4">
            <li class="w-3/6">Name</li>
            <li class="w-1/6">Action</li>
          </ul>
        </li>

        @forelse ($quizdata as $item)
        <li class="hover:bg-blue-50 transition">
          <ul class="flex justify-between text-center py-3 px-4 border-t border-gray-200">
            <li class="w-3/6 flex items-center justify-center font-medium">{{ $item->name }}</li>
            <li class="w-1/6 flex items-center justify-center">
              <a href="/start-quiz/{{ $item->id }}/{{ str_replace('','-',$item->name) }}"
                class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-3 py-1.5 rounded-full shadow-md text-sm font-semibold
                       flex items-center gap-1 hover:scale-110 hover:shadow-xl transition-all duration-200">
                <i class="fa-solid fa-play text-xs"></i>
                Attempt
              </a>
            </li>
          </ul>
        </li>
        @empty
        <li class="text-center py-5 text-gray-500">No quizzes found.</li>
        @endforelse
      </ul>
    </div>

  </div>

  <x-footer-user></x-footer-user>

  <!-- SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Signup Success -->
  @if(session('message-success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Registration Successful!',
      text: "{{ session('message-success') }}",
      confirmButtonColor: '#2563eb'
    }).then(() => {
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    });
  </script>
  @endif


  <!-- Login Success -->
  @if(session('message'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Login Successful!',
      text: "{{ session('message') }}",
      confirmButtonColor: '#2563eb'
    }).then(() => {
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    });
  </script>
  @endif


  <!-- Login Error -->
  @if(session('message-error'))
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Login Failed!',
      text: "{{ session('message-error') }}",
      confirmButtonColor: '#d33'
    }).then(() => {
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    });
  </script>
  @endif

</body>

</html>
