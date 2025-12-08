<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
      body {
        background: linear-gradient(135deg, #89f7fe, #66a6ff);
        font-family: 'Segoe UI', sans-serif;
      }
      .card {
        border-radius: 1rem;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.15);
      }
      .btn-primary {
        border-radius: 0.5rem;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <section class="vh-100 d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-5">
            <div class="card p-4">
              <div class="card-body text-center">
                <h3 class="mb-4 text-primary">Forgot Password</h3>
                <p class="text-muted mb-4">Enter your registered email to reset your password</p>

                <?php if(session('status')): ?>
                  <div class="alert alert-success"><?php echo e(session('status')); ?></div>
                <?php endif; ?>

                <form action="<?php echo e(url('/user-forgot-password')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  
                  <div class="form-floating mb-3">
                    <input type="email" 
                           class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           id="email" 
                           name="email" 
                           placeholder="Enter your email">
                    <label for="email"><i class="fas fa-envelope me-2"></i>Email address</label>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="text-danger small text-start"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
                  <a href="<?php echo e(url('/user-login')); ?>" class="d-block mt-3 text-decoration-none">← Back to Login</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php /**PATH D:\quiz_app\quiz\resources\views/user-forgot-password.blade.php ENDPATH**/ ?>