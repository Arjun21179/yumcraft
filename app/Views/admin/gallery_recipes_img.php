
<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">







            <!-- xxxxxxxxx Add All Recipes Image xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
            <div class="card" style="height:auto;">
                <div class="card-body">

                    <!-- table tag -->

                    <h2 class="mt-0 header-title mb-4" style="font-size:25px;">Recipe Images </h2>

                    <form action="recipe-gallery" method="get">
                        <div class="row mt-4 mb-4">
                            <div class="col-lg-8">
                                <input type="text" name="search_here_recipe_img" value="<?= !empty($search_recipe_img) ? $search_recipe_img : '' ?>" class="form-control" placeholder="Search Here">
                            </div>

                            <div class="col-lg-4">
                                <button type="submit" class="btn-success btn-lg">
                                    Search
                                </button>

                                <a href="recipe-gallery" class="btn-danger btn-lg">
                                    Clear
                                </a>
                            </div>
                        </div>
                    </form>


                    <table class="table table-hover mb-0">
                        <!-- id="recipeslist" -->

                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Image Url</th>
                                <th scope="col">Copy IMage Url</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($all_recipes_img_desc)) {

                                foreach ($all_recipes_img_desc as $val) {

                            ?>

                                    <tr>


                                        <td>
                                            <?php if (!empty($val['re_images'])) {
                                                //   echo 'if';
                                                //   echo $single_category->c_img;
                                            ?>
                                                <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['re_images'] ?>" alt="" width="150px" height="auto">
                                            <?php
                                            } else {
                                                // echo 'else';
                                            ?>
                                                <img src="<?php echo base_url(); ?>uploads/no-image.jpg" alt="" height="50">
                                            <?php
                                            }
                                            ?>
                                        </td>


                                        <td>
                                            <?php echo base_url() . 'uploads/recipes_img/' . $val['re_images']; ?>
                                        </td>

                                        <td>
                                            <button onclick="copy_image_path('<?php echo base_url() . 'uploads/recipes_img/' . $val['re_images']; ?>')" class="btn">
                                                Copy Url
                                            </button>
                                        </td>

                                    </tr>


                            <?php

                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="pagination">
                        <?php
                        echo $pager_recipe->links()
                        ?>
                    </div>

                    <!-- table tag -->

                </div>
            </div>








        </div>
        <!-- end col -->

    </div>
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

    <!-- end row -->
</div>

<script>
    // function myFunction(id) {
    //     console.log(id);
    // }
</script>