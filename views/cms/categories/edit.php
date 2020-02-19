<?php view('cms/includes/header.php');
      view('cms/includes/nav.php');
?>          <!-- view file included -->
        <!-- Main Content -->
        <main class="row">
            <div class="col-12 bg-white my-3">
                <div class="row">
                    <div class="col-6 mx-auto ">
                        <h1>Edit Categories</h1>
                    </div>
                </div>

                <div class=""row">
                 <div class="col-6 mx-auto">
                    <form action="<?php echo url('categories/update/'.$category->id); ?>" method="post">
                    <div class=""form-group">
                        <label for="name">Name</label>
                         <input type="text" name="name" id="name" class="form-control" value="<?php echo $category->name; ?>" required>
                     </div>


                <div class=""form-group">
                <lable for="slug">Slug</lable>
                <input type="text" name="slug" id="slug" class="form-control"  value="<?php echo $category->slug; ?>" required>
                </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Active" <?php echo $category->status == 'Active'? 'selected' :''; ?>>Active</option>
                    <option value="Inactive" <?php echo $category->status =='Inactive' ? 'selected' :''; ?>>Inactive</option>
                </select>
            </div>



                <div class=""form-group">
                <button type="submit" class="btn" btn-outline-primary"><i class="fas fa-save mr2"></i> Update</button>
                </div>

            </form>
            </div>

            </div>

            </div>

            
        </main>



<?php  view('cms/includes/messages.php');
       view('cms/includes/footer.php'); ?>
