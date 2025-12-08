<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Certificate of Completion</title>

  <!-- Tailwind CSS & Bootstrap -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background: linear-gradient(135deg, #74ebd5, #ACB6E5);
      font-family: 'Segoe UI', sans-serif;
      padding-top: 60px;
    }

    .certificate-container {
      background: #fff;
      border: 10px solid #4f46e5;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      border-radius: 20px;
      padding: 60px 40px;
      width: 90%;
      max-width: 800px;
      margin: 50px auto;
      position: relative;
      overflow: hidden;
    }

    .certificate-container::before {
      content: "";
      position: absolute;
      top: 15px;
      left: 15px;
      right: 15px;
      bottom: 15px;
      border: 3px dashed #6366f1;
      border-radius: 15px;
      pointer-events: none;
    }

    .logo {
      width: 100px;
      height: 100px;
      margin: 0 auto;
    }

    .certificate-title {
      color: #4f46e5;
      font-weight: 700;
      letter-spacing: 2px;
    }

    .name {
      color: #111827;
      border-bottom: 2px solid #4f46e5;
      display: inline-block;
      padding: 5px 20px;
      font-weight: 600;
    }

    .download-btn {
      background: #4f46e5;
      color: #fff;
      border-radius: 30px;
      padding: 10px 25px;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s;
    }

    .download-btn:hover {
      background: #4338ca;
      box-shadow: 0 4px 10px rgba(79, 70, 229, 0.5);
    }

    @media print {
      .download-btn,
      x-user-navbar,
      x-footer-user {
        display: none;
      }
      body {
        background: none;
      }
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <x-user-navbar></x-user-navbar>

  <!-- Certificate Container -->
  <div class="certificate-container text-center">

    <!-- Logo -->
    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Certificate Logo" class="logo mb-4">

    <!-- Certificate Title -->
    <h1 class="certificate-title text-4xl mb-3">Certificate of Completion</h1>

    <p class="text-gray-600 text-lg mb-4">This is to certify that</p>

    <!-- Student Name -->
    <h2 class="name text-3xl mb-4">Sandeep Pal</h2>

    <p class="text-gray-700 text-xl mb-2">has successfully completed the</p>
    <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Python Quiz</h3>

    <p class="text-gray-600 text-lg mb-5">Awarded on <b>{{ date('Y-m-d') }}</b></p>

    <div class="flex justify-between mt-10">
      <div class="text-left">
        <p class="text-sm text-gray-600">Authorized Signature</p>
        <hr class="w-32 border-gray-400">
      </div>
      <div class="text-right">
        <p class="text-sm text-gray-600">Institution Seal</p>
        <hr class="w-32 border-gray-400">
      </div>
    </div>

    <!-- Download Button -->
    <div class="mt-8">
      <a href="#" onclick="window.print()" class="download-btn"><i class="fa-solid fa-download me-2"></i>Download Certificate</a>
    </div>

  </div>

  <!-- Footer -->
  <x-footer-user></x-footer-user>

</body>

</html>
