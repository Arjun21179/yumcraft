<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">
            <div class="card" style="height:auto">
                <div class="card-body">

                    <!-- table tag -->


                    <!-- <h4 class="mt-0 header-title mb-4">Add Recipes</h4> -->
                    <div class="text-right">
                        <a href="category-section">
                            <button class="btn badge-success">
                                Back
                            </button>
                        </a>
                    </div>

                    <form action="edit-categorylogic" method="post" enctype="multipart/form-data">
                        <label for="name">Category Name</label>
                        <input type="text" name="c_nameedit" value="<?= $single_category ? $single_category->c_name : "" ?>" class="form-control" placeholder="Enter the Recipe Name">

                        <div class="row m-t-20">
                            <div class="col-lg-6">
                                <label for="image">Image</label>
                                <input type="file" name="c_img" class="imgInput form-control">
                                <br>
                                <label for="alt">Alt Data</label>
                                <input type="text" name="category_img_alt" id="category_img_alt" value="<?= !empty($single_category) ? $single_category->category_img_alt : "" ?>" class="form-control" placeholder="Enter the Alt Data">
                                <?php if (!empty($single_category->c_img)) {
                                    //   echo 'if';
                                    //   echo $single_category->c_img;
                                ?>
                                    <img src="<?php echo base_url(); ?>uploads/recipes_img/<?= $single_category ? $single_category->c_img : "" ?>" alt="<?php echo base_url(); ?>uploads/recipes_img/<?= $single_category ? $single_category->c_img : "" ?>" width="80" height="70" class="previewImg m-t-10 m-l-15">
                                <?php
                                } else {
                                    // echo 'else';
                                ?>
                                    <img src="<?php echo base_url(); ?>uploads/recipes_img/no-image.jpg" alt="" width="80" height="70" class="previewImg m-t-10 m-l-15">
                                <?php
                                }
                                ?>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Popular Category</label>
                                    <select name="popular_categoryedit" class="form-control">

                                        <option value="0" <?php
                                                            if ($single_category->popular_category == 0) {
                                                                echo "selected";
                                                            }
                                                            ?>>No</option>

                                        <option value="1" <?php
                                                            if ($single_category->popular_category == 1) {
                                                                echo "selected";
                                                            }
                                                            ?>>Yes</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Set on top menu</label>
                                    <select name="Set_on_top_menuedit" class="form-control">
                                        <option value="0" <?php
                                                            if ($single_category->set_on_menu == 0) {
                                                                echo "selected";
                                                            }
                                                            ?>>No</option>

                                        <option value="1" <?php
                                                            if ($single_category->set_on_menu == 1) {
                                                                echo "selected";
                                                            }
                                                            ?>>Yes</option>
                                    </select>
                                </div>
                            </div>

                        </div>



                        <div class="row m-t-20">
                            <div class="col-lg-12">
                                <div class="text-right">
                                    <!-- set flag -->
                                    <input type="hidden" name="flag" value="<?= $single_category ? $single_category->flag : "" ?>">
                                    <!-- hidden id -->
                                    <input type="hidden" name="c_id" value="<?= $single_category ? $single_category->c_id : "" ?>">
                                    <button type="submit" class="btn btn-danger btn-lg">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
        <!-- end col -->

    </div>
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

    <!-- end row -->
</div>