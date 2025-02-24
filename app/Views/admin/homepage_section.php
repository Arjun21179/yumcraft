<script>
    // ----------------------------------------------------------------->
    // Add recipe success or error toaster msg
    function showToast_success_dataadd() {
        iziToast.success({
            title: "Successfuly",
            message: "Data Updated.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",

        });
    }

    function showToast_error_dataadd() {
        iziToast.error({
            title: "Failed",
            message: "Something wrong",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "red",
            backgroundColor: "#ff0000",
            messageColor: "white",
            titleColor: "white",
            progressBarColor: 'black',

        });
    }
</script>




<?php


// ------------------------------------------------------->
// Allergen category section toaster
if (isset($_SESSION['success_allergen_categorysection_add'])) {
    unset($_SESSION['success_allergen_categorysection_add']);
    echo "<script> showToast_success_dataadd() </script>";
}

if (isset($_SESSION['error_allergen_categorysection_add'])) {
    unset($_SESSION['error_allergen_categorysection_add']);
    echo "<script> showToast_error_dataadd() </script>";
}



// ------------------------------------------------------->
// category section toaster
if (isset($_SESSION['success_categorysection_add'])) {
    unset($_SESSION['success_categorysection_add']);
    echo "<script> showToast_success_dataadd() </script>";
}

if (isset($_SESSION['error_categorysection_add'])) {
    unset($_SESSION['error_categorysection_add']);
    echo "<script> showToast_error_dataadd() </script>";
}



// ------------------------------------------------------->
// Youtube  section toaster
if (isset($_SESSION['success_youtbue_add'])) {
    unset($_SESSION['success_youtbue_add']);
    echo "<script> showToast_success_dataadd() </script>";
}

if (isset($_SESSION['error_youtbue_add'])) {
    unset($_SESSION['error_youtbue_add']);
    echo "<script> showToast_error_dataadd() </script>";
}



// ------------------------------------------------------->
// first section taoster
if (isset($_SESSION['success_fristsection_add'])) {
    unset($_SESSION['success_fristsection_add']);
    echo "<script> showToast_success_dataadd() </script>";
}

if (isset($_SESSION['error_fristsection_add'])) {
    unset($_SESSION['error_fristsection_add']);
    echo "<script> showToast_error_dataadd() </script>";
}



// ------------------------------------------------------->
// second section logci
// add recipe success or error

if (isset($_SESSION['success_secondsection_add'])) {
    unset($_SESSION['success_secondsection_add']);
    echo "<script> showToast_success_dataadd() </script>";
}

if (isset($_SESSION['error_secondsection_add'])) {
    unset($_SESSION['error_secondsection_add']);
    echo "<script> showToast_error_dataadd() </script>";
}



// ------------------------------------------------------->
// third section toaster
if (isset($_SESSION['success_thirssection_add'])) {
    unset($_SESSION['success_thirssection_add']);
    echo "<script> showToast_success_dataadd() </script>";
}

if (isset($_SESSION['error_thirssection_add'])) {
    unset($_SESSION['error_thirssection_add']);
    echo "<script> showToast_error_dataadd() </script>";
}



// ------------------------------------------------------->
// four section taosters
if (isset($_SESSION['success_foursection_add'])) {
    unset($_SESSION['success_foursection_add']);
    echo "<script> showToast_success_dataadd() </script>";
}

if (isset($_SESSION['error_foursection_add'])) {
    unset($_SESSION['error_foursection_add']);
    echo "<script> showToast_error_dataadd() </script>";
}



?>












