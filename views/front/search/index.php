<?php
view('front/includes/header.php');
view('front/includes/nav.php');

?>

        <main class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 my-3">
                        <h1>Search: <?php echo $_GET['term']; ?></h1>
                    </div>
                    <?php if (!empty($articles)): ?>
                    <?php foreach($articles as $article): ?>
                    <div class="col-lg-3 col-sm-6 mb-3">

                        <div class="row">
                            <div class="col-12">
                                <?php
                                if(!empty($article->featured_image)){
                                    $image = $article->featured_image;
                                }
                                else{
                                    $image = 'download.png';
                                }
                                ?>
                               <div class="img-list" style="background-image: url('<?php echo url("assets/images/{$image}"); ?>')"></div>
                            </div>
                            <div class="col-12 text-center font-weight-bold my-2">
                                <a href="<?php echo url("article/{$article->slug}");?>"><?php echo $article->title; ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <div class="col-12">
                        <h5 class="text-center text-muted">No articles found </h5>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </main>
<?php
view('front/includes/footer.php');

?>
