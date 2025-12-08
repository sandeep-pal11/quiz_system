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
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<x-navbar :email="$email" />

<section class="min-vh-100 d-flex align-items-start pt-5">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card p-4">
          <div class="card-body text-center">

@if(!session('quizdetails'))

  <h3 class="mb-4">Add Quiz</h3>
  <form action="/add-quiz" method="post">
    @csrf
    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="quiz" placeholder="Enter quiz name" value="{{ old('quiz') }}" required>
      <label for="quiz">Enter Quiz Name</label>
      @error('quiz')
        <div class="text-danger text-start small">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-floating mb-3">
      <select class="form-control" name="category_id" required>
        <option value="">-- Select Category --</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
          {{ $category->name }}
        </option>
        @endforeach
      </select>
      <label for="category_id">Select Category</label>
      @error('category_id')
        <div class="text-danger text-start small">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary w-100">Add</button>
  </form>

@else

  <p class="text-success fw-bold">Quiz : {{ session('quizdetails')->name }}</p>
<p class="text-success fw-bold">Total MCQs : {{ $totalmcq }}</p>

 <a href="{{ route('show.quiz', [
        'id' => session('quizdetails')->id, 
        'quizName' => session('quizdetails')->name
    ]) }}" 
   class="btn btn-info mt-2 text-sm">
   Show MCQs
</a>


  <h3 class="mb-4">Add MCQs</h3>

  <form action="/add-mcq" method="post">
    @csrf
    <input type="hidden" name="category_id" value="{{ session('quizdetails')->category_id }}">

    <div class="mb-2 text-start">
      <label for="question" class="form-label fw-semibold">Question</label>
      <textarea class="form-control" name="question" rows="4" required>{{ old('question') }}</textarea>
      @error('question')
        <div class="text-danger text-start small">{{ $message }}</div>
      @enderror
    </div>

    <input type="text" class="form-control mb-2" name="a" placeholder="Option A" value="{{ old('a') }}" required>
    @error('a')<div class="text-danger text-start small">{{ $message }}</div>@enderror

    <input type="text" class="form-control mb-2" name="b" placeholder="Option B" value="{{ old('b') }}" required>
    @error('b')<div class="text-danger text-start small">{{ $message }}</div>@enderror

    <input type="text" class="form-control mb-2" name="c" placeholder="Option C" value="{{ old('c') }}" required>
    @error('c')<div class="text-danger text-start small">{{ $message }}</div>@enderror

    <input type="text" class="form-control mb-2" name="d" placeholder="Option D" value="{{ old('d') }}" required>
    @error('d')<div class="text-danger text-start small">{{ $message }}</div>@enderror

    <div class="form-floating mb-3 text-start">
      <select class="form-control" name="correct_ans" required>
        <option value="">Select right answer</option>
        <option value="a" {{ old('correct_ans') == 'a' ? 'selected' : '' }}>A</option>
        <option value="b" {{ old('correct_ans') == 'b' ? 'selected' : '' }}>B</option>
        <option value="c" {{ old('correct_ans') == 'c' ? 'selected' : '' }}>C</option>
        <option value="d" {{ old('correct_ans') == 'd' ? 'selected' : '' }}>D</option>
      </select>
      <label for="correct_ans">Correct Answer</label>
      @error('correct_ans')
        <div class="text-danger text-start small">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" name="submit" value="Add More" class="btn btn-primary w-100 mb-2">Add More</button>
    <button type="submit" name="submit" value="done" class="btn btn-success w-100 mb-2 ">Add and Submit</button><br>
    <a href="/end-quiz" class="btn btn-danger w-100 ">Finish Quiz</a>
    
  </form>

@endif

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
