<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('brimob.jpg');
             background-size: contain;
            background-position: center; 
            height: 100vh;">
            <br><br>
   
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Login</h3>
            <form action="logiin.php" method="POST">
                <div class="mb-3">
                    <label for="text" class="form-label">username</label>
                    <input type="text" name="nama_user" class="form-control" id="nama" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                </div>
                <div class="d-grid">
                   <button class="btn btn-primary w-100 py-2" type="submit">login</button>
                
                </div>
            </form>
            <div class="text-center mt-3">
                <a href="#">Forgot password?</a>
            </div>
        </div>
    </div>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>