<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">
            <div class="card" style="height:auto">
                <div class="card-body">

                    <!-- table tag -->

                    <!-- <h1 class="mt-0 header-title mb-4">Homepage</h1> -->
                    <h4>Homepage</h4>

                    <!-- <h4 class="mt-0 header-title mb-4">Add Recipes</h4> -->
                    <!-- <div class="text-right">
                        <a href="blog-list">
                            <button class="btn badge-success">
                                Back
                            </button>
                        </a>
                    </div> -->




                    <!-- Home page Allergen Category Section for homepage -->
                    <?php
                    if (!empty($for_home_section_all_allergy_freeCategory)) {
                    ?>
                        <h5 class="mt-5">Allergen Category Section</h5>
                        <div class="row" style="margin-top:10px;">
                            <form action="homepage_Allergencategory_section" method="post">


                                <div class="mt-3 col-lg-10">
                                    <label for="section_title">Heading</label>
                                    <input type="text" name="heading" class="form-control" placeholder="Enter Heading" value="<?= $homepage_Allergen_category_section->heading ?>">
                                </div>


                                <div class="mt-3 col-lg-10">
                                    <label for="section_title">Sub Heading</label>
                                    <input type="text" name="sub_heading" class="form-control" placeholder="Enter Sub Heading" value="<?= $homepage_Allergen_category_section->sub_heading ?>">
                                </div>


                                <div class="mt-3 col-lg-10">
                                    <label for="category"> Select Allergen Free Category</label>
                                    <select id="select_homepage_category_section" class="form-control" multiple="true" name="trending_category_data[]">
                                        <?php
                                        $selected_val = explode(",", $homepage_Allergen_category_section->category_id);

                                        foreach ($for_home_section_all_allergy_freeCategory as $val) {
                                        ?>
                                            <option value="<?php echo $val['c_id']; ?>" <?php if (in_array($val['c_id'], $selected_val)) {
                                                                                            echo 'selected';
                                                                                        } ?>>
                                                <?php echo  $val['c_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <input type="hidden" name="section_id" class="form-control" value="<?= $homepage_Allergen_category_section->section_id ?>">
                                <button type="submit" id="trending_category_btn" class="btn btn-danger btn-lg" style="margin-top:20px;margin-left:57rem;">Submit</button>
                            </form>
                        </div>
                    <?php } ?>




                    
                    <!-- Home page main Category Section for homepage -->
                    <?php
                    if (!empty($for_home_section_all_main_Category)) {
                    ?>
                        <h5 class="mt-5">Main Category Section</h5>
                        <div class="row" style="margin-top:10px;">
                            <form action="homepagemain_category_section" method="post">


                                <div class="mt-3 col-lg-10">
                                    <label for="section_title">Heading</label>
                                    <input type="text" name="heading" class="form-control" placeholder="Enter Heading" value="<?= $homepage_main_category_section->heading ?>">
                                </div>


                                <div class="mt-3 col-lg-10">
                                    <label for="section_title">Sub Heading</label>
                                    <input type="text" name="sub_heading" class="form-control" placeholder="Enter Sub Heading" value="<?= $homepage_main_category_section->sub_heading ?>">
                                </div>


                                <div class="mt-3 col-lg-10">
                                    <label for="category"> Select Category</label>
                                    <select id="select_homepage_main_category_section" class="form-control" multiple="true" name="trending_category_data[]">
                                        <?php
                                        $selected_val = explode(",", $homepage_main_category_section->category_id);

                                        foreach ($for_home_section_all_main_Category as $val) {
                                        ?>
                                            <option value="<?php echo $val['c_id']; ?>" <?php if (in_array($val['c_id'], $selected_val)) {
                                                                                            echo 'selected';
                                                                                        } ?>>
                                                <?php echo  $val['c_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <input type="hidden" name="section_id" class="form-control" value="<?= $homepage_main_category_section->section_id ?>">
                                <button type="submit" id="trending_category_btn" class="btn btn-danger btn-lg" style="margin-top:20px;margin-left:57rem;">Submit</button>
                            </form>
                        </div>
                    <?php } ?>





                    <!-- Home page Youtbue section -->
                    <?php
                    if (!empty($forhome_youtube_section_allrecipes)) {
                    ?>
                        <h5 class="mt-4">Youtube Section</h5>
                        <form action="homepage-youtube-section" method="post">
                            <div class="row">
                                <div class="col-lg-10">
                                    <label for="name">Youtube Heading</label>
                                    <input type="text" name="heading" class="form-control" placeholder="Enter Heading" value="<?= $homepage_youtube_sec->heading ?>">
                                    </p>
                                </div>

                                <div class="col-lg-10">
                                    <label for="category">Select Youtube Recipe</label>
                                    <select id="select_youtube_recipes" class="form-control" multiple="true" name="recipes_data[]">
                                        <?php
                                        $selected_val = explode(",", $homepage_youtube_sec->recipe_ids);
                                        if (!empty($forhome_youtube_section_allrecipes))
                                            foreach ($forhome_youtube_section_allrecipes as $val) {
                                        ?>
                                            <option value="<?php echo $val['re_id']; ?>" <?php
                                                                                            if (in_array($val['re_id'], $selected_val)) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                            ?>>
                                                <?php echo  $val['re_title']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>




                                <div class="mt-3 col-lg-10 text-right">
                                    <!-- hidden id -->
                                    <input type="hidden" name="section_id" class="form-control" value="<?= $homepage_youtube_sec->section_id ?>">
                                    <button type="submit" class="btn btn-danger btn-lg">Submit</button>
                                </div>
                                <!-- <div class="row m-t-20 m-b-20 m-r-15">
                                    <div class="col-lg-12">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-danger btn-lg">Submit</button>
                                        </div>
                                    </div>
                                </div> -->
                            </div>

                        </form>
                    <?php
                    }
                    ?>








                    <!-- Home page First section -->
                    <!-- section 1 -->
                    <?php
                    if (!empty($homepage_first_sec)) :
                    ?>
                        <h5 class="mt-4">1. Section</h5>
                        <form action="homepage-first-section" method="post">
                            <div class="row">
                                <div class="col-lg-10">
                                    <label for="name">Heading</label>
                                    <input type="text" name="heading" class="form-control" placeholder="Enter Heading" value="<?= $homepage_first_sec->heading ?>">
                                    </p>
                                </div>

                                <div class="col-lg-10">
                                    <label for="category">Select Recipe</label>
                                    <select id="select_first_recipes" class="form-control" multiple="true" name="recipes_data[]" disabled>
                                        <?php
                                        $selected_val = explode(",", $homepage_first_sec->recipe_ids);
                                        if (!empty($for_home_section_allrecipes)) {
                                            foreach ($for_home_section_allrecipes as $val) {
                                        ?>
                                                <option value="<?php echo $val['re_id']; ?>" <?php
                                                                                                if (in_array($val['re_id'], $selected_val)) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                                ?>>
                                                    <?php echo  $val['re_title']; ?>
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>




                                <div class="mt-3 col-lg-10 text-right">
                                    <!-- hidden id -->
                                    <input type="hidden" name="section_id" class="form-control" value="<?= $homepage_first_sec->section_id ?>">
                                    <button type="submit" class="btn btn-danger btn-lg">Submit</button>
                                </div>
                                <!-- <div class="row m-t-20 m-b-20 m-r-15">
                                    <div class="col-lg-12">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-danger btn-lg">Submit</button>
                                        </div>
                                    </div>
                                </div> -->
                            </div>

                        </form>
                    <?php
                    endif;






                    // <!-- Home page second section -->

                    if (!empty($homepage_secound_sec)) :
                    ?>
                        <h5 class="mt-5">2. Section</h5>
                        <form action="homepage-second-section" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-10">
                                    <label for="name">Heading</label>
                                    <input type="text" name="heading" class="form-control" placeholder="Enter Heading" value="<?= $homepage_secound_sec->heading ?>">
                                </div>

                                <div class="mt-3 col-lg-10">
                                    <label for="c_img">Image</label>
                                    <!-- <input type="file" name="image" class="form-control"> -->
                                    <input type="file" name="homepage_second_img" class="imgInput form-control">
                                </div>
                                <div class="col-lg-2">
                                    <?php
                                    if (!empty($homepage_secound_sec->image)) {
                                    ?>
                                        <img src="<?= base_url() ?>uploads/other-img/<?php echo  $homepage_secound_sec->image; ?>" alt="" width="80" height="70" class="previewImg m-t-10 m-l-15">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="<?= base_url() ?>uploads/no-image.jpg" alt="" width="80" height="70" class="previewImg m-t-10 m-l-15">
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="mt-3 col-lg-10">
                                    <label for="link">Link</label>
                                    <input type="text" name="link_url" class="form-control" placeholder="Enter Link" value="<?= $homepage_secound_sec->link ?>">
                                </div>

                                <div class="mt-3 col-lg-10">
                                    <label for="desc">Description</label>
                                    <textarea name="second_section_description" class="form-control"><?= $homepage_secound_sec->desc ?></textarea>
                                </div>

                                <div class="mt-3 col-lg-10 text-right">
                                    <!-- hidden id -->
                                    <input type="hidden" name="section_id" class="form-control" value="<?= $homepage_secound_sec->section_id ?>">
                                    <button type="submit" class="btn btn-danger btn-lg m-t-10">Submit</button>
                                </div>

                            </div>
                        </form>
                    <?php endif; ?>





                    <!-- Home page Third section -->

                    <?php
                    if (!empty($for_home_section_allrecipes)) {
                    ?>
                        <h5 class="mt-5">3. Section</h5>
                        <div class="row" style="margin-top:10px;">
                            <form action="homepage_third_section" method="post">


                                <div class="mt-3 col-lg-10">
                                    <label for="section_title">Heading</label>
                                    <input type="text" name="heading" class="form-control" placeholder="Enter Heading" value="<?= $homepage_third_section->heading ?>">
                                </div>


                                <div class="mt-3 col-lg-10">
                                    <label for="category"> Select Trending Recipe</label>
                                    <select id="select_homepage_third_section" class="form-control" multiple="true" name="trending_recipes_data[]">
                                        <?php
                                        $selected_val = explode(",", $homepage_third_section->recipe_ids);

                                        foreach ($for_home_section_allrecipes as $val) {
                                        ?>
                                            <option value="<?php echo $val['re_id']; ?>" <?php if (in_array($val['re_id'], $selected_val)) {
                                                                                                echo 'selected';
                                                                                            } ?>>
                                                <?php echo  $val['re_title']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <input type="hidden" name="section_id" class="form-control" value="<?= $homepage_third_section->section_id ?>">
                                <button type="submit" id="trending_recipesadd_btn" class="btn btn-danger btn-lg" style="margin-top:20px;margin-left:57rem;">Submit</button>
                            </form>
                        </div>
                    <?php } ?>














                    <!-- Home page Fourth section -->
                    <?php
                    if (!empty($for_home_section_allblog)) {
                    ?>
                        <h5 class="mt-5">4. Section</h5>
                        <div class="row" style="margin-top:10px;">
                            <form action="homepage_four_section" method="post">


                                <div class="mt-3 col-lg-10">
                                    <label for="section_title">Heading</label>
                                    <input type="text" name="heading" class="form-control" placeholder="Enter Heading" value="<?php echo $homepage_four_section->heading ?? '' ?>">
                                </div>


                                <div class="mt-3 col-lg-10">
                                    <label for="category"> Select Blog</label>
                                    <select id="select_homepage_four_section" class="form-control" multiple="true" name="four_sectiondata_select_data[]" disabled>
                                        <?php
                                        $selected_val = explode(",", $homepage_four_section->blog_ids ?? '');

                                        foreach ($for_home_section_allblog as $val) {
                                        ?>
                                            <option value="<?php echo $val['blog_id']; ?>" <?php if (in_array($val['blog_id'], $selected_val)) {
                                                                                                echo 'selected';
                                                                                            } ?>>
                                                <?php echo  $val['blog_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <input type="hidden" name="section_id" class="form-control" value="<?= $homepage_four_section->section_id ?? '' ?>">
                                <button type="submit" id="trending_recipesadd_btn" class="btn btn-danger btn-lg" style="margin-top:20px;margin-left:57rem;">Submit</button>
                            </form>
                        </div>
                    <?php } ?>


                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

</div>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

<!-- end row -->
</div>