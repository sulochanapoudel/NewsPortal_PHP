<?php 
    $category = new \App\Models\category;
    $categories = $category->select('name, slug')->where('status', 'Active')->get();
?>


<header class="row">
            <nav class="navbar navbar-expand-xl navbar-dark bg-success col-12">
                <a class="navbar-brand" href="<?php echo url(); ?>">News Site</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                        <?php foreach($categories as $link): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo url("category/{$link->slug}") ?>"><?php echo $link->name; ?></a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" method="get" action="<?php echo url('search'); ?>">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" aria-label="Search" name="term" required >
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </nav>
        </header>