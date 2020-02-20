<?php view('cms/includes/header.php');
      view('cms/includes/nav.php');
?>          <!-- view file included -->
        <!-- Main Content -->
        <main class="row">
            <div class="col-12 bg-white my-3">
                <div class="row">
                    <div class="col">
                        <h1>Articles</h1>
                    </div>
                    <div class="col-auto">
                        <a href="<?php echo url('articles/create'); ?>" class="btn btn-outline-primary mt-2"><i class="fas fa-plus mr-2"></i>Add Articles</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php if(!empty($articles)): ?>
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Content</th>
                                    <th>Featured Image</th>
                                    <th>Category ID</th>
                                    <th>Status</th>
                                    <th>Published At</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($article as $article): ?>
                                    <tr>
                                        <td> <?php echo $article->name; ?></td>
                                        <td><?php echo $article->slug; ?></td>
                                        <td><?php echo $article->content; ?></td>
                                        <td><?php echo $article->featured_image; ?></td>
                                        <td><?php echo $article->category_id; ?></td>
                                        <td><?php echo $article->status; ?></td>
                                        <td><?php echo $article->published_at; ?></td>
                                        <td><?php echo $article->created_at; ?></td>
                                        <td><?php echo $article->updated_at; ?></td>
                                        <td>
                                            <a href="<?php echo url('articles/edit/'.$article->id) ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                                            <a href="<?php echo url('articles/destroy/'.$article->id) ?>" class="btn btn-outline-danger btn-sm delete">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                        <?php view('cms/includes/pagination.php', compact('paginate')); ?>
                        <?php else: ?>
                        <div class="text-center text-muted font-italic font-weight-bold mb-3">
                            <small> No article found.</small>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>



<?php  view('cms/includes/messages.php');
       view('cms/includes/footer.php');


       ?>
