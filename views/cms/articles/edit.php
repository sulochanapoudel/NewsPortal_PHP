<?php view('cms/includes/header.php');
view('cms/includes/nav.php');
?>          <!-- view file included -->
<!-- Main Content -->
<main class="row">
    <div class="col-12 bg-white my-3">
        <div class="row">
            <div class="col-6 mx-auto ">
                <h1>Edit Article</h1>
            </div>
        </div>

        <div class=""row">
        <div class="col-6 mx-auto">
            <form action="<?php echo url('articles/update/'.$article->id); ?>" method="post" enctype="multipart/form-data">
                <div class=""form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control"  value="<?php echo $article->title; ?>" required>
        </div>


        <div class=""form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control" value="<?php echo $article->slug; ?>" required>
    </div>


    <div class=""form-group">
    <label for="content">Content</label>
    <textarea name="content" id="content" class="form-control" required> <?php echo $article->content; ?></textarea>
    </div>


    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control" required>
            <?php foreach($categories as $category): ?>
                <option value="<?php echo $category->id; ?>"> <?php echo $article->category_id == $category->id ? 'selected' : ''; ?> <?php echo $category->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class=""form-group">
    <label for="featured_image">Featured Image</label>
    <input type="file" name="featured_image" id="featured_image" class="form-control-file" accept="image/*" >
    <div class="img-preview mt-3">
        <?php if(!empty($article->featured_image)): ?>
            <img src="<?php echo url("assets/images/{$article->featured_image}"); ?>" class="img-fluid preview">

        <?php endif; ?>
    </div>
    </div>

    <div class="form-group">
        <label for="published_at">Published At</label>
        <input type="text" name="published_at" id="published_at" class="form-control datetime" value="<?php echo $article->published_at ?? ''; ?>">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="Draft" <?php echo $article->status == "Draft" ? 'selected' : '';?>>Draft </option>
            <option value="Published" <?php echo $article->status == "Published" ? 'selected' : '';?>>Published</option>
            <option value="Unpublished" <?php echo $article->status == "Unpublished" ? 'selected' : '';?>>Unpublished </option>
        </select>
    </div>

    <div class=""form-group">
    <button type="submit" class="btn" btn-outline-primary"><i class="fas fa-save mr-2"></i> Save</button>
    </div>

    </form>
    </div>

    </div>

    </div>


</main>



<?php
view('cms/includes/messages.php');
view('cms/includes/footer.php');


?>
