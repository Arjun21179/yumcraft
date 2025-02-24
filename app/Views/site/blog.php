<!-- ======================================================================================================================================== -->

<!-- ================================================================================================================================================== -->

<section class="arti_banner">
  <div class="container">
    <div class="banner_name">
      <!-- <a href=""><img src="assets/images/b1.jpg" alt="" /></a> -->
      <div class="sub_p">
        <!-- <p>32 Posts</p> -->

        <!-- <h3>Browsing category</h3> -->

        <h1>Blogs</h1>
      </div>
    </div>
  </div>
</section>

<section class="two_divide">
  <div class="container">
    <div class="main_details_divs">
      <?php $count = count($blog_pagination);
      if (!empty($blog_pagination) && $count >= 1) {   ?>
        <div class="details_one">
          <?php for ($j = 0; $j < $count; $j += 2) {
            echo '<div class="same_twodivs">';

            for ($k = $j; $k < $j + 2 && $k < $count; $k++) {
          ?>

              <div class="same">
                <a href="blog/<?= $blog_pagination[$k]['blog_url'] ?>">
                  <img src="<?= (!empty($blog_pagination[$k]['blog_img'])) ? 'uploads/blog_img/' . $blog_pagination[$k]['blog_img'] : 'uploads/noimage.jpg' ?>" alt="Blog Image" />
                </a>

                <div class="tag_text third_tag">
                  <!-- <a href="category.html" class="catagary_name">
                                        <i class="fa-solid fa-tag"></i> dessers
                                    </a> -->

                  <a href="blog/<?= $blog_pagination[$k]['blog_url'] ?>" class="short_desc">
                    <?= $blog_pagination[$k]['blog_name'] ?>
                  </a>

                  <h4>
                    <i><?= date('F j, Y', strtotime($blog_pagination[$k]['blog_publish_date'])) ?></i>
                    <!-- <i class="fa-regular fa-clock"></i>
                                        <i> 2 Min Read</i> -->
                  </h4>
                  <!-- <h3 class="last_sub_p">
                                        Welcome to a refreshing journey into the world of Ragi, a
                                        nutritious and versatile grain known for its numerous health
                                        benefits. In…
                                    </h3> -->
                </div>
              </div>
            <?php } ?>
            <?php echo '</div>'; ?>
          <?php } ?>


          <div class="pagination">
            <!-- <a href="#">&laquo;</a>
                    <a href="#">1</a>
                    <a class="active" href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">&raquo;</a> -->
            <?php
            echo  $pager->links();
            ?>

          </div>
        </div>
      <?php } ?>




      <div class="details_two">
       



        <?php
          if (!empty($popular_recipe_reighside)) {
          ?>
            <div class="author">
              <h3>POPULAR RECIPE</h3>
              <div class="author_details1">

              
                <?php
                $counter = 0;
                foreach ($popular_recipe_reighside as $index=>$val) {

                  if ($index < 2) {

                  if ($counter % 2 == 0) {
                    if ($counter > 0) {
                      echo '</div>'; // Close the previous row
                    }
                    echo '<div class="popular">'; // Open a new row
                  }
                ?>
                  <div class="posts">
                    <a href="recipe/<?= $val['re_titleurl']; ?>">
                      <!-- <img src="assets/images/popular1.jpg" alt="" /> -->
                      <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['re_images']; ?>" alt="">

                    </a>

                    <div class="tag_text third_tag">
                      <a href="recipe/<?= $val['re_titleurl']; ?>" class="short_desc">
                        <!-- Allergy-Friendly Vangi Kaap Recipe -->
                        <?php echo $val['re_title']; ?>
                      </a>

                      <h4>
                        <i>
                          <!-- February 1, 2004 -->
                          <?php
                          // echo $val['publish_data']; 
                          echo  date('F j, Y', strtotime($val['publish_data']));

                          ?>
                        </i>
                      </h4>
                    </div>
                  </div>
                <?php
                  $counter++;
                }
                }
                if ($counter % 2 != 0) {
                  echo '</div>'; // Close the last row if it wasn't closed
                }
                ?>
              </div>
            </div>
          <?php
          }
          ?>


        <div class="main_author_sec">
          <div class="author">
            <h3>FOLLOW US</h3>

            <div class="author_details2 ">
              <div class="social">
                <a href="" target="_blank" class="header_logos"><img src="assets/images/youtube.svg" alt=""></a>
                <a href="" target="_blank" class="header_logos"><img src="assets/images/facebook_black.svg" alt=""></a>
                <a href="" target="_blank" class="header_logos"><img src="assets/images/instagram_bg_black.svg" alt="" class="_head_instagram"></a>
                <a href="" target="_blank" class="header_logos"><img src="assets/images/pinterest_black.svg" alt=""></a>
              </div>

            </div>
          </div>
        </div>



        <div class="main_author_sec">
          <div class="author">
            <h3>SUBSCRIBE NEWSLETTER </h3>

            <div class="author_details2 ">
              <div class="newsletter_btn">
                <a href="subscriber-newsletter">
                  Subscribe Newsletter
                </a>
              </div>

            </div>
          </div>
        </div>



        <?php
        if (!empty($category_data)) {
        ?>
          <div class="author">
            <h3>CATEGORIES</h3>
            <div class="author_details2">


            <?php
                foreach ($category_data as $index=>$val) {

                  if($index < 4)
                  {

                ?>
                <div class="catagary">
                  <a href="recipe/<?php echo $val['c_url']; ?>">
                    <div>
                      <span> <i class="fa-solid fa-tag"></i>
                        <?php echo $val['c_name']; ?>
                      </span>

                    </div>
                  </a>
                </div>
              <?php
              }
            }
              ?>



              <div class="newsletter_btn">
                  <a href="recipe">
                  Explore More
                  </a>
                </div>


            </div>
          </div>
        <?php } ?>




        <div class="main_author_sec">
          <?php
          if (!empty($blog_two_data_rightside)) {
          ?>
            <div class="author">
              <h3>LATEST BLOGS</h3>
              <div class="author_details1">
                <?php
                $counter = 0;
                foreach ($blog_two_data_rightside as $val) {
                  if ($counter % 2 == 0) {
                    if ($counter > 0) {
                      echo '</div>'; // Close the previous row
                    }
                    echo '<div class="popular">'; // Open a new row
                  }
                ?>
                  <div class="posts">
                    <a href="blog/<?= $val['blog_url']; ?>">
                      <!-- <img src="assets/images/popular1.jpg" alt="" /> -->
                      <?php if ($val['blog_img']) { ?>
                        <img src="<?php echo base_url(); ?>uploads/blog_img/<?php echo $val['blog_img']; ?>" alt="">
                      <?php } else {
                      ?>
                        <img src="<?php echo base_url(); ?>uploads/noimage.jpg" alt="">
                      <?php
                      }
                      ?>
                    </a>
                    <div class="tag_text third_tag">
                      <a href="blog/<?= $val['blog_url']; ?>" class="short_desc">
                        <!-- Allergy-Friendly Vangi Kaap Recipe -->
                        <?php echo $val['blog_name']; ?>
                      </a>
                      <h4>
                        <i>
                          <!-- February 1, 2004 -->
                          <?php
                          // echo $val['publish_data']; 
                          echo date('F j, Y', strtotime($val['blog_publish_date']));
                          ?>
                        </i>
                      </h4>
                    </div>
                  </div>
                <?php
                  $counter++;
                }
                if ($counter % 2 != 0) {
                  echo '</div>'; // Close the last row if it wasn't closed
                }
                ?>
              </div>
            </div>
          <?php
          }
          ?>
        </div>




      </div>







    </div>
  </div>
</section>