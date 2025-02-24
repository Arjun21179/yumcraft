<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- toaster message  -->


<script>
    // ----------------------------------------------------------------->
    // Add category success or error toaster msg
    function showToast_success_categoryadd() {
        iziToast.success({
            title: "Successfuly",
            message: "Add Category.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",

        });
    }

    function showToast_error_categoryadd() {
        iziToast.error({
            title: "Failed",
            message: "To Add Category.",
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
    // Edit category success or error toaster msg
    function showToast_success_categoryedit() {
        iziToast.success({
            title: "Update",
            message: "Category Successfuly.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",

        });
    }

    function showToast_error_categoryedit() {
        iziToast.error({
            title: "Failed",
            message: "To Update Category.",
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
// add category success or error
session_start();
if (isset($_SESSION['success_category_add'])) {
    unset($_SESSION['success_category_add']);
    echo "<script> showToast_success_categoryadd() </script>";
}

if (isset($_SESSION['error_category_add'])) {
    unset($_SESSION['error_category_add']);
    echo "<script> showToast_error_categoryadd() </script>";
}


// --------------------------------------------------------->
// edit category success or error
if (isset($_SESSION['success_category_edit'])) {
    unset($_SESSION['success_category_edit']);
    echo "<script> showToast_success_categoryedit() </script>";
}

if (isset($_SESSION['error_category_edit'])) {
    unset($_SESSION['error_category_edit']);
    echo "<script> showToast_error_categoryedit() </script>";
}


?>













<!-- add category modal -->

<!-- sample modal content -->
<div id="add_categorymodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <form action="add_category" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cname">Category Name</label>
                        <input type="text" name="c_name" placeholder="Enter the Category Name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <!-- <input type="file" name="c_img" placeholder="Enter the Category Image" class="form-control"> -->
                        <label for="image">Image</label>
                        <input type="file" name="c_img" class="imgInput form-control" required>
                        <br>
                        <label for="alt">Alt Data</label>
                        <input type="text" name="category_img_alt" id="category_img_alt" class="form-control" placeholder="Enter the Alt Data">
                        <img src="<?php echo base_url(); ?>uploads/recipes_img/no-image.jpg" alt="" width="80" height="70" class="previewImg m-t-10 m-l-15">
                    </div>

                    <div class="form-group">
                        <label>Popular Category</label>
                        <select name="popular_category" class="form-control" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Set on top menu</label>
                        <select name="Set_on_top_menu" class="form-control" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <!-- set flag -->
                    <input type="hidden" name="flag" value="1">
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">
            <div class="card" style="height:auto;">
                <div class="card-body">

                    <!-- table tag -->


                    <h4 class="mt-0 header-title mb-4">Category</h4>
                    <button type="button" class="btn btn-primary m-b-5" data-toggle="modal" data-target="#add_categorymodal">
                        Add Category
                    </button>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="categorylist">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Category Url</th>
                                    <th scope="col">Category Image</th>
                                    <th scope="col">Category Id</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($category)) {
                                    $i = 0;
                                    foreach ($category as $val) {

                                        $i = $i + 1;
                                ?>
                                        <tr>
                                            <td class="sr-no">
                                                <?php echo $i; ?>
                                            </td>

                                            <td>
                                                <div>
                                                    <?php echo $val['c_name']; ?>
                                                </div>
                                            </td>

                                            <td>
                                                <?php echo $val['c_url']; ?>
                                            </td>

                                            <td>
                                                <?php
                                                if (!empty($val['c_img'])) {
                                                ?>
                                                    <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['c_img']; ?>" alt="" width="80" height="70" class="previewImg m-t-10 m-l-15">
                                                <?php
                                                } else {
                                                ?>
                                                    <img src="<?php echo base_url(); ?>uploads/recipes_img/no-image.jpg" alt="" width="80" height="70" class="previewImg m-t-10 m-l-15">
                                                <?php } ?>
                                            </td>


                                            </td>

                                            <td>
                                                <div>
                                                    <?php echo $val['c_id']; ?>
                                                </div>
                                            </td>

                                            <td>
                                                <div style="display:flex;">

                                                    <?php if ($val['active'] == 0) { ?>
                                                        <a href="category/preview/<?php echo $val['c_url']; ?>" target="_blank"><i class="fa-solid fa-eye" style="color:black;margin-top:8px;"></i></a>
                                                    <?php } else { ?>
                                                        <a href="recipe/<?php echo $val['c_url']; ?>" target="_blank"><i class="fa-solid fa-eye" style="color:black;margin-top:8px;"></i></a>
                                                    <?php } ?>


                                                    <form action="edit-category" method="post">
                                                        <input type="hidden" name="c_id" value="<?php echo $val['c_id']; ?>">
                                                        <button type="submit" style="border:none;background-color:transparent;cursor:pointer;">
                                                            <i class="mdi mdi-pencil" style="font-size:18px;"></i>
                                                        </button>
                                                    </form>

                                                    <?php if ($val['active'] == 0) { ?>
                                                        <a onclick="category_active(<?php echo $val['c_id']; ?>,this)" class="check_active" style="cursor:pointer;">
                                                            <i class="fas fa-toggle-off" aria-hidden="true" style="margin-top:8px;"></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a onclick="category_deactive(<?php echo $val['c_id']; ?>,this)" class="check_deactive" style="cursor:pointer;">
                                                            <i class="fas fa-toggle-on" aria-hidden="true" style="margin-top:8px;"></i>
                                                        </a>
                                                    <?php } ?>

                                                    <a onclick="category_delete(<?php echo $val['c_id']; ?>,this)">
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