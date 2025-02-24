<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- toaster message  -->


<script>
    // ----------------------------------------------------------------->
    // Edit gallery success or error toaster msg
    function showToast_success_galleryedit() {
        iziToast.success({
            title: "Update",
            message: "Data Successfuly.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",

        });
    }

    function showToast_error_galleryedit() {
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
// edit Gallery success or error
if (isset($_SESSION['success_gallery_edit'])) {
    unset($_SESSION['success_gallery_edit']);
    echo "<script> showToast_success_galleryedit() </script>";
}

if (isset($_SESSION['error_gallery_edit'])) {
    unset($_SESSION['error_gallery_edit']);
    echo "<script> showToast_error_galleryedit() </script>";
}


?>













<!-- add  modal -->

<!-- sample modal content -->
<div id="add_imgmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <form id="add_img_dynamic" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="title"> Title</label>
                        <input type="text" name="title" class="form-control" placeholder="enter the title">
                    </div>

                    <div class="form-group">
                        <label for="videourl"> Image</label>
                        <!-- <input type="file" name="image[]" class="form-control"
                            required multiple> -->
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






<!-- ------------------------------------------------------->
<!-- Edit tag modal -->
<div id="edit_galler_dynamic_modalform" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Edit Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div id="edit_gallery_form">

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<!-- -----Set Sequence Modal-------------------------------------------------->
<div id="add_sequcnce_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Set Sequence</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <form id="set_sequnce_gallery" method="post" enctype="multipart/form-data">
                <?php if (!empty($gallery_dynamic_desending)) {

                ?>
                    <div class="modal-body">

                        <div class="d-flex flex-wrap"> <!-- Flex container -->
                            <?php foreach ($gallery_dynamic_desending as $val) { ?>
                                <div class="col-lg-4 form-group m-2" style="flex: 1 0 15%;margin: 10px;box-sizing: border-box;"> <!-- Set to col-lg-4 for three items per row -->
                                    <img src="<?php echo base_url(); ?>uploads/gallery_dynamic/<?= $val['image'] ? $val['image'] : "" ?>" alt="" width="120" height="120" class="previewImg">

                                    <br>
                                    <label for="sequences">Set Sequence:</label>
                                    <select name="newSequence[]" id="newSequence" class="form-control" required style="width:50%; max-height: 150px; overflow-y: auto;">
                                        <?php for ($i = 1; $i <= count($gallery_dynamic_desending); $i++): ?>
                                            <option value="<?= $i ?>" <?= (!empty($val['sequence']) && $val['sequence']==$i) ? 'selected' : ''; ?>><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>

                                <input type="hidden" name="gallery_dynamic_id[]" value="<?= $val['g_id']  ?>">
                            <?php } ?>
                        </div>


                    </div>
                <?php

                }
                ?>
                <div class="modal-footer">

                    <button type="button" class="btn btn-info waves-effect waves-light" onclick="set_sequnce_gallery()">Submit</button>
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


                    <h1 class="mt-0 header-title mb-4" style="font-size:25px;">Gallery</h1>
                    <button type="button" class="btn btn-primary m-b-5" data-toggle="modal" style="margin-bottom:20px;"
                        data-target="#add_imgmodal">
                        Add Image
                    </button>

                    <button type="button" class="btn btn-danger m-b-5" style="margin-left:62rem;margin-bottom:20px;" data-toggle="modal" data-target="#add_sequcnce_modal"> Set Sequece </button>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="gallery_dynamic_list">
                            <thead>
                                <tr>  
                                    <th scope="col">Sr No</th>
                                    <th>Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($gallery_dynamic_desending)) {
                                    $i = 0;
                                    foreach ($gallery_dynamic_desending as $val) {

                                        $i = $i + 1;
                                ?>
                                        <tr>
                                            <td class="sr-no">
                                                <?php echo $i; ?>
                                            </td>

                                            <td class="sr-no">
                                                <?= $val['title']; ?>
                                            </td>

                                            <td>
                                                <div>
                                                    <img src="<?php echo base_url(); ?>uploads/gallery_dynamic/<?= $val['image'] ? $val['image'] : "" ?>" alt="" width="120" height="120" class="previewImg m-t-10 m-l-15">
                                                </div>
                                            </td>


                                            <td>
                                                <div>
                                                    <!-- <a
                                                        href="<?php echo base_url(); ?>tag-editpage/<?php echo $val['g_id']; ?>">
                                                        <i class="mdi mdi-pencil" style="font-size:18px;"></i>
                                                    </a> -->

                                                    <!-- <a data-toggle="modal"
                                                        data-target="#edit_videomodal<?php echo $val['g_id']; ?>">
                                                        <i class="mdi mdi-pencil" style="font-size:18px;cursor:pointer;"></i>
                                                    </a> -->

                                                    <a onclick="gallery_dynamic_edit(<?php echo $val['g_id']; ?>)">
                                                        <i class="mdi mdi-pencil" style="font-size:18px;cursor:pointer;"></i>
                                                    </a>

                                                    <a onclick="gallery_dynamic_delete(<?php echo $val['g_id']; ?>,this)">
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