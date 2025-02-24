<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">
            <div class="card" style="height:auto">
                <div class="card-body">

                    <!-- table tag -->

                    <h1 class="mt-0 header-title mb-4">Edit Blog</h1>

                    <!-- <h4 class="mt-0 header-title mb-4">Add Recipes</h4> -->
                    <div class="text-right">
                        <a href="blog-list">
                            <button class="btn badge-success">
                                Back
                            </button>
                        </a>
                    </div>

                    <form action="editblog_logic" method="post" enctype="multipart/form-data">


                        <div class="row">
                            <div class="col-lg-6">
                                <label for="name">Blog Name</label>
                                <input type="text" name="blog_name" class="form-control" value="<?= $single_blog ? $single_blog->blog_name : "" ?>" placeholder="Enter the Blog Name">
                                </p>
                            </div>

                            <div class="col-lg-6">
                                <label for="name">Blog Url</label>
                                <input type="text" name="blog_url" id="blog_url" class="form-control" value="<?= $single_blog ? $single_blog->blog_url : "" ?>" placeholder="Enter the Blog Url">
                                </p>
                            </div>
                        </div>



                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-6">
                                <label for="image">Image</label>
                                <input type="file" name="imgInput" class="imgInput form-control">
                                                               
                                <?php if (!empty($single_blog->blog_img)) {
                                ?>
                                    <img src="<?php echo base_url(); ?>uploads/blog_img/<?= $single_blog ? $single_blog->blog_img : "" ?>" alt="<?php echo base_url(); ?>uploads/blog_img/<?= $single_blog ? $single_blog->blog_img : "" ?>" width="80" height="70" class="previewImg m-t-10 m-l-15">
                                <?php
                                } else {
                                ?>
                                    <img src="<?php echo base_url(); ?>uploads/recipes_img/no-image.jpg" alt="" width="80" height="70" class="previewImg m-t-10 m-l-15">
                                <?php
                                }
                                ?>
                            </div>


                            <div class="col-lg-6">
                                <label for="publish_date">Publish Date</label>
                                <input type="date" name="publish_date" class="form-control" value="<?= $single_blog ? $single_blog->blog_publish_date : "" ?>">
                            </div>



                        </div>


                        <!-- <div class="row" style="margin-top:40px;">
                            <div class="col-lg-12">
                                <label for="description">Description</label>
                                <textarea name="articlearticle_description" class="summernote" id="article_description" required></textarea>
                            </div>
                        </div> -->

                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-12">
                                <label for="description">Description</label>
                                <textarea name="blog_description" class="rte"><?= $single_blog ? $single_blog->blog_description : "" ?></textarea>
                            </div>
                        </div>







                        <div class="row m-t-20 m-b-20 m-r-15">
                            <div class="col-lg-12">
                                <div class="text-right">
                                    <input type="hidden" name="blog_id" value="<?php echo $single_blog->blog_id; ?>">
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