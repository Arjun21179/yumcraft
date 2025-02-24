<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">
            <div class="card" style="height:auto">
                <div class="card-body">

                    <!-- table tag -->

                    <h1 class="mt-0 header-title mb-4">Add Blog</h1>

                    <!-- <h4 class="mt-0 header-title mb-4">Add Recipes</h4> -->
                    <div class="text-right">
                        <a href="blog-list">
                            <button class="btn badge-success">
                                Back
                            </button>
                        </a>
                    </div>

                    <form action="addblog_logic" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="name">Blog Name</label>
                                <input type="text" name="blog_name" class="form-control" placeholder="Enter the Blog Name" required>
                                </p>
                            </div>

                            <div class="col-lg-6">
                                <label for="name">Blog Url</label>
                                <input type="text" name="blog_url" id="blog_url" class="form-control" placeholder="Enter the Blog Url" required>
                                </p>
                            </div>
                        </div>

                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-6">
                                <label for="image">Image</label>
                                <span style="color:red; margin-left:10px;">Image Dimensions: 1000px (Width) × 554px (Height)</span>
                                <input type="file" name="imgInput" class="imgInput form-control" required>

                                <img src="<?php echo base_url(); ?>uploads/recipes_img/no-image.jpg" alt="" width="80" height="70" class="previewImg m-t-10 m-l-15" style="display:block;">
                            </div>

                            <div class="col-lg-6">
                                <label for="publish_date">Publish Date</label>
                                <input type="date" name="publish_date" class="form-control" required>
                            </div>

                        </div>


                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-12">
                                <label for="description">Description</label>
                                <textarea name="blog_description" class="rte"></textarea>
                            </div>
                        </div>

                

                        <div class="row m-t-20 m-b-20 m-r-15">
                            <div class="col-lg-12">
                                <div class="text-right">
                                    <button type="submit" id="addblog" class="btn btn-danger btn-lg">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

</div>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

<!-- end row -->
</div>