<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">



            <div class="card" style="height:auto">
                <div class="card-body">

                    <!-- table tag -->

                    <h3 class="mt-0 header-title mb-4">Add Recipes Post</h3>

                    <!-- <h4 class="mt-0 header-title mb-4">Add Recipes</h4> -->
                    <div class="text-right">
                        <a href="recipes">
                            <button class="btn badge-success">
                                Back
                            </button>
                        </a>
                    </div>

                    <form id="recipeadd_validation" action="addrecipes_insert" method="post" enctype="multipart/form-data">


                        <div class="row">
                            <div class="col-lg-12">
                                <label for="name">Recipe Name</label>
                                <!-- id="re_title" check name double or not -->
                                <input type="text" name="re_title" class="form-control" placeholder="Enter the Recipe Name" required>
                                </p>
                            </div>
                        </div>



                        <div class="row" style="margin-top:10px;">
                            <div class="col-lg-6">
                                <label for="name">Recipe Url</label>
                                <input type="text" name="re_title_url" id="re_title_url" class="form-control" placeholder="Enter the Recipe Url" required>
                                </p>
                            </div>


                            <div class="col-lg-6">
                                <label for="name">Publish Date</label>
                                <input type="date" name="publish_date" id="publish_date" class="form-control" placeholder="Enter the Publish Date" required>
                                </p>
                            </div>
                        </div>

                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-6">
                                <label for="image">Image</label>
                                <span style="color:red; margin-left:10px;">Image Dimensions: 1000px (Width) × 554px (Height)</span>
                                <input type="file" name="imgInput" class="imgInput form-control" required>

                                <img src="<?php echo base_url(); ?>uploads/recipes_img/no-image.jpg" alt="" width="80" height="70" class="previewImg m-t-10 m-l-15" style="display:block;">
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Popular Recipe</label>
                                    <select name="popular_recipe" class="form-control" id="popular_recipe" required>
                                        <option value="" selected disabled> Select Option</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-4">
                                <label for="category">Category</label>
                                <select id="Select1" class="form-control" multiple="true" name="category_data[]">
                                    <?php


                                    if (!empty($allcategories))
                                        foreach ($allcategories as $val) {

                                    ?>
                                        <option value="<?= $val['c_id'] ?>">
                                            <?= $val['c_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>



                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-12">
                                <label for="shortdescription">Short Description</label>
                                <textarea name="re_shortdescription" rows="4" class="rte" placeholder="Enter Short Description" id="re_shortdescription"></textarea>
                            </div>
                        </div>



                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-12">
                                <label for="description">Description</label>
                                <textarea name="re_description" rows="4" class="rte" placeholder="Enter Description" id="re_description"></textarea>
                            </div>
                        </div>



                        <div class="row" style="margin-top:40px;">
                            <!--  <div class="col-lg-6">
                                <label> Recipe Author</label>
                                <select name="author_table_id" class="form-control" id="author_table_id">
                                    <option value="null" selected disabled> Select Author</option> -->
                            <?php
                            // if (!empty($allauthorlist)) { 
                            //     foreach($allauthorlist as $val) {
                            ?>
                            <!-- <option value=""></option> -->
                            <?php
                            //     }
                            // }
                            ?>
                            <!-- </select>-->

                            <!-- <div class="col-lg-12">
                                <label for="videourl">Video Url</label>
                                <input type="text" name="video_url" class="form-control" id="video_url" placeholder="Enter Youtbue Video Url" required>
                            </div> -->

                        </div>




                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-12">
                                <label for="Ingredients">Ingredients </label>
                                <textarea name="ingredients" rows="4" class="rte" id="ingredients"></textarea>
                            </div>
                        </div>





                        <div class="row m-t-20 m-b-20 m-r-15">
                            <div class="col-lg-12">
                                <div class="text-right">

                                    <!-- <a onclick="recipename_check()">
                                    <button type="submit" class="btn btn-danger btn-lg">Submit</button>
                                    </a> -->
                                    <button type="submit" id="addReceipe" class="btn btn-danger btn-lg">Submit</button>
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