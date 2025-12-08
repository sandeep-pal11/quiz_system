<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Certificate</title>

  <!-- Tailwind CSS & Bootstrap -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background: linear-gradient(135deg, #74ebd5, #ACB6E5);
      font-family: 'Segoe UI', sans-serif;
    }

    /* Smooth hover animation */
    .card-hover:hover {
      transform: translateY(-5px);
      transition: all 0.3s ease;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    /* Search input animation */
    input:focus {
      box-shadow: 0 0 8px rgba(59, 130, 246, 0.6);
    }

    /* Scroll behavior */
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>

<body class="pt=10 text-center">

  <!-- Navbar -->
  <x-user-navbar></x-user-navbar>

  <!-- Page Container -->
  <div class="w-200 border-4 mt-10 bg-gray-100 border-indigo-900 p-10 text-center">
    <a class="text-green-500 font-bold" href="/download-certificate">Download</a>
     <a class="text-green-500 font-bold" href="/">Back</a>
    <h1 class="text-5xl">Certificate of complication</h1>
    <p class="text-2xl mt-5">This is clarify data</p>
    <h2 class="text-4xl">{{$data['name']}}</h2>
    <p class="text-5xl mt-5">has successfully completed the</p>
    <h3 class="text-3xl">{{$data['quiz']}}</h3>
    <p class="text-2xl">{{date('y-m-d')}}</p>


   

  </div>

  <!-- Footer -->
  <x-footer-user></x-footer-user>

</body>

</html>
