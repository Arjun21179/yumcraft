<?php
// <!-- category names gets -->
function get_categories($re_id, &$all_relational_category, &$allcategories)
{
    $rel_category = 0;
    $category_name = '';

    if (!empty($all_relational_category)) {
        foreach ($all_relational_category as $rel_cat) {
            // comapare relational table re_id to recipe table re_id
            if ($rel_cat['recipe_id'] == $re_id) {
                $rel_category = $rel_cat['category_id'];
                break;
            }
        }

        $allcat = explode(',', $rel_category);

        foreach ($allcat as $all_cat_val) {
            //  echo $all_cat_val;
            foreach ($allcategories as $all_cat) {
                if ($all_cat_val == $all_cat['c_id']) {
                    $category_name .= $all_cat['c_name'] . ',';
                    break;
                }
            }
        }

        // Remove the trailing comma using rtrim
        $category_name = rtrim($category_name, ',');
        return $category_name;
    }
}




// get tag data 
function get_tag($re_id, &$all_relational_tag, &$alltaglist)
{
    $rel_tag_ids = [];
    $tag_name = '';

    if (!empty($all_relational_tag)) {
        foreach ($all_relational_tag as $relational_tag) {
            if ($relational_tag['recipe_id'] == $re_id) {

                $rel_tag_ids = explode(',', $relational_tag['tag_id']);
                break;
            }
        }

        foreach ($rel_tag_ids as $tag_id) {
            foreach ($alltaglist as $tag) {
                if ($tag_id == $tag['tag_id']) {
                    $tag_name .= $tag['tag_name'] . ',';
                    break;
                }
            }
        }

        // Remove the trailing comma using rtrim
        $tag_name = rtrim($tag_name, ',');
        return $tag_name;
    }
    return ''; // Return an empty string if no tags found
}




?>








<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- toaster message  -->


