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
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .certificate-box {
      max-width: 850px;
      margin: 80px auto;
      background: #ffffff;
      border: 5px solid #4f46e5;
      border-radius: 16px;
      padding: 60px 40px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      position: relative;
    }

    .certificate-box:hover {
      transform: translateY(-3px);
      transition: 0.3s;
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.2);
    }

    .certificate-icon {
      width: 90px;
      height: 90px;
      margin: 0 auto 15px;
    }

    h1 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #1e3a8a;
      margin-bottom: 10px;
    }

    .certificate-text {
      color: #4b5563;
      font-size: 1.2rem;
      margin-top: 10px;
    }

    .student-name {
      font-size: 2rem;
      font-weight: 700;
      color: #312e81;
      border-bottom: 2px solid #4f46e5;
      display: inline-block;
      padding: 5px 20px;
      margin: 15px 0;
    }

    .quiz-title {
      color: #1e40af;
      font-size: 1.6rem;
      font-weight: 600;
    }

    .date-text {
      color: #374151;
      font-size: 1rem;
      margin-top: 20px;
    }

    /* Buttons */
    .btn-custom,
    .btn-back {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      font-weight: 600;
      text-decoration: none;
      border-radius: 8px;
      padding: 10px 20px;
      transition: 0.3s;
    }

    .btn-custom {
      background-color: #16a34a;
      color: white;
    }

    .btn-custom:hover {
      background-color: #15803d;
      transform: translateY(-2px);
    }

    .btn-back {
      background-color: #2563eb;
      color: white;
    }

    .btn-back:hover {
      background-color: #1e40af;
      transform: translateY(-2px);
    }

    .btn-container {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 40px;
    }

    @media print {
      .no-print,
      x-user-navbar,
      x-footer-user {
        display: none !important;
      }

      body {
        background: none;
        padding: 0;
      }

      .certificate-box {
        box-shadow: none;
        border: 3px solid #4f46e5;
      }
    }
  </style>
</head>

<body>

  <!-- Certificate -->
  <div class="certificate-box text-center">
    <img src="https://img.icons8.com/?size=100&id=86716&format=png&color=000000" alt="Certificate Icon"
      class="certificate-icon">

    <h1>Certificate of Completion</h1>
    <p class="certificate-text">This certifies that</p>

    <h2 class="student-name"><?php echo e($data['name']); ?></h2>

    <p class="certificate-text">has successfully completed the quiz</p>
    <h3 class="quiz-title"><?php echo e($data['quiz']); ?></h3>

    <p class="date-text">Awarded on <strong><?php echo e(date('Y-m-d')); ?></strong></p>

    <!-- Buttons -->
    <div class="btn-container no-print">
      <a href="#" class="btn-custom" onclick="window.print()">
        <i class="fa-solid fa-download"></i> Download
      </a>
      <a href="/" class="btn-back">
        <i class="fa-solid fa-arrow-left"></i> Back
      </a>
    </div>
  </div>



</body>

</html>
<?php /**PATH D:\quiz_app\quiz\resources\views/certificate.blade.php ENDPATH**/ ?>