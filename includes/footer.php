<?php 
session_start();
 
$explore=$footer->fetchCluster('EXPLORE');

$findUs= $footer->fetchCluster('HOW_TO_FIND_US');
$quickLinks=$footer->fetchCluster('QUICK_LINKS');
 $usingSite= $footer->fetchCluster('USING_OUR_SITE');
 $socialLinks=$footer->fetchCluster('SOCIAL_LINKS');
 
?>

<footer class="text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <div class="accordion d-lg-flex w-100" id="accordion">
          <!--Grid column-->

          <div class="col-lg-3 col-md-6 footer-outer-col col-sm-12 d-flex justify-content-center p-0">
            <div class="footer-col w-100">
              <a href="#EXPLORE" data-toggle="collapse"
                class="text-uppercase h5 nav-link p-0 d-block d-lg-none d-xl-none stretched-link toggle w-100">EXPLORE</a>
              <h5 class="d-none d-lg-block d-xl-block"> EXPLORE</h5>

              <ul class="list-unstyled collapse d-lg-flex flex-column" id="EXPLORE" data-parent="#accordion">
              <?php for ($i=0; $i <count($explore) ; $i++) { 
             ?>
                <li>
                  <a href="<?php echo $explore[$i]['path']; ?>" class=" "><?php echo $explore[$i]['title'] ?></a>
                </li>
           <?php }?>
              </ul>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 footer-outer-col col-sm-12 d-flex justify-content-center">
            <div class="footer-col w-100">
              <div class="linke mb-3 w-100">
                <a href="#LINKS" data-toggle="collapse"
                  class="text-uppercase h5 nav-link p-0 d-block d-lg-none d-xl-none toggle ">QUICK LINKS</a>
                <h5 class="d-none d-lg-block d-xl-block">QUICK LINKS</h5>
                <ul class="list-unstyled collapse d-lg-flex flex-column" id="LINKS" data-parent="#accordion">
                <?php for ($i=0; $i <count($quickLinks) ; $i++) { 
             ?>
                  <li>
                    <a href="<?php echo $quickLinks[$i]['path'] ?>" class=" "><?php echo $quickLinks[$i]['title'] ?></a>
                  </li>

                  <?php } ?>
                
                </ul>
              </div>
              <div class="our-site w-100">
                <a href="#ourSite" data-toggle="collapse"
                  class="text-uppercase h5 nav-link p-0 d-block d-lg-none d-xl-none mt-5 toggle  ">USING OUR SITE</a>
                <h5 class="d-none d-lg-block d-xl-block mt-3">
                  USING OUR SITE
                </h5>
                <ul id="ourSite" class="list-unstyled collapse d-lg-flex flex-column" data-parent="#accordion">
                  <?php for ($i=0; $i <count($usingSite) ; $i++) { 
             ?>
                  <li>
                    <a href="<?php echo $usingSite[$i]['path'] ?>" class=" "><?php echo $usingSite[$i]['title'] ?></a>
                  </li>
                  <?php  }?>
               
                </ul>
              </div>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 footer-outer-col col-md-6 col-sm-12 d-flex justify-content-center">
            <div class="footer-col how-to w-100">
              <a href="#findUS" data-toggle="collapse"
                class="text-uppercase h5 nav-link p-0 d-block d-lg-none d-xl-none toggle w-100">HOW TO FIND US</a>
              <h5 class="d-none d-lg-block d-xl-block">HOW TO FIND US</h5>

              <ul id="findUS" class="list-unstyled how-to collapse d-lg-flex flex-column" data-parent="#accordion">
              <?php for ($i=0; $i <count($findUs) ; $i++) { 
             ?>
                <li class="d-flex align-items-center">
              
                  <a href="<?php echo $explore[$i]['path'] ?>" class=" "><?php echo $findUs[$i]['title'] ?></a>
                </li>
                <?php }?>
                
                </li>
              </ul>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 footer-outer-col col-md-6 col-sm-12 d-flex justify-content-center">
            <div class="footer-col d-flex align-items-center">
              <picture>
                <source media="(min-width:650px)" srcset="../theme/assets/group-19@2x.png" />
                <source media="(min-width:465px)" srcset="../theme/assets/group-19.png" />
                <img src="../theme/assets/group-19@3x.png" alt="SciencesUniversity Logo" loading="lazy" class="Logo" />
              </picture>
              <div class="follow-us">
                <h5 class="text-uppercase text-center ">follow us</h5>
                <div class="social-links d-flex align-items-center">
                  <a href="<?php echo $socialLinks[2]['path']; ?>"
                    class="fab fa-linkedin-in d-flex justify-content-center align-items-center social-footer">

                    <span class="invisible"> #</span>
                  </a>
                  <a href="<?php echo $socialLinks[3]['path']; ?>"
                    class="fab fa-youtube d-flex justify-content-center align-items-center social-footer">
                    <span class="invisible"> #</span>
                  </a>
                  <a href="<?php echo $socialLinks[1]['path']; ?>"
                    class="fab fa-instagram d-flex justify-content-center align-items-center social-footer ">
                    <span class="invisible"> #</span>
                  </a>
                  <a href="<?php echo $socialLinks[4]['path']; ?>"
                    class="fab fa-twitter d-flex justify-content-center align-items-center social-footer  ">
                    <span class="invisible"> #</span>
                  </a>
                  <a href="<?php echo $socialLinks[0]['path']; ?>" 
                    class="fab fa-facebook-f d-flex justify-content-center align-items-center social-footer">
                    <span class="invisible"> #</span>

                  </a>
                </div>
              </div>
            </div>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->
    </div>
    <!-- Copyright -->
    <?php
// PHP program to demonstrate the use of current 
// date since Unix Epoch 
  
// variable to store the current time in seconds 
$currentTimeinSeconds = time(); 
  
// converts the time in seconds to current date 
$currentDate = date('Y', $currentTimeinSeconds);
  
// prints the current date

?>
    <div class="text-center copyright p-2">
      © <?php echo ($currentDate);  ?> Sciences University. All Rights Reserved.

    </div>
    <!-- Copyright -->
  </footer>