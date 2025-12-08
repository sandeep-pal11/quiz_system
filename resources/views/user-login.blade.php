<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
      body {
        background: linear-gradient(135deg, #74ebd5, #ACB6E5);
        font-family: 'Segoe UI', sans-serif;
      }
      .card {
        border-radius: 1rem;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.15);
      }
      .form-control {
        border-radius: 0.5rem;
      }
      .btn-primary {
        border-radius: 0.5rem;
        font-weight: bold;
      }
      .form-label {
        font-weight: 500;
      }
      .form-check-label {
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    
    <!-- Navbar -->
    <x-user-navbar></x-user-navbar>

    <!-- login-Up Section -->
    <section class="vh-100 d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-5">
            <div class="card p-4">
              <div class="card-body text-center">
                 @if(session('message-error'))
  <div>
    <p class="text-red-500 font-bold">{{session('message-error')}}</p>
  </div>
  @endif
  @if(session('message-success'))
  <div>
    <p class="text-green-500 font-bold">{{session('message-success')}}</p>
  </div>
  @endif
                <h3 class="mb-4">User Login</h3>

                {{-- Global Sign-Up Error --}}
                @if ($errors->has('login_error'))
                  <div class="alert alert-danger">
                    {{ $errors->first('login_error') }}
                  </div>
                @endif

                <form action="{{ url('/user-login') }}" method="POST">
                  @csrf
                 {{-- Email --}}
                  <div class="form-floating mb-3">
                    <input type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           id="email" 
                           name="email" 
                           placeholder="Enter email" 
                           value="{{ old('email') }}">
                    <label for="email"><i class="fas fa-envelope me-2"></i>Email</label>
                    @error('email')
                      <div class="text-danger text-start small">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Password --}}
                  <div class="form-floating mb-3">
                    <input type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           id="password" 
                           name="password" 
                           placeholder="Enter password">
                    <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                    @error('password')
                      <div class="text-danger text-start small">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Remember Me --}}
                  <div class="form-check text-start mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>

                  <button type="submit" class="btn btn-primary w-100">Login</button>
                  <a href="{{ url('/user-forgot-password') }}" class="d-block mt-3">Forgot Password?</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <x-footer-user></x-footer-user>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
