<?php
      view('cms/includes/header.php');
      view('cms/includes/nav.php');
?>
        <!-- view file included -->
        <!-- Main Content -->
        <main class="row">
            <div class="col-12 bg-white my-3">
                <div class="row">
                    <div class="col">
                        <h1>Comments</h1>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <?php if(!empty($comments)): ?>
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Article</th>
                                    <th>Comment</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($comments as $comment): ?>
                                    <tr>
                                        <td> <?php echo $comment->name; ?><br><small>(<?php echo $comment->email; ?>)</small></td>
                                        <td> <?php echo $comment->article()->first()->title; ?></td>
                                       <td><?php echo nl2br($comment->content); ?></td>
                                        <td><?php echo $comment->created_at; ?></td>
                                        <td><a href="<?php echo url('comments/destroy/'.$comment->id)?>" class="btn btn-outline-danger btn-sm delete">Delete</a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                        <?php view('cms/includes/pagination.php', compact('paginate')); ?>
                        <?php else: ?>
                        <div class="text-center text-muted font-italic font-weight-bold mb-3">
                            <small> No comments found.</small>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>
<?php  view('cms/includes/messages.php');
       view('cms/includes/footer.php');
       ?>
