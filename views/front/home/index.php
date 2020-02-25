<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Site</title>
    <link rel="stylesheet" href="<?php echo url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/all.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/front.css'); ?>">
</head>

<body>
    <div class="container bg-white">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-success col-12">
                <a class="navbar-brand" href="<?php echo url(); ?>">News Site</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </nav>
        </div>
        <div class="row">
            
        </div>

    </div>



<script src="<?php echo url('assets/js/jquery-3.4.1.js'); ?>"></script>
<script src="<?php echo url('assets/js/bootstrap.js'); ?>"></script>
<script src="<?php echo url('assets/js/front.js'); ?>"> </script>
</body>
</html>