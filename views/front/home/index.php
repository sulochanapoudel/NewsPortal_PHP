

<?php
    view('front/includes/header.php');
    view('front/includes/nav.php');
?>

        <main class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 breaking-heading text-center my-3 font-weight-bold">
                        <?php echo $breaking->title; ?>
                    </div>
                    <?php if(!empty($breaking->featured_image)): ?>
                    <div class="col-6">
                        <img src="<?php echo url("assets/images/{$breaking->featured_image}"); ?>" class="img-fluid">
                    </div>
                    <?php endif; ?>
                    <div class="col">
                        <div class="row">
                            <div class="col-12">
                                <small class="text-muted font-italic">
                                    <i class="fas fa-clock mr-2"></i> <?php echo date('j M Y h:i A',strtotime($breaking->published_at)); ?>
                                </small>
                            </div>
                            <div class="col-12 text-justify">
                                <?php //dump($breaking);
                                    $content = nl2br($breaking->content);
                                    $paragraph = substr($content, 0, strpos($content, '<br />'));
                                    if(!empty($paragraph)){
                                        echo $paragraph;
                                    }
                                    else{
                                        echo $breaking->content;
                                    }

                                ?>
                            </div>
                            <div class="col-12">
                                <a href="#" class="btn btn-outline-primary btn-sm">Read More </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                <?php foreach($articles as $article): ?>
                    <div class="col-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                            <?php
                            if(!empty($article->featured_image)) {
                                $image = $article->featured_image;
                            }
                            else {
                                $image = 'download.png';
                            }
                            ?>
                                <div class="img-list" style="background-image: url('<?php echo url("assets/images/{$image}"); ?>')">
                                </div>
                            </div>
                            <div class="col-12 text-center font-weight-bold my-2">
                            <a href="#"> <?php echo $article->title; ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
        
        <?php 
        view('front/includes/footer.php');
        ?>