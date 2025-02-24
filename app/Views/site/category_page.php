
<!-- ======================================================================================================================================== -->

<!-- ================================================================================================================================================== -->

<section class="arti_banner">
  <div class="container">
    <div class="banner_name">
      <!-- <a href=""><img src="assets/images/b1.jpg" alt="" /></a> -->
      <div class="sub_p">
        <!-- <p>32 Posts</p> -->

        <!-- <h3>Browsing category</h3> -->

        <h1>
          <!-- DESSERT -->
          <?php
          if (!empty($also_categories_data)) {
            echo $also_categories_data->c_name;
          }
          ?>
        </h1>
      </div>
    </div>
  </div>
</section>

<!-- ================================================================================================================================================== -->

<section class="two_divide">
  <div class="container">
    <div class="main_details_divs">



      <?php
      if (!empty($recipes_data_categoryvise)) {
        $count = count($recipes_data_categoryvise);
      }


      ?>
      <div class="details_one">
        <?php
        if (!empty($recipes_data_categoryvise) && $count >= 1) {


          for ($j = 0; $j < $count; $j += 2) {
            echo '<div class="same_twodivs">';

            for ($k = $j; $k < $j + 2 && $k < $count; $k++) {
        ?>

              <div class="same">
                <a href="recipe/<?= $recipes_data_categoryvise[$k]['re_titleurl'] ?>">
                  <?php
                  if (!empty($recipes_data_categoryvise[$k]['re_images'])) {
                  ?>
                    <img src="<?= base_url() ?>uploads/recipes_img/<?php echo $recipes_data_categoryvise[$k]['re_images']; ?>" alt="<?php echo !empty($recipes_data_categoryvise[$k]['img_alt']) ? $recipes_data_categoryvise[$k]['img_alt'] : ''; ?>" />

                  <?php
                  } else {
                  ?>
                    <img src="<?= base_url() ?>uploads/noimage.jpg/" alt="">
                  <?php
                  }
                  ?>
                </a>




                <div class="tag_text third_tag">


                  <!-- mutliple category show -->
                  <?php

                  $rel_category = 0;
                  $category_name = '';

                  if (!empty($all_relationtable_data)) {
                    foreach ($all_relationtable_data as $relation_tabledata) {
                      if ($relation_tabledata['recipe_id'] == $recipes_data_categoryvise[$k]['re_id']) {
                        $relation_catgory_id = $relation_tabledata['category_id'];
                        break;
                      }
                    } ?>
                    <div class="row">

                      <?php
                      $i = 1;


                      // get all data in array format
                      $all_relation_cat_id = explode(',', $relation_catgory_id);

                     
                      foreach ($all_relation_cat_id as $rel_cat_id) {
                        if ($i == 4) {
                          break; // Break out of the inner loop
                        }
                        foreach ($category_data_tag as $category_alldata) {

                          if ($rel_cat_id == $category_alldata['c_id']) {
                            $i++;


                      ?>
                            <a href="recipe/<?= $category_alldata['c_url']; ?>" class="catagary_name">
                              <i class="fa-solid fa-tag"></i>
                              <?= $category_alldata['c_name']; ?>
                            </a><br>

                      <?php
                          }
                        }
                      }

                      ?>
                    </div>

                  <?php
                  }
                  ?>






                  <a href="recipe/<?= $recipes_data_categoryvise[$k]['re_titleurl'] ?>" class="short_desc">
                    <?= $recipes_data_categoryvise[$k]['re_title'] ?>
                  </a>

                  <h4>
                    <i>


                      <?php
                      // echo $recipes_data_categoryvise[$k]['publish_data'];
                      echo  date('F j, Y', strtotime($recipes_data_categoryvise[$k]['publish_data']));
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
            <?php
            // if (!empty($pager)) {
            //   // echo  $pager->links();
            //   echo $pager;
            // }
           
            if (!empty($pager) && $total > 20) {
                echo $pager;
            }
            ?>
          </div>




        <?php } ?>

      </div>







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
                      <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['re_images']; ?>" alt="<?php echo !empty($val['img_alt']) ? $val['img_alt'] :''; ?>">
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
                          <img src="<?php echo base_url(); ?>uploads/blog_img/<?php echo $val['blog_img']; ?>" alt="<?php echo !empty($val['blog_img_alt']) ? $val['blog_img_alt'] :''; ?>">
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