<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Search Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

    <!-- Title + Back -->
    <div class="flex items-center justify-between w-full max-w-4xl mb-6">
      <h1 class="text-3xl font-extrabold text-blue-800 drop-shadow-lg">
        Search: {{ $quiz }}
      </h1>
      <a href="/" 
         class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md transition flex items-center gap-2">
        <i class="fa fa-arrow-left"></i> Back
      </a>
    </div>

    <!-- Quiz List -->
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
      <h2 class="text-2xl font-bold text-blue-600 text-center py-4 border-b border-gray-200">
        Quiz List
      </h2>

      <ul>
        <!-- Header -->
        <li class="bg-blue-50 font-semibold text-gray-700">
          <ul class="flex justify-between text-center py-3 px-4">
            <li class="w-1/6">Quiz ID</li>
            <li class="w-3/6">Name</li>
            <li class="w-3/6">Mcq Count</li>
            <li class="w-1/6">Action</li>
          </ul>
        </li>

        <!-- Data Rows -->
        @foreach ($quizdata as $key=> $item)
        <li class="hover:bg-blue-100 transition">
          <ul class="flex justify-between text-center py-3 px-4 border-t border-gray-200">
            <li class="w-1/6 flex items-center justify-center font-medium">{{$key+1}}</</li>
            <li class="w-3/6 flex items-center justify-center">{{ $item->name }}</li>
            <li class="w-3/6 flex items-center justify-center">{{ $item->mcq_count }}</li>
            <li class="w-1/6 flex items-center justify-center">
             <a href="/start-quiz/{{$item->id}}/{{$item->name}}" class="text-blue-500 font-bold">Attempt Quiz</a>
            </li>
          </ul>
        </li>
        @endforeach
      </ul>
    </div>
  </div>

</body>
</html>
