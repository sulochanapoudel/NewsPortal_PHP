<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NewsSite CMS</title>
    <link rel="stylesheet" href="<?php echo url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/all.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/style.css'); ?>">
</head>
<body>

    <div class="container-fluid">
        <!--  NavBar -->
        <header class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12">
                <a class="navbar-brand" href="#">News Site</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-users mr-2"></i>Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-list mr-2"></i>Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-newspaper mr-2"></i>Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-comments mr-2"></i>Comments</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle mr-2"></i>
                                Admin User
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#"><i class="fas fa-user-edit mr-2"></i>Edit Profile</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-asterisk mr-2"></i>Change Password</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--  NavBar -->
        <!-- Main Content -->
        <main class="row">
            <div class="col-12 bg-white my-3">
                <div class="row">
                    <div class="col-12">
                        <h1>DashBoard</h1>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="<?php echo url('assets/js/jquery-3.4.1.js'); ?>"></script>
<script src="<?php echo url('assets/js/bootstrap.js'); ?>"></script>
<script src="<?php echo url('assets/js/script.js'); ?>"></script>
</html>
