<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>MCQ Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- 🔹 SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      background: linear-gradient(135deg, #74ebd5, #ACB6E5);
      font-family: 'Segoe UI', sans-serif;
    }
  </style>
</head>

<body>

  <x-user-navbar></x-user-navbar>

  <div class="flex flex-col min-h-screen items-center py-10 px-4">

    <!-- Title + Quiz Info -->
    <div class="w-full max-w-4xl text-center space-y-4">
      <!-- Quiz Name -->
      <h1 class="text-3xl font-extrabold text-blue-900 drop-shadow-lg">
        {{$quizname}}
      </h1>

      <!-- Question Progress -->
      @if(session()->has('currentquiz'))
        <div class="flex justify-center items-center space-x-3">
          <span class="bg-blue-600 text-white px-4 py-1 rounded-full text-lg font-semibold shadow">
            Question {{ session('currentquiz')['currentmcq'] }}
          </span>
          <span class="text-gray-700 font-medium text-lg">
            of {{ session('currentquiz')['totalmcq'] }}
          </span>
        </div>
      @else
        <h2 class="text-lg font-bold text-red-600">Question not available</h2>
      @endif

      <!-- Question Box -->
      <div class="mt-4 p-6 bg-white shadow-2xl rounded-2xl w-full">
        <h3 class="text-blue-900 font-bold text-xl mb-4">
          {{$mcqdata->question}}
        </h3>

        <form action="/submit-next/{{$mcqdata->id}}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$mcqdata->id}}">

          <!-- Options -->
          <label for="option_1" class="flex border p-3 mt-2 rounded-xl cursor-pointer hover:bg-blue-50 transition">
            <input id="option_1" name="answer" class="mt-1 text-blue-500" type="radio" value="a">
            <span class="pl-2">{{$mcqdata->a}}</span>
          </label>

          <label for="option_2" class="flex border p-3 mt-2 rounded-xl cursor-pointer hover:bg-blue-50 transition">
            <input id="option_2" name="answer" class="mt-1 text-blue-500" type="radio" value="b">
            <span class="pl-2">{{$mcqdata->b}}</span>
          </label>

          <label for="option_3" class="flex border p-3 mt-2 rounded-xl cursor-pointer hover:bg-blue-50 transition">
            <input id="option_3" name="answer" class="mt-1 text-blue-500" type="radio" value="c">
            <span class="pl-2">{{$mcqdata->c}}</span>
          </label>

          <label for="option_4" class="flex border p-3 mt-2 rounded-xl cursor-pointer hover:bg-blue-50 transition">
            <input id="option_4" name="answer" class="mt-1 text-blue-500" type="radio" value="d">
            <span class="pl-2">{{$mcqdata->d}}</span>
          </label>

          <!-- Submit Button -->
          <button type="submit"
            class="mt-6 bg-blue-600 text-white px-8 py-3 rounded-xl shadow-lg font-semibold text-lg hover:bg-blue-700 transition">
            Submit Answer & Next <i class="fa-solid fa-arrow-right ml-2"></i>
          </button>
        </form>

        <!-- 🔹 SweetAlert2 Validation Script -->
        <script>
          document.querySelector("form").addEventListener("submit", function(e) {
            let selected = document.querySelector('input[name="answer"]:checked');

            if (!selected) {
              e.preventDefault();
              Swal.fire({
                icon: 'warning',
                title: 'Please Select an Option!',
                text: '⚠️ You must select an answer before moving to next question!',
                confirmButtonColor: '#2563eb',
                confirmButtonText: 'OK'
              });
            }
          });
        </script>

      </div>
    </div>

  </div>

  <x-footer-user></x-footer-user>
</body>
</html>
