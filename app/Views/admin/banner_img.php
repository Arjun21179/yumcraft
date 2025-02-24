<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- toaster message  -->


<script>

    // ----------------------------------------------------------------->
    // Add category success or error toaster msg
    function showToast_success_banner_insert() {
        iziToast.success({
            title: "Banner",
            message: "Add Successfuly.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",

        });
    }

    function showToast_error_banner_insert() {
        iziToast.error({
            title: "Failed",
            message: "To Add Banner Image.",
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
    function showToast_success_banner_edit() {
        iziToast.success({
            title: "Update",
            message: "Banner Image Successfuly.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",

        });
    }

    function showToast_error_banner_edit() {
        iziToast.error({
            title: "Failed",
            message: "To Update Banner Image.",
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
if (isset($_SESSION['banner_insert_success'])) {
    unset($_SESSION['banner_insert_success']);
    echo "<script> showToast_success_banner_insert() </script>";
}

if (isset($_SESSION['banner_insert_error'])) {
    unset($_SESSION['banner_insert_error']);
    echo "<script> showToast_error_banner_insert() </script>";
}


// --------------------------------------------------------->
// edit category success or error
if (isset($_SESSION['edit_banner_success'])) {
    unset($_SESSION['edit_banner_success']);
    echo "<script> showToast_success_banner_edit() </script>";
}

if (isset($_SESSION['edit_banner_error'])) {
    unset($_SESSION['edit_banner_error']);
    echo "<script> showToast_error_banner_edit() </script>";
}


?>













<!-- add banner modal -->

<!-- sample modal content -->
<div id="add_videomodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <form action="insert_banner_img_logic" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Banner Title</label>
                        <input type="text" name="banner_title" placeholder="Enter the Banner Title"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Banner Short Description</label>
                        <input type="text" name="banner_shortdescription" placeholder="Enter the Banner Short Description"
                            class="form-control">
                    </div>

                    <div class="row m-t-20">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Banner Image</label>
                                <input type="file" name="banner_img" class="imgInput form-control">
                                <img src="<?php echo base_url(); ?>uploads/banner_img/no-image.jpg" alt=""
                                    width="80" height="70" class="previewImg m-l-15" style="margin-top:20px;">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Mobile Image</label>
                                <input type="file" name="mobile_img" class="imgInput2 form-control">
                                <img src="<?php echo base_url(); ?>uploads/banner_img/no-image.jpg" alt="" width="80" height="70"
                                    class="previewImg2 m-l-15">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<!-- ---------------------------------------->
<!-- Edit tag modal  using ajax ad-->
<div id="edit_banner_modalForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Edit Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div id="edit_Banner_form">

            </div>
        </div>
    </div>
</div>






<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">
            <div class="card" style="height:auto;">
                <div class="card-body">

                    <!-- table tag -->


                    <h4 class="mt-0 header-title mb-4">Banner</h4>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary m-b-5" data-toggle="modal"
                            data-target="#add_videomodal">
                            Add Banner
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="banner_img">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Banner Image</th>
                                    <th scope="col">Mobile Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($banner_desending)) {
                                    $i = 0;
                                    foreach ($banner_desending as $val) {

                                        $i = $i + 1;
                                        ?>
                                        <tr>
                                            <td class="sr-no">
                                                <?php echo $i; ?>
                                            </td>

                                            <td>
                                                <?php echo $val['banner_title']; ?>
                                            </td>

                                            <td width="20%">
                                                <?php echo $val['banner_shortdescription']; ?>
                                            </td>

                                            <td>
                                                <?php if (!empty($val['banner_site_img'])) { ?>
                                                    <img src="<?php echo base_url(); ?>uploads/banner_img/<?php echo $val['banner_site_img']; ?>"
                                                        alt="" width="80" height="70" class="m-t-10 m-l-15">
                                                <?php } else { ?>
                                                    <img id="imgshow" src="<?php echo base_url(); ?>uploads/banner_img/no-image.jpg" alt=""
                                                        width="70" height="70" class="m-t-10 m-l-15">
                                                <?php } ?>
                                            </td>

                                            <td>
                                                <?php if (!empty($val['banner_mobile_img'])) { ?>
                                                    <img src="<?php echo base_url(); ?>uploads/banner_img/<?php echo $val['banner_mobile_img']; ?>"
                                                        alt="" width="80" height="70" class="m-t-10 m-l-15">
                                                <?php } else { ?>
                                                    <img id="imgshow" src="<?php echo base_url(); ?>uploads/banner_img/no-image.jpg" alt=""
                                                        width="70" height="70" class="m-t-10 m-l-15">
                                                <?php } ?>
                                            </td>




                                            
                                            <td>
                                                <div>
                                                    <!-- <a data-toggle="modal"
                                                        data-target="#edit_banner_modal<?php echo $val['banner_id']; ?>">
                                                        <i class="mdi mdi-pencil" style="font-size:18px;cursor:pointer;"></i>
                                                    </a> -->

                                                    <a onclick="banner_edit(<?php echo $val['banner_id']; ?>)">
                                                        <i class="mdi mdi-pencil" style="font-size:18px;cursor:pointer;"></i>
                                                    </a>

                                                    <?php if ($val['active'] == 0) { ?>
                                                        <a onclick="banner_active(<?php echo $val['banner_id']; ?>,this)"
                                                            class="check_deactive" style="cursor:pointer;">
                                                            <i class="fas fa-toggle-off" aria-hidden="true"></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a onclick="banner_deactive(<?php echo $val['banner_id']; ?>,this)"
                                                            class="check_deactive" style="cursor:pointer;">
                                                            <i class="fas fa-toggle-on" aria-hidden="true"></i>
                                                        </a>
                                                    <?php } ?>

                                                    <a onclick="banner_delete(<?php echo $val['banner_id']; ?>,this)">
                                                        <i class="mdi mdi-delete" style="font-size:18px;cursor:pointer;"></i>
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