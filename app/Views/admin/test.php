<!-- All Gallery IMage section code -->
<!-- 
xxxxxxxxx All Project Gallery Table xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            <div class="card" style="height:auto;">
                <div class="card-body">

                    <!-- table tag -->

                    <h4 class="mt-0 header-title mb-4">All Project Image Gallery</h4>


                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <form action="gallery-section" method="get" class="form-inline">
                                <div class="form-group mb-2">
                                    <input type="text" name="search_value" placeholder="Search Image Here..." class="form-control mr-2" style="width:40rem;">
                                </div>
                                <button type="submit" class="btn btn-lg btn-danger mb-2">Search</button>

                                <a href="gallery-section" class="btn btn-lg btn-success mb-2 m-l-15">Clear</a>
                                <a href="refresh_gallery" class="btn btn-lg btn-primary mb-2 m-l-15">Refresh Gallery</a>

                            </form>


                        </div>
                    </div> -->


                    <table class="table table-hover mt-4" id="all_img_gallery_datatable">
                        <!-- id="recipeslist" -->

                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Image Url</th>
                                <th scope="col">Copy Url</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($images_data)) {

                                foreach ($images_data as $image) {

                            ?>

                                    <tr>
                                        <td>
                                            <?php if (!empty($image)) {
                                                //   echo 'if';
                                                //   echo $single_category->c_img;
                                            ?>
                                                <img src="<?php echo base_url(); ?><?php echo $image; ?>" alt="" width="150px" height="auto">
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
                                            <?php echo base_url() . $image; ?>
                                        </td>

                                        <td>
                                            <button onclick="copy_image_path('<?php echo base_url() . $image; ?>')" class="btn">
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
                        // if (!empty($pager)) {
                        //   echo  $pager->links();
                        // //   echo $pager;
                        // }

                        // if (!empty($pager) && $total > 20) {
                        //     echo $pager;
                        // }
                        ?>

                    </div>

                    <!-- table tag -->

                </div>
            </div> -->
