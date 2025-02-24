






<!-- ==================================================================================================================================================== -->
<footer id="site-footer" class="footer">
  <div class="container">
    <div class="row info" itemscope itemtype="http://schema.org/Organization">

      <div class="col-lg-5">
        <div class="crumina-heading widget-heading">
          <h4 class="heading-title" itemprop="name">
            <!-- yumcraft -->
            Our Mission
          </h4>


          <div class="heading-text" itemprop="description">
            <p class="atthe">
              <!-- As a result, we embarked on a mission to find and create
              recipes that not only met our son’s dietary needs but also
              satisfied our own tastes and preferences. -->
              To empower parents and caregivers by providing creative, safe, and delicious recipes tailored for children with food allergies.
              We aim to transform dietary restrictions into culinary opportunities, fostering a community of support and inspiration for families
              navigating food allergies.
            </p>

            <div class="footersocialmedia_icon">
              <!-- <div class="hover_effect"> -->
              <a href="" target="_blank"><img src="assets/images/facebook_white.svg" alt="" class="black" />
                <img src="assets/images/facebook_green.svg" alt="" class="green" /></a>
              <!-- </div> -->
              <div class="hover_effect">
                <a href="" target="_blank"><img src="assets/images/insta_white.svg" alt="" class="black" />
                  <img src="assets/images/insta_green.svg" alt="" class="green" /></a>
              </div>

              <div class="hover_effect">
                <a href="" target="_blank"><img src="assets/images/youtube_white.svg" alt="" class="black" /><img src="assets/images/youtube_green.svg" alt="" class="green" /></a>
              </div>
              <div class="hover_effect">
                <a href="" target="_blank"><img src="assets/images/pinterest_white.svg" alt="" class="black" /><img src="assets/images/pinterest_green.svg" alt="" class="green" /></a>
              </div>

              <!-- <div class="hover_effect">
                    <a href="" target="_blank"
                      ><img
                        src="assets/images/twitter_white.svg"
                        alt=""
                        class="black" /><img
                        src="assets/images/twitter_green.svg"
                        alt=""
                        class="green"
                    /></a>
                  </div>

                  <div class="hover_effect">
                    <a href="" target="_blank"
                      ><img
                        src="assets/images/linkedin_white.svg"
                        alt=""
                        class="black" /><img
                        src="assets/images/linkedin_green.svg"
                        alt=""
                        class="green"
                    /></a>
                  </div> -->
            </div>
          </div>
        </div>
      </div>



      <?php if (!empty($set_category_onmenu)) { ?>
        <div class="col-lg-4">
          <h4 class="heading-title"> Recipes</h4>
          <div class="menus-wrap ovh">


            <ul id="menu-footer-menu-1" class="list--traingle half-width">
              <?php foreach ($set_category_onmenu as $index => $val) {

                // Skip the "Uncategorized" category
                if ('Uncategorized' == $val['c_name']) {
                  continue;
                }

                if ($index < 7) {
              ?>
                  <li>
                    <a href="recipe/<?php echo $val['c_url']; ?>"><i class="fa fa-caret-right" aria-hidden="true"></i>
                      <?php echo $val['c_name']; ?>
                    </a>
                  </li>
              <?php }
              } ?>
            </ul>





          </div>
        </div>
      <?php } ?>








      <div class="col-lg-2">
        <h4 class="heading-title">Quick links</h4>
        <div class="menus-wrap ovh">
          <ul id="menu-footer-menu-1" class="list--traingle half-width">
           
            <li>
              <a href="blog"><i class="fa fa-caret-right" aria-hidden="true"></i>Blog</a>
            </li>
          
            <li>
              <a href="contact"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact us</a>
            </li>

          </ul>

        </div>
      </div>

    </div>
  </div>


</footer>

<!--  back to top -->

<a href="#" class="top" id="back-to-top" role="button"><i class="fa-solid fa-chevron-up"></i></a>















<!-- ==================================================================================================================================================== -->



<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->


<!-- slick links -->
<!-- <script src="assets/js/jquery.min.js"></script> -->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/custom.js"></script>





<!-- backend required links -->
<!-- jquery cdn  -->
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

<!-- jquery validation links own ad -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<!-- sweet alert link -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<!-- frontend dynamic js -->
<script src="assets/js/dynamic.js"></script>



<!-- landing page dynamic js -->
<script src="assets/js(landing_page)/dynamic.js"></script>




















</body>

</html>