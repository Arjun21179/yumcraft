<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- toaster message  -->


<script>
    // ----------------------------------------------------------------->
    // Edit  success or error toaster msg
    // function showToast_success_logo_info_edit() {
    //     iziToast.success({
    //         title: "Update",
    //         message: "Details Successfuly.",
    //         timeout: 3000,
    //         position: "topRight",
    //         theme: "black",
    //         color: "green",

    //     });
    // }

    // function showToast_error_logo_info_edit() {
    //     iziToast.error({
    //         title: "Failed",
    //         message: "To Update Details.",
    //         timeout: 3000,
    //         position: "topRight",
    //         theme: "black",
    //         color: "red",
    //         backgroundColor: "#ff0000",
    //         messageColor: "white",
    //         titleColor: "white",
    //         progressBarColor: 'black',

    //     });
    // }
</script>


<?php


// --------------------------------------------------------->
// Update logo and info success or error
// if (isset($_SESSION['success_logo_info_add'])) {
//     unset($_SESSION['success_logo_info_add']);
//     echo "<script> showToast_success_logo_info_edit() </script>";
// }

// if (isset($_SESSION['error_logo_info_add'])) {
//     unset($_SESSION['error_logo_info_add']);
//     echo "<script> showToast_error_logo_info_edit() </script>";
// }


?>







<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">
            <div class="card" style="height:auto;">
                <div class="card-body">

                    <!-- table tag -->


                    <h4 class="mt-0 header-title mb-4">Update Details</h4>

                    <?php if (!empty($logo_info)) {
                    ?>
                        <form id="logo_favicon_Form" method="post" enctype="multipart/form-data">
                            <!-- action="edit_logo_info_logic" -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Logo Image</label><br>
                                    <?php if (!empty($logo_info->manages_pages_logo)) {
                                        //   echo 'if';
                                        //   echo $single_category->c_img;
                                    ?>
                                        <img src="<?php echo base_url(); ?>uploads/logo_info/<?php echo $logo_info->manages_pages_logo; ?>" alt="" width="400" height="200" class="previewImg logo_class m-l-15">
                                    <?php
                                    } else {
                                        // echo 'else';
                                    ?>
                                        <img src="<?php echo base_url(); ?>uploads/logo_info/no-image.jpg" alt="" width="400" height="200" class="previewImg logo_class m-l-15">
                                    <?php
                                    }
                                    ?>
                                    <input type="file" name="logo" id="logo" class="imgInput form-control m-t-15" style="width:26rem;">
                                </div>

                                <div class="col-lg-6">
                                    <label>Favicon Image</label><br>
                                    <?php if (!empty($logo_info->manages_pages_favicon)) {
                                        //   echo 'if';
                                        //   echo $single_category->c_img;
                                    ?>
                                        <img src="<?php echo base_url(); ?>uploads/logo_info/<?php echo $logo_info->manages_pages_favicon; ?>" alt="" width="400" height="200" class="previewImg2 favicon_logo_class m-l-15">
                                    <?php
                                    } else {
                                        // echo 'else';
                                    ?>
                                        <img src="<?php echo base_url(); ?>uploads/logo_info/no-image.jpg" alt="" width="400" height="200" class="previewImg2 logo_class m-l-15">
                                    <?php
                                    }
                                    ?>
                                    <input type="file" name="favicon_logo" id="favicon_logo" class="imgInput2 form-control m-t-15" style="width:26rem;">
                                </div>
                            </div>



                            <div class="text-right m-t-20">
                                <input type="hidden" name="manages_pages_id" id="manages_pages_id" value="<?php echo $logo_info->manages_pages_id; ?>">
                                <button type="submit" class="btn btn-success btn-lg m-b-5">
                                    Update
                                </button>
                            </div>
                        </form>

                    <?php } ?>

                    <!-- table tag -->

                </div>
            </div>
        </div>
        <!-- end col -->

    </div>
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

    <!-- end row -->
</div>