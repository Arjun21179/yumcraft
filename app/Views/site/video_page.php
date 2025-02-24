<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <!-- ================================================================================================================================================== -->
  <!-- 
  <section class="recipe_banner">
    <div class="banner_name">
      <div class="container">

        <div class="sub_p">

          <h1>
          Videos Section
          </h1>
        </div>
      </div>
    </div>
  </section> -->

  <!-- ================================================================================================================================================== -->

  <section class="two_divide">

    <div class="recipe_shortdescr more">
      <h1>Videos</h1>
    </div>



    <div class="container">


      <div class="main_details_divs">


        <div class="details_one for_sidebar">



          <?php if (!empty($all_video_section)) { ?>
            <div class="all_recipes recipes_videos">

              <?php
              foreach ($all_video_section as $video_val) {
                ?>
                <div class="recipes_div">
                  <iframe height="300" src="<?php echo $video_val['video_link']; ?>" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
              <?php } ?>

              <!-- <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/s7EWq87hT1w?si=QADxknFtZKXeKoOx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/nJwtU8IhnFA?si=k-EwEsQfYsRtycuo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/cT0jCZbdJtU?si=gXE0KaNwvk1pmKBo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/Y4JAWGnTsYY?si=o4rFkfLwWTU5PRM6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/i0mDlSXCjpQ?si=DD2WM-oaiYUFitoV" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/X9pB0IPHA1c?si=BHoFjXzWnW_IrjqO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/I5EP8JnE_Zw?si=bw1GdHVYsqrtuakw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/AZPNhgUS9_c?si=K8GwS19QC-LX6506" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/4B19GTbM46U?si=58O3sLnkay2Sjew9" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/odaxKu7HAVU?si=CKrLg6z2ej0Q57qH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/fPpDBInUfJ8?si=f8MpO_bVuD8QZMT7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/usJi9fFQXpQ?si=96w_ANDlHy9Na6UH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/H83zYDlmUOk?si=x4VeFkq9pGLCPOBG" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/kUOxrr0AzUY?si=jHutJ0OUp4qLbzIy" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/Bof1gWL1tFE?si=owHM0fBGlmXmaCxS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/bSNL9gze3Jo?si=QWugVmzJSCPev3l7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/t5ikRZ77Pxo?si=--xvBJ4IfCEd88Ah" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/HamKhZKY11c?si=QbUnqdEnDx-4Pymt" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="recipes_div">
              <iframe height="300" src="https://www.youtube.com/embed/-6lhKYr_StU?si=QWLqdY-TLxQmyDki" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div> -->


            </div>
          <?php } ?>





          <div class="pagination">
            <?php
            if (!empty($pager)) {
              echo $pager->links();
              // echo $pager;
            }

            // if (!empty($pager) && $total > 20) {
            //   echo $pager;
            // }
            ?>
          </div>





        </div>







          <?php
          if (!empty($popular_recipe_reighside_category_and_allergen_category)) {
            ?>
            <div class="author">
              <h3>POPULAR RECIPE</h3>
              <div class="author_details1">

                <?php
                $counter = 0;
                foreach ($popular_recipe_reighside_category_and_allergen_category as $val) {
                  if ($counter % 2 == 0) {
                    if ($counter > 0) {
                      echo '</div>'; // Close the previous row
                    }
                    echo '<div class="popular">'; // Open a new row
                  }
                  ?>
                  <div class="posts">
                    <a href="<?= $val['re_titleurl']; ?>">
                      <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['re_images']; ?>" alt="">

                    </a>

                    <div class="tag_text third_tag">
                      <a href="<?= $val['re_titleurl']; ?>" class="short_desc">
                        <?php echo $val['re_title']; ?>
                      </a>

                      <h4>
                        <i>
                          <?php
                          // echo $val['publish_data']; 
                          echo date('F j, Y', strtotime($val['publish_data']));

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
          if (!empty($category_data_allergencategory_list)) {
            ?>
            <div class="author">
              <h3>CATEGORIES</h3>
              <div class="author_details2">


                <?php
                foreach ($category_data_allergencategory_list as $val) {
                  ?>
                  <div class="catagary">
                    <a href="<?php echo $val['c_url']; ?>">
                      <div>
                        <span> <i class="fa-solid fa-tag"></i>
                          <?php echo $val['c_name']; ?>
                        </span>

                      </div>
                    </a>
                  </div>
                <?php
                }
                ?>



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
                      <a href="<?= $val['blog_url']; ?>">
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
                        <a href="<?= $val['blog_url']; ?>" class="short_desc">
                          <?php echo $val['blog_name']; ?>
                        </a>
                        <h4>
                          <i>
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


        </div> -->
      </div>
    </div>
  </section>
</body>

</html>