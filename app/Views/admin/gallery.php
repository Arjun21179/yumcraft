<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- add image gallery modal -->

<!-- sample modal content -->
<div id="add_gallerymodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <form id="form_gallery_img" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div id="gallery_container">

                        <div class="gallery_row_recipe_data col-lg-12 d-flex mt-4">
                            <div class="col-lg-5">
                                <label for="image">Image</label>
                                <input type="file" name="gallery_image[]" id="gallery_image" class="form-control" multiple>
                                <span id="error-message" style="color:red;display:none;">Please Upload Image</span>
                                <img src="<?php echo base_url(); ?>uploads/recipes_img/no-image.jpg" alt="" width="80" height="70" class="m-t-10 m-l-15">
                            </div>

                            <div class="col-lg-5">
                                <label for="alt">Alt Data</label>
                                <input type="text" name="gallery_image_alt[]" id="gallery_image_alt" class="form-control" placeholder="Enter the Alt Data">
                            </div>

                            <div class="col-lg-2 mt-4">
                                <button type="button" class="btn btn-danger removeRow_gallery_data" onclick="RemoveRow_gallery_data()">Remove</button>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" onclick="addRow_gallery_data()" class="btn btn-primary mt-3">Add Row</button>
                    <button type="button" onclick="gallery_insert()" class="btn btn-success mt-3">Submit</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->







<!-- ------------------------------------------------------->
<!-- Edit website Gallery modal -->
<div id="edit_website_gallery_modalform" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Edit Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div id="edit_website_gallery_form">

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->










<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">




            <!-- xxxxxxxxx Add New Gallery Image xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
            <div class="card" style="height:auto;">
                <div class="card-body">

                    <!-- table tag -->

                    <h4 class="mt-0 header-title mb-4" style="font-size:25px;">Image Gallery</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn-danger btn-lg m-b-15" id="delete_gallery_img_button"> Delete Data </button>
                        </div>

                        <div class="col-lg-6 text-right">
                            <button class="btn btn-primary btn-lg m-b-5" data-toggle="modal" data-target="#add_gallerymodal">
                                Add Image
                            </button>
                        </div>
                    </div>


                    <!-- <form action="gallery-section" method="get">
                        <div class="row mt-4 mb-4">
                            <div class="col-lg-8">
                                <input type="text" name="search_here_gallery" value="<?= !empty($search_value) ? $search_value : '' ?>" class="form-control" placeholder="Search Here">
                            </div>

                            <div class="col-lg-4">
                                <button type="submit" class="btn-success btn-lg">
                                    Search
                                </button>

                                <a href="gallery-section" class="btn-danger btn-lg">
                                    Clear
                                </a>
                            </div>
                        </div>
                    </form> -->


                    <table class="table table-hover mb-0" id="gallery_datatable" style="table-layout: fixed; width: 100%; word-wrap: break-word;">
                        <thead>
                            <tr>
                                <th scope="col"><input type="checkbox" id="masterCheckbox"></th>
                                <th scope="col" style="width: 10%;">Image</th>
                                <th scope="col" style="width: 20%;">Image Url</th>
                                <th scope="col" style="width: 4%;">Copy Image Url</th>
                                <th scope="col" style="width: 30%; word-wrap: break-word; white-space: normal;">Alt Data</th>
                                <th scope="col" style="width: 7%;">Alt Data Copy</th>
                                <th scope="col" style="width: 5%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($allgallery_img_desc_data)) {
                                foreach ($allgallery_img_desc_data as $val) {
                            ?>
                                    <tr>
                                        <td style="width: 2%;">
                                            <input type="checkbox" class="childCheckbox" name="active_checkox[]" value="<?php echo $val['gallery_id']; ?>">
                                        </td>

                                        <td style="width: 5%;">
                                            <?php if (!empty($val['image'])) { ?>
                                                <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $val['image'] ?>" alt="" width="120px" height="auto">
                                            <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>uploads/no-image.jpg" alt="" height="50">
                                            <?php } ?>
                                        </td>

                                        <td style="width: 20%;">
                                            <?php echo base_url() . 'uploads/gallery/' . $val['image']; ?>
                                        </td>

                                        <td style="width: 4%;">
                                            <button onclick="copy_image_path('<?php echo base_url() . 'uploads/gallery/' . $val['image']; ?>')" class="btn">
                                                Copy Url
                                            </button>
                                        </td>

                                        <td class="text_data" style="width: 30%; word-wrap: break-word; white-space: normal;">
                                            <?php echo !empty($val['gallery_image_alt']) ? $val['gallery_image_alt'] : ''; ?>
                                        </td>

                                        <td style="width: 2%;">
                                            <button onclick="copy_text_data(this)" class="btn">
                                                Copy Text
                                            </button>
                                        </td>

                                        <td style="width: 2%;">
                                            <div style="display:flex;">

                                                <a onclick="website_gallery_edit(<?php echo $val['gallery_id']; ?>)">
                                                    <i class="mdi mdi-pencil" style="font-size:18px;cursor:pointer;"></i>
                                                </a>

                                                <a onclick="galler_img_delete(<?php echo $val['gallery_id']; ?>,this)">
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