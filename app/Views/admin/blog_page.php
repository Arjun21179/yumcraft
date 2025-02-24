<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- toaster message  -->


<script>
    // ----------------------------------------------------------------->
    // Add Blog success or error toaster msg
    function showToast_success_blogadd() {
        iziToast.success({
            title: "Successfuly",
            message: "Add Data.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",

        });
    }

    function showToast_error_blogadd() {
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
    // Edit Blog success or error toaster msg
    function showToast_success_blogedit() {
        iziToast.success({
            title: "Update",
            message: "Data Successfuly.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",

        });
    }

    function showToast_error_blogedit() {
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





<?php

// --------------------------------------------------------->
// add Blog success or error

if (isset($_SESSION['success_blog_add'])) {
    unset($_SESSION['success_blog_add']);
    echo "<script> showToast_success_blogadd() </script>";
}

if (isset($_SESSION['error_blog_add'])) {
    unset($_SESSION['error_blog_add']);
    echo "<script> showToast_error_blogadd() </script>";
}


// --------------------------------------------------------->
// edit Blog success or error

if (isset($_SESSION['success_blog_edit'])) {
    unset($_SESSION['success_blog_edit']);
    echo "<script> showToast_success_blogedit() </script>";
}

if (isset($_SESSION['error_blog_edit'])) {
    unset($_SESSION['error_blog_edit']);
    echo "<script> showToast_error_blogedit() </script>";
}


?>












<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">
            <div class="card" style="height:auto;">
                <div class="card-body">

                    <!-- table tag -->


                    <h4 class="mt-0 header-title mb-4">Blog Post</h4>





                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn-danger btn-lg m-b-15" id="delete_blog_data_button"> Delete Data </button>
                        </div>

                        <div class="col-lg-6 text-right">
                            <a href="addblog">
                                <button class="btn btn-primary m-b-5">
                                    Add blog
                                </button>
                            </a>


                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="blog_table">
                            <!-- id="recipeslist" -->

                            <thead>
                                <tr>
                                    <th scope="col"><input type="checkbox" id="masterCheckbox"></th>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Blog Name</th>
                                    <th scope="col">Blog Url</th>
                                    <th scope="col">Image</th>
                                    <!-- <th scope="col">tag</th> -->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($all_blog)) {
                                    $i = 0;
                                    foreach ($all_blog as $val) {
                                        $i = $i + 1;
                                ?>


                                        <td>
                                            <input type="checkbox" class="childCheckbox" name="active_checkox[]" value="<?php echo $val['blog_id']; ?>">
                                        </td>
                                        <td class="sr-no">
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <div>
                                                <?php echo $val['blog_name']; ?>
                                            </div>
                                        </td>

                                        <td>
                                            <?php echo $val['blog_url']; ?>
                                        </td>

                                        <td>
                                            <?php if (!empty($val['blog_img'])) {
                                                //   echo 'if';
                                                //   echo $single_category->c_img;
                                            ?>
                                                <img src="<?php echo base_url(); ?>uploads/blog_img/<?php echo $val['blog_img'] ?>" alt="<?php echo base_url(); ?>uploads/blog_img/<?php echo $val['blog_img'] ?>" height="50">
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
                                            <div style="display:flex;">

                                                <?php if ($val['active'] == 0) { ?>
                                                    <a href="blog/preview/<?php echo $val['blog_url']; ?>" target="_blank"><i class="fa-solid fa-eye" style="color:black;margin-top:8px;"></i></a>
                                                <?php } else { ?>
                                                    <a href="blog/<?php echo $val['blog_url']; ?>" target="_blank"><i class="fa-solid fa-eye" style="color:black;margin-top:8px;"></i></a>
                                                <?php } ?>
                                                

                                                <form action="editblog" method="post">
                                                    <input type="hidden" name="blog_id" value="<?php echo $val['blog_id']; ?>">
                                                    <button type="submit" style="border:none;background-color:transparent;cursor:pointer;">
                                                        <i class="mdi mdi-pencil" style="font-size:18px;"></i>
                                                    </button>
                                                </form>

                                                <?php if ($val['active'] == 0) { ?>
                                                    <a onclick="blog_active(<?php echo $val['blog_id']; ?>,this)" class="check_deactive" style="cursor:pointer;">
                                                        <i class="fas fa-toggle-off" aria-hidden="true" style="margin-top:8px;"></i>
                                                    </a>
                                                <?php } else { ?>
                                                    <a onclick="blog_deactive(<?php echo $val['blog_id']; ?>,this)" class="check_deactive" style="cursor:pointer;">
                                                        <i class="fas fa-toggle-on" aria-hidden="true" style="margin-top:8px;"></i>
                                                    </a>
                                                <?php } ?>

                                                <a onclick="blog_delete(<?php echo $val['blog_id']; ?>,this)">
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