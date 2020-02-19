<?php view('cms/includes/header.php');
      view('cms/includes/nav.php');
?>          <!-- view file included -->
        <!-- Main Content -->
        <main class="row">
            <div class="col-12 bg-white my-3">
                <div class="row">
                    <div class="col">
                        <h1>Categories</h1>
                    </div>
                    <div class="col-auto">
                        <a href="<?php echo url('categories/create'); ?>" class="btn btn-outline-primary mt-2"><i class="fas fa-plus mr-2"></i>Add Category</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php if(!empty($categories)): ?>
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($categories as $category): ?>
                                    <tr>
                                        <td> <?php echo $category->name; ?></td>
                                        <td><?php echo $category->slug; ?></td>
                                        <td><?php echo $category->status; ?></td>
                                        <td><?php echo $category->created_at; ?></td>
                                        <td><?php echo $category->updated_at; ?></td>
                                        <td>
                                            <a href="<?php echo url('categories/edit/'.$category->id) ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                                            <a href="<?php echo url('categories/destroy/'.$category->id) ?>" class="btn btn-outline-danger btn-sm delete">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                        <?php view('cms/includes/pagination.php', compact('paginate')); ?>
                        <?php else: ?>
                        <div class="text-center text-muted font-italic font-weight-bold mb-3">
                            <small> No category found.</small>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>



<?php  view('cms/includes/messages.php');
       view('cms/includes/footer.php');


       ?>
