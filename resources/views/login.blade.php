<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login - Sistem Peringatan Dini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-card">
                    <h2 class="text-center mb-4">
                        Sistem Peringatan Dini
                    </h2>
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="/login">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    
                    <div class="mt-3">
                        <small class="text-muted">
                            <strong>Test Accounts:</strong><br>
                            • ti@kampus.ac.id / 123<br>
                            • si@kampus.ac.id / 123<br>
                            • mhs1@kampus.ac.id / 123
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>