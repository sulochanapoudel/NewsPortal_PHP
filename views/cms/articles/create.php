<?php view('cms/includes/header.php');
      view('cms/includes/nav.php');
?>          <!-- view file included -->
        <!-- Main Content -->
        <main class="row">
            <div class="col-12 bg-white my-3">
                <div class="row">
                    <div class="col-6 mx-auto ">
                        <h1>Create Article</h1>
                    </div>
                </div>

                <div class=""row">
                 <div class="col-6 mx-auto">
                    <form action="<?php echo url('articles/store')?>" method="post">
                    <div class=""form-group">
                        <label for="name">Name</label>
                         <input type="text" name="name" id="name" class="form-control" required>
                     </div>


                <div class=""form-group">
                <lable for="slug">Slug</lable>
                <input type="text" name="slug" id="slug" class="form-control" required>
                </div>


            <div class=""form-group">
            <lable for="content">Content</lable>
            <textarea name="content" id="content" class="form-control" required></textarea> <br>
            </div>

            <div class=""form-group">
            <lable for="category_id">category_ID</lable>
            <input type="text" name="category_id" id="category_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="status">Category</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Active">National </option>
                    <option value="Active">International</option>
                    <option value="Inactive">Sports </option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Active">Draft </option>
                    <option value="Active">Published</option>
                    <option value="Inactive">Unpublished </option>
                </select>
            </div>

            <div class=""form-group">
            <label for="name">Publish at</label>
            <input type="date" name="published_at" id="published_at" class="form-control" required>
            </div>

            <div>
                <br>

              <!-- <form method="post" action="form.php" enctype="multipart/form-data">
                    <label for="image">Featured Image</label>
                    <input type="file" name="image[]" id="image" accept="image/*" > <br> <br>
                </form>
            </div> -->

                <div class=""form-group">
                <button type="submit" class="btn" btn-outline-primary"><i class="fas fa-save mr2"></i> Save</button>
                </div>

            </form>
            </div>

            </div>

            </div>

            
        </main>



<?php  view('cms/includes/messages.php');
       view('cms/includes/footer.php'); ?>
