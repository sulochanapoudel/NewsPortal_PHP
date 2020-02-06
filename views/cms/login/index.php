<?php view('cms/includes/header.php');

?>          <!-- view file included -->
        <!-- Main Content -->
        <main class="row">
            <div class="col-4 bg-white mx-auto">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Login</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="<?php echo url('login/check'); ?>" method="post">

                        <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>

                       <div class="form-group">
                        <div class="form-check">
                             <input type="checkbox" name="remember" value="yes" id="remember" class="form-check-input">
                            <label for="remember" class="form-check-label">Remember Me</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary" type="submit"><i class="fas fa-sign-in-alt mr-2"></i>Log In</button>

                    </div>
                    </form>
                </div>
                </div>
            </div>
        </main>



<?php  view('cms/includes/messages.php');
       view('cms/includes/footer.php'); ?>
