<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- toaster message  -->


<script>

    // ----------------------------------------------------------------->
    // Add category success or error toaster msg
    function showToast_success_videoadd() {
        iziToast.success({
            title: "Video Url",
            message: "Add Successfuly.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",

        });
    }

    function showToast_error_videoadd() {
        iziToast.error({
            title: "Failed",
            message: "To Add Video Url.",
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
    function showToast_success_videoedit() {
        iziToast.success({
            title: "Update",
            message: "Video Successfuly.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",

        });
    }

    function showToast_error_videoedit() {
        iziToast.error({
            title: "Failed",
            message: "To Update Video.",
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
if (isset($_SESSION['success_video_add'])) {
    unset($_SESSION['success_video_add']);
    echo "<script> showToast_success_videoadd() </script>";
}

if (isset($_SESSION['error_video_add'])) {
    unset($_SESSION['error_video_add']);
    echo "<script> showToast_error_videoadd() </script>";
}


// --------------------------------------------------------->
// edit category success or error
if (isset($_SESSION['success_video_edit'])) {
    unset($_SESSION['success_video_edit']);
    echo "<script> showToast_success_videoedit() </script>";
}

if (isset($_SESSION['error_video_edit'])) {
    unset($_SESSION['error_video_edit']);
    echo "<script> showToast_error_videoedit() </script>";
}


?>













<!-- add  modal -->

<!-- sample modal content -->
<div id="add_videomodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Video Url</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <form action="add_video_link" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="videourl">Video Url</label>
                        <input type="text" name="video_link" placeholder="Enter the Video Url" class="form-control"
                            required>
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
<div id="edit_video_modalform" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Edit Video Url</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div id="edit_video_form">

            </div>

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


                    <h4 class="mt-0 header-title mb-4">Video</h4>
                    <button type="button" class="btn btn-primary m-b-5" data-toggle="modal"
                        data-target="#add_videomodal">
                        Add Video Link
                    </button>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="video_list">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Video</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($video_desending)) {
                                    $i = 0;
                                    foreach ($video_desending as $val) {

                                        $i = $i + 1;
                                        ?>
                                        <tr>
                                            <td class="sr-no">
                                                <?php echo $i; ?>
                                            </td>
                                            <td>
                                                <div>
                                                    <?php echo $val['video_link']; ?>
                                                </div>
                                            </td>

                                            <td>
                                                <div>
                                                    <!-- <a
                                                        href="<?php echo base_url(); ?>tag-editpage/<?php echo $val['video_link']; ?>">
                                                        <i class="mdi mdi-pencil" style="font-size:18px;"></i>
                                                    </a> -->

                                                    <!-- <a data-toggle="modal"
                                                        data-target="#edit_videomodal<?php echo $val['video_id']; ?>">
                                                        <i class="mdi mdi-pencil" style="font-size:18px;cursor:pointer;"></i>
                                                    </a> -->

                                                    <a onclick="video_edit(<?php echo $val['video_id']; ?>)">
                                                        <i class="mdi mdi-pencil" style="font-size:18px;cursor:pointer;"></i>
                                                    </a>

                                                    <a onclick="video_delete(<?php echo $val['video_id']; ?>,this)">
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