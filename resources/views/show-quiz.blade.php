<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Admin Categories Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

 <style>
  body {
    background: linear-gradient(135deg, #74ebd5, #ACB6E5);
    font-family: 'Segoe UI', sans-serif;
  }

  .card {
    border-radius: 1rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    background: white;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
  }

  .form-control {
    border-radius: 0.5rem;
  }

  /* Back Button */
  .btn-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(90deg, #0d6efd, #4a8dfd);
    color: white;
    padding: 6px 16px;
    border-radius: 0.5rem;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .btn-back:hover {
    background: linear-gradient(90deg, #084298, #2e6de6);
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
    text-decoration: none;
    color: white;
  }

  /* Table Header */
  .table-header {
    background: linear-gradient(90deg, #f0f4ff, #dbe7ff);
    border-radius: 0.3rem;
    font-weight: 600;
    color: #0d6efd;
  }

  /* Table Rows */
  .mcq-row {
    transition: background 0.3s ease, transform 0.15s ease;
    background: white;
    border-bottom: 1px solid rgba(0,0,0,0.05);
  }

  .mcq-row:hover {
    background: rgba(13, 110, 253, 0.08);
    transform: scale(1.01);
  }

  /* Footer */
  .footer-text {
    font-size: 0.85rem;
    color: rgba(0, 0, 0, 0.6);
  }
</style>

</head>

<body class="bg-gray-100">

  <x-navbar :email="$email" />

  <section class="vh-100 d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card p-4">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Quiz Name : {{$quizName}}</h3>
                <a class="btn-back" href="/add-quiz">
                  <i class="fa fa-arrow-left"></i> Back
                </a>
              </div>

              <div class="w-full max-w-4xl mx-auto">
                <ul class="border border-gray-200 rounded">
                  <!-- Header Row -->
                  <li class="p-2 table-header">
                    <ul class="flex justify-between text-center">
                      <li class="w-30">MCQ Id</li>
                      <li class="w-170">Question</li>
                    </ul>
                  </li>

                  <!-- Data Rows -->
                  @foreach ($mcqs as $key=>$mcq)
                  <li class="p-2 mcq-row">
                    <ul class="flex justify-between text-center">
                      <li class="w-30 flex items-center justify-center">{{ $key+1 }}</li>
                      <li class="w-170 flex items-center justify-center">{{ $mcq->question }}</li>
                    </ul>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <p class="text-center mt-3 text-muted">&copy; 2025 Admin Portal</p>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
