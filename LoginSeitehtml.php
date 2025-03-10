<?php
// Start the session: must be the first command
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #6e6e6e, #cacaca);
            color: white;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .section {
            padding: 60px 0;
        }
        .card {
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #FFFFFF;
            margin-bottom: 20px;
            background-color: #FFFFFF;
            color: black;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 5px 10px 10px rgba(0, 0, 0, 0.2);
        }
        .red {
            color: red;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; z-index: 1000; width: 100%;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Login</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                </ul>
            </div>
        </div>
    </nav>

    <div class="container section">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="padding: 20px; margin-top: 20px;">
                    <h1 class="text-center">Login</h1>
                    <?php
                    if (isset($_SESSION['err'])) {
                        echo "<p class='red text-center'>Login error: " . $_SESSION['err'] . "</p>";
                        unset($_SESSION['err']);
                    }
                    ?>
                    <form action="LoginDatenbank.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="d-grid gap-2">
                            <input type="reset" value="Reset" class="btn btn-secondary">
                            <input type="submit" value="Login" name="login" class="btn btn-primary">
                            <input type="button" value="Sign Up" class="btn btn-secondary" onclick="window.location.href='signup.php'">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>