<script>
    // ----------------------------------------------------------------->
    // Add recipe success or error toaster msg
    function showToast_success_recipeadd() {
        iziToast.success({
            title: "Successfuly",
            message: "Add Data.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",

        });
    }

    function showToast_error_recipeadd() {
        iziToast.error({
            title: "Failed",
            message: "To Add Data.",
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


    // ----------------------------------------------------------------->
    // Edit recipe success or error toaster msg
    function showToast_success_recipeedit() {
        iziToast.success({
            title: "Update",
            message: "Data Successfuly.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",

        });
    }

    function showToast_error_recipeedit() {
        iziToast.error({
            title: "Failed",
            message: "To Update Data.",
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


<!-- Delete All Records emails -->
<?php

// --------------------------------------------------------->
// add recipe success or error
session_start();
if (isset($_SESSION['success_recipe_add'])) {
    unset($_SESSION['success_recipe_add']);
    echo "<script> showToast_success_recipeadd() </script>";
}

if (isset($_SESSION['error_recipe_add'])) {
    unset($_SESSION['error_recipe_add']);
    echo "<script> showToast_error_recipeadd() </script>";
}


// --------------------------------------------------------->
// edit recipe success or error
session_start();
if (isset($_SESSION['success_recipe_edit'])) {
    unset($_SESSION['success_recipe_edit']);
    echo "<script> showToast_success_recipeedit() </script>";
}

if (isset($_SESSION['error_recipe_edit'])) {
    unset($_SESSION['error_recipe_edit']);
    echo "<script> showToast_error_recipeedit() </script>";
}


?>










<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">
            <div class="card" style="height:auto;">
                <div class="card-body">

                    <!-- table tag -->


                    <h4 class="mt-0 header-title mb-4">Recipes Post</h4>



                    <!-- search logic -->
                    <!-- <div class="m-b-20">
                        <form action="recipes" method="get">
                            <div class="input-group-text border-0 text-right" id="search-addon" style="width:30rem;">
                                <input type="search" value=" -->
                    <?php
                    // if (isset($_GET['search_recipe'])) {
                    //     echo $_GET['search_recipe'];
                    // } 
                    ?>
                    <!-- id="searchbox" name="search_recipe" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />

                                <div class="input-group-text border-0 text-right" id="search-addon">
                                    <button class="btn btn-success" type="submit">Search</button> -->
                    <?php
                    // if (isset($_GET['search_recipe'])) { 
                    ?>
                    <!-- <a class="btn btn-success m-l-15" href="recipes">Reset</a> -->
                    <?php
                    //  }
                    ?>
                    <!-- </div>
                            </div>

                        </form>
                    </div> -->





                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn-danger btn-lg m-b-15" id="delete_recipe_data_button"> Delete Data </button>
                        </div>

                        <div class="col-lg-6 text-right">
                            <a href="addrecipes">
                                <button class="btn btn-primary m-b-5">
                                    Add Recipes
                                </button>
                            </a>


                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="recipeslist">
                            <!-- id="recipeslist" -->

                            <thead>
                                <tr>
                                    <th scope="col"><input type="checkbox" id="masterCheckbox"></th>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Recipes Name</th>
                                    <th scope="col">Recipes Url</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Cateogry</th>
                                    <!-- <th scope="col">Author Name</th> -->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($allrecipes)) {
                                    $i = 0;
                                    foreach ($allrecipes as $recipes_val) {
                                        $i = $i + 1;
                                ?>


                                        <td>
                                            <input type="checkbox" class="childCheckbox" name="active_checkox[]" value="<?php echo $recipes_val['re_id']; ?>">
                                        </td>
                                        <td class="sr-no">
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <div>
                                                <?php echo $recipes_val['re_title']; ?>
                                            </div>
                                        </td>

                                        <td>
                                            <?php echo $recipes_val['re_titleurl']; ?>
                                        </td>

                                        <td>
                                            <?php if (!empty($recipes_val['re_images'])) {
                                                //   echo 'if';
                                                //   echo $single_category->c_img;
                                            ?>
                                                <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $recipes_val['re_images'] ?>" alt="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $recipes_val['re_images'] ?>" height="50">
                                            <?php
                                            } else {
                                                // echo 'else';
                                            ?>
                                                <img src="<?php echo base_url(); ?>uploads/recipes_img/no-image.jpg" alt="" height="50">
                                            <?php
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo get_categories($recipes_val['re_id'], $all_relational_category, $allcategories);
                                            ?>
                                        </td>


                    

                                        <!-- <td> -->
                                        <?php
                                        //    echo $recipes_val['author_name'];
                                        ?>
                                        <!-- </td> -->


                                        <td>
                                            <div style="display:flex;">

                                                <?php if ($recipes_val['active'] == 0) { ?>
                                                    <a href="recipe/preview/<?php echo $recipes_val['re_titleurl']; ?>" target="_blank"><i class="fa-solid fa-eye" style="color:black;margin-top:8px;"></i></a>
                                                <?php } else { ?>
                                                    <a href="recipe/<?php echo $recipes_val['re_titleurl']; ?>" target="_blank"><i class="fa-solid fa-eye" style="color:black;margin-top:8px;"></i></a>
                                                <?php } ?>


                                                <form action="editrecipes-view" method="post">
                                                    <input type="hidden" name="re_id" value="<?php echo $recipes_val['re_id']; ?>">
                                                    <button type="submit" style="border:none;background-color:transparent;cursor:pointer;">
                                                        <i class="mdi mdi-pencil" style="font-size:18px;"></i>
                                                    </button>
                                                </form>

                                                <?php if ($recipes_val['active'] == 0) { ?>
                                                    <a onclick="recipe_active(<?php echo $recipes_val['re_id']; ?>,this)" class="check_deactive" style="cursor:pointer;">
                                                        <i class="fas fa-toggle-off" aria-hidden="true" style="margin-top:8px;"></i>
                                                    </a>
                                                <?php } else { ?>
                                                    <a onclick="recipe_deactive(<?php echo $recipes_val['re_id']; ?>,this)" class="check_deactive" style="cursor:pointer;">
                                                        <i class="fas fa-toggle-on" aria-hidden="true" style="margin-top:8px;"></i>
                                                    </a>
                                                <?php } ?>

                                                <a onclick="recipes_delete(<?php echo $recipes_val['re_id']; ?>,this)">
                                                    <i class="mdi mdi-delete" style="font-size:18px;cursor:pointer;margin-left:8px;"></i>
                                                </a>

                                            </div>
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
                            // echo $pager->links() 
                            ?>
                        </div>
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