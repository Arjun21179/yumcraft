<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">
            <div class="card" style="height:auto">
                <div class="card-body">

                    <!-- table tag -->

                    <h3 class="mt-0 header-title mb-4">Edit Recipes Post</h3>


                    <!-- <h4 class="mt-0 header-title mb-4">Add Recipes</h4> -->
                    <div class="text-right">
                        <a href="recipes">
                            <button class="btn badge-success">
                                Back
                            </button>
                        </a>
                    </div>




                    <form action="editrecipes_logic" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="name">Recipe Name</label>
                                <input type="text" name="re_title" id="re_title" class="form-control" value="<?= $single_recipe ? $single_recipe->re_title : "" ?>" placeholder="Enter the Recipe Name">
                            </div>
                        </div>

                        <div class="row" style="margin-top:20px;">
                            <div class="col-lg-6">
                                <label for="name">Recipe Url</label>
                                <input type="text" name="re_title_url" id="re_title_url" class="form-control" value="<?= $single_recipe ? $single_recipe->re_titleurl : "" ?>" placeholder="Enter the Recipe Name">
                            </div>

                            <div class="col-lg-6">
                                <label for="name">Publish Date</label>
                                <input type="date" name="publish_date" id="publish_date" class="form-control" value="<?= $single_recipe ? $single_recipe->publish_data : "" ?>" placeholder="Enter the Publish Date">
                                </p>
                            </div>
                        </div>

                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-6">
                                <label for="image">Image</label>
                                <input type="file" name="re_images" class="imgInput form-control">
                                <br>

                                <?php if (!empty($single_recipe->re_images)) {
                                    //   echo 'if';
                                    //   echo $single_category->c_img;
                                ?>
                                    <img src="<?php echo base_url(); ?>uploads/recipes_img/<?= $single_recipe ? $single_recipe->re_images : "" ?>" alt="<?php echo base_url(); ?>uploads/recipes_img/<?= $single_recipe ? $single_recipe->re_images : "" ?>" width="80" height="70" class="previewImg m-t-10 m-l-15">
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
                                    <label>Popular Recipe</label>
                                    <select name="popular_recipe" class="form-control">
                                        <option value="0" <?php if (!empty($single_recipe)) {
                                                                if ($single_recipe->re_popular_recipe == 0) {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?>>No
                                        </option>
                                        <option value="1" <?php
                                                            if ($single_recipe) {
                                                                if ($single_recipe->re_popular_recipe == 1) {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?>>Yes
                                        </option>
                                    </select>
                                </div>
                            </div>

                        </div>





                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-4">
                                <label for="category">Category</label>
                                <select id="Select1" class="form-control" multiple="true" name="category_data[]">
                                    <?php
                                    if (!empty($allcategories)) {
                                        foreach ($allcategories as $allcat_val) {
                                    ?>
                                            <option <?php

                                                    if (!empty($relational_categories_tag_id->category_id)) {
                                                        // implode method convert to array 
                                                        $relational_category = explode(',', $relational_categories_tag_id->category_id);
                                                        //   echo '<pre>';
                                                        //   print_r($relational_category);

                                                        foreach ($relational_category as $selected_category) {
                                                            if ($selected_category == $allcat_val['c_id']) {
                                                                echo " selected";
                                                            }
                                                        }
                                                    }
                                                    ?> value="<?php echo $allcat_val['c_id']; ?>">
                                                <?php echo $allcat_val['c_name']; ?>
                                            </option>
                                    <?php
                                        }
                                    }
                                    ?>


                                </select>
                            </div>

                        </div>





                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-12">
                                <label for="re_shortdescription">Short Description</label>
                                <textarea name="re_shortdescription" class="rte">
                                    <?php
                                    if (!empty($single_recipe->re_shortdescription)) {
                                        echo $single_recipe->re_shortdescription;
                                    }
                                    ?>
                                </textarea>
                            </div>
                        </div>





                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-12">
                                <label for="description">Description</label>
                                <textarea name="re_description" class="rte">
                                    <?php
                                    if (!empty($single_recipe->re_description)) {
                                        echo $single_recipe->re_description;
                                    }
                                    ?>
                                </textarea>
                            </div>
                        </div>






                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-12">
                                <label for="Ingredients">Ingredients </label>
                                <textarea name="ingredients" rows="4" class="rte" id="ingredients">
                                <?php
                                if (!empty($single_recipe->ingredients)) {
                                    echo $single_recipe->ingredients;
                                }
                                ?>
                                </textarea>
                            </div>
                        </div>







                        <div class="row" style="margin-top:20px;margin-right:20px;margin-bottom:20px;">
                            <div class="col-lg-12">
                                <div class="text-right">
                                    <!-- hidden id -->
                                    <input type="hidden" name="re_id" value="<?= $single_recipe ? $single_recipe->re_id : "" ?>">
                                    <button type="submit" class="btn btn-danger btn-lg">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>








                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

</div>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

<!-- end row -->
</div>