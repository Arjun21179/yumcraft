<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>




</head>

<body> -->
  <!-- ================================================================================================================================================== -->
  <!-- 
<section class="recipe_banner">
    <div class="banner_name">
  <div class="container">

      <div class="sub_p">
     
        <h1>
          Recipe Category
        </h1>
      </div>
    </div>
  </div>
</section> -->

  <!-- ================================================================================================================================================== -->

  <section class="two_divide">

    <div class="recipe_shortdescr  more">

      <h1>Gallery</h1>

    </div>



    <div class="container">


      <div class="main_details_divs">



      <?php if (!empty($all_gallery_recipe_img)) { ?>
    <div class="details_one for_sidebar">
        <div class="all_recipes recipes_videos">
            <?php foreach ($all_gallery_recipe_img as $index => $val) { ?>
                <div class="recipes_div">
                    <img src="<?php echo base_url(); ?>uploads/gallery_dynamic/<?= $val['image'] ?>" 
                         onclick="openImgModal(<?= $index ?>)" 
                         class="hover-shadow cursor" alt="">
                    <h2 class="gallery_names">
                      <?php
                      echo $val['title'];
                      ?>
                    </h2>
                </div>
            <?php } ?>
        </div>

        <!-- image modal section -->
        <div id="imgModal" class="img_modal">
            <span class="imgclose cursor" onclick="closeImgModal()">&times;</span>
            <div class="imgmodal-content">
                <div class="mySlides">
                    <img id="modalImg" src="" style="width:100%">
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>

        <div class="pagination">
            <?php if (!empty($pager)) { echo $pager->links(); } ?>
        </div>
    </div>
<?php } ?>









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







<!-- xxxxxx  Click On Image Show the Image Code   xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
  <script>
    let images = [];
    let slideIndex = 1;

    // Collect all image URLs
    document.addEventListener('DOMContentLoaded', function () {
        const imgElements = document.querySelectorAll('.recipes_div img');
        imgElements.forEach(img => {
            images.push(img.src);
        });
    });

    function openImgModal(index) {
        slideIndex = index + 1; // Set slideIndex to the clicked image
        showSlide(slideIndex);
        document.getElementById('imgModal').style.display = 'block';
    }

    function closeImgModal() {
        document.getElementById('imgModal').style.display = 'none';
    }

    function showSlide(n) {
        const slides = document.querySelectorAll('.mySlides img');
        if (n > images.length) slideIndex = 1;
        if (n < 1) slideIndex = images.length;

        // Set image src in modal
        document.getElementById('modalImg').src = images[slideIndex - 1];
    }

    function plusSlides(n) {
        showSlide(slideIndex += n);
    }
</script>
<!-- 

</body>

</html> -->