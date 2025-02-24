<!-- ======================================================================================================================================== -->

<!-- ================================================================================================================================================== -->

<section class="arti_banner">
  <div class="container">
    <div class="banner_name">
      <!-- <div class="sub_p">
  
        <h1>DESSERT</h1>
      </div> -->
    </div>
  </div>
</section>

<!-- ================================================================================================================================================== -->


<section class="two_divide">
  <div class="container">
    <div class="main_details_divs">




      <?php
      if (!empty($search_output)) {
        $count = count($search_output);
      }

      if (!empty($search_output) && $count >= 1) {

      ?>
        <div class="details_one">
          <?php for ($j = 0; $j < $count; $j += 2) {
            echo '<div class="same_twodivs">';

            for ($k = $j; $k < $j + 2 && $k < $count; $k++) {
          ?>

              <div class="same">
                <a href="recipe/<?= $search_output[$k]['re_titleurl'] ?>">
                  <?php
                  if (!empty($search_output[$k]['re_images'])) {
                  ?>
                    <img src="<?= base_url() ?>uploads/recipes_img/<?php echo $search_output[$k]['re_images']; ?>" alt="Recipe Image" />

                  <?php
                  } else {
                  ?>
                    <img src="<?= base_url() ?>uploads/noimage.jpg/" alt="">
                  <?php
                  }
                  ?>
                </a>

                <div class="tag_text third_tag">
                  <a href="recipe/<?= $search_output[$k]['re_titleurl'] ?>" class="catagary_name">
                    <i class="fa-solid fa-tag"></i>
                    <?php
                    echo  $search_output[$k]['c_name'];
                    ?>
                  </a>

                  <a href="recipe/<?= $search_output[$k]['re_titleurl'] ?>" class="short_desc">
                    <?= $search_output[$k]['re_title'] ?>
                  </a>

                  <h4>
                    <i>


                      <?php
                      // echo $recipes_data_categoryvise[$k]['publish_data'];
                      echo  date('F j, Y', strtotime($search_output[$k]['publish_data']));
                      ?>


                    </i>
                    <!-- <i class="fa-regular fa-clock"></i>
                                        <i> 2 Min Read</i> -->
                  </h4>

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
            if (!empty($pager)) {
              echo  $pager->links();
            }
            ?>

          </div>
        </div>
      <?php
       } else{
        // then not found the search recipes ui setup code
          echo '<div class="details_one">';
          echo '<div class="same_twodivs">';

          echo '</div>';
          echo '</div>';

       }
      
      ?>






      <div class="details_two">
     


        <?php
        if (!empty($popular_recipe_reighside)) {
        ?>
          <div class="author">
            <h3>POPULAR RECIPE</h3>
            <div class="author_details1">

              <?php
              $counter = 0;
              foreach ($popular_recipe_reighside as $index => $val) {


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
              foreach ($category_data as $index => $val) {

                if ($index < 4) {

              ?>
                  <div class="catagary">
                    <a href="recipe/<?php echo $val['c_url']; ?>">
                      <div>
                        <!-- <img src="assets/images/categ1.webp" alt="" /> -->
                        <span> <i class="fa-solid fa-tag"></i>
                          <!-- BAKING  -->
                          <?php echo $val['c_name']; ?>
                        </span>

                        <!-- <h4>19 Posts</h4> -->
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