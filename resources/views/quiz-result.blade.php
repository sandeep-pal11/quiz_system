<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Quiz Result Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #74ebd5, #ACB6E5);
      font-family: 'Segoe UI', sans-serif;
    }
    .fa-check-circle, .fa-times-circle {
      margin-right: 6px;
      vertical-align: middle;
    }
  </style>
</head>

<body>

  <x-user-navbar></x-user-navbar>

  <div class="flex flex-col min-h-screen items-center py-10 px-4">

    <h1 class="text-4xl font-extrabold text-blue-900 drop-shadow-lg mb-6">
      Quiz Result
    </h1>

    @php 
      $total = count($resultData);
      $percentage = round(($correctAns / $total) * 100);
    @endphp

    @if($percentage > 70)
    <a class="text-green-600 font-bold block mb-4" href="/certificate">
      🎉 View and Download Certificate
    </a>
    @endif

    <!-- Summary Card -->
    <div class="w-full max-w-2xl mb-8">
      <div class="rounded-2xl shadow-lg p-6 text-center
        {{ $percentage >= 70 ? 'bg-green-100 border-l-8 border-green-500' : 
           ($percentage >= 40 ? 'bg-yellow-100 border-l-8 border-yellow-500' : 
           'bg-red-100 border-l-8 border-red-500') }}">
        <h2 class="text-2xl font-bold text-gray-800">
          You got <span class="text-blue-700">{{ $correctAns }}</span> out of 
          <span class="text-blue-700">{{ $total }}</span> correct ({{ $percentage }}%)
        </h2>
      </div>
    </div>

    <!-- Result Table -->
    <div class="w-full max-w-5xl bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
      <h2 class="text-2xl font-bold text-blue-600 text-center py-4 border-b border-gray-200">
        Answer Details
      </h2>

      <ul>
        <li class="bg-blue-50 font-semibold text-gray-700">
          <ul class="flex justify-between text-center py-3 px-4">
            <li class="w-1/6">S. No</li>
            <li class="w-1/2">Question</li>
            <li class="w-1/4">Result</li>
          </ul>
        </li>

        @foreach ($resultData as $key => $item)
        <li class="hover:bg-blue-50 transition">
          <ul class="flex justify-between text-center py-3 px-4 border-t border-gray-200">
            <li class="w-1/6 flex items-center justify-center font-medium">{{ $key + 1 }}</li>
            <li class="w-1/2 flex items-center justify-center">{{ $item->question }}</li>

            @if($item->is_correct)
            <li class="w-1/4 flex items-center justify-center">
              <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 font-semibold text-sm">
                <i class="fa-solid fa-check-circle"></i> Correct
              </span>
            </li>
            @else
            <li class="w-1/4 flex items-center justify-center">
              <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 font-semibold text-sm">
                <i class="fa-solid fa-times-circle"></i> Incorrect
              </span>
            </li>
            @endif
          </ul>
        </li>
        @endforeach
      </ul>
    </div>
  </div>

  <x-footer-user></x-footer-user>

</body>
</html>
