<?php

use app\core\Application;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hello, world!</title>
</head>
<body>
<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Site</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <?php if (Application::isGuest()): ?>
                <li class="nav-item">
                    <a class="nav-link active" href="/login">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/logout"><?php echo Application::$app->user->name; ?> (Logout)</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <?php if (Application::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?php echo Application::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <?php if (Application::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger">
            <?php echo Application::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?>
    {{content}}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
