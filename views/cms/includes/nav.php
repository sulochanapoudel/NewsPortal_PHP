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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle mr-2"></i> <?php echo user()->first_name; ?>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo url('profile/edit'); ?>"><i class="fas fa-user-edit mr-2"></i>Edit Profile</a>
                        <a class="dropdown-item" href="<?php echo url('profile/password'); ?>"><i class="fas fa-asterisk mr-2"></i>Change Password</a>
                        <a class="dropdown-item" href="<?php echo url('logout'); ?>"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--  NavBar -->
