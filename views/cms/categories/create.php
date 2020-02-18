<?php view('cms/includes/header.php');
      view('cms/includes/nav.php');
?>          <!-- view file included -->
        <!-- Main Content -->
        <main class="row">
            <div class="col-12 bg-white my-3">
                <div class="row">
                    <div class="col-6 mx-auto ">
                        <h1>Create Category</h1>
                    </div>
                </div>

                <div class=""row">
                 <div class="col-6 mx-auto">
                    <form action="<?php echo url('categories/store')?>" method="post">
                    <div class=""form-group">
                        <label for="first_name">Name</label>
                         <input type="text" name="name" id="name" class="form-control" required>
                     </div>


                <div class=""form-group">
                <lable for="slug">Slug</lable>
                <input type="text" name="slug" id="slug" class="form-control" required>
                </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>


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
