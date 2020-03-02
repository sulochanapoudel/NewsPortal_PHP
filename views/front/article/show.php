<?php
view('front/includes/header.php');
view('front/includes/nav.php');
?>

    <main class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 breaking-heading text-center my-3 font-weight-bold">
                    <?php echo $article->title; ?>
                </div>
                <?php if (!empty($article->featured_image)): ?>
                <div class="col-12 text-center">
                    <img src="<?php echo url("assets/images/{$article->featured_image}"); ?>" class="img-fluid">
                </div>
                <?php endif;?>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 text-center my-3">
                            <small class="text-muted font-italic">
                                <i class="fas fa-clock mr-2"></i> <?php echo date('j M Y h:i A', strtotime($article->published_at)); ?>
                            </small>
                        </div>
                        <div class="col-12 text-justify">
                            <?php
                             echo nl2br($article->content);
                             ?>

                            <div class="col-12 mt-3">

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-12">
                        <h3>Add Comment</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="<?php echo url('article/comment/'.$article->id); ?>" method="post"
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content"  class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-primary" type="submit"><i class="fas fa-paper-plane mr-2"></i> </button>


                        </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12">
                        <h3>Comments</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php if (!empty($comments)): ?>
                            <?php foreach ($comments as $comment): ?>

                                <div class="p-3 mb-3 bg-secondary text-white">
                                    <?php echo nl2br($comment->content); ?>
                                    <br>
                                    <small class="font-italic">
                                        <i class="fas fa-user mr-2"></i><?php echo "<strong>{$comment->name}</strong> (<a href='mailto:{$comment->email}'
                            class='text-white'>{$comment->email}</a>)"; ?>
                                    </small>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>


                            <div class="p-3 mb-3 bg-secondary text-white text-center">
                                <small class="font-italic">
                                    No comment added.
                                </small>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>

    </main>
<?php view('front/includes/footer.php'); ?>
