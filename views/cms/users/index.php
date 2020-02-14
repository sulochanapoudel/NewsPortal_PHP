<?php view('cms/includes/header.php');
      view('cms/includes/nav.php');
?>          <!-- view file included -->
        <!-- Main Content -->
        <main class="row">
            <div class="col-12 bg-white my-3">
                <div class="row">
                    <div class="col">
                        <h1>Users</h1>
                    </div>
                    <div class="col-auto">
                        <a href="<?php echo url('users/create'); ?>" class="btn btn-outline-primary mt-2"><i class="fas fa-plus mr-2"></i>Add User</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php if(!empty($users)): ?>
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user): ?>
                                    <tr>
                                        <td> <?php echo "{$user->first_name} {$user->middle_name} {$user->last_name}"; ?></td>
                                        <td><?php echo $user->email; ?></td>
                                        <td><?php echo $user->address; ?></td>
                                        <td><?php echo $user->phone; ?></td>
                                        <td><?php echo $user->status; ?></td>
                                        <td><?php echo $user->created_at; ?></td>
                                        <td><?php echo $user->updated_at; ?></td>
                                        <td>
                                            <a href="<?php echo url('users/edit/'.$user->id) ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                                            <a href="<?php echo url('users/destroy/'.$user->id) ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                        <?php else: ?>
                        <div class="text-center text-muted font-italic font-weight-bold mb-3">
                            <small> No users found.</small>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>



<?php  view('cms/includes/messages.php');
       view('cms/includes/footer.php');
       ?>
