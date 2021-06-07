<?php 
session_start();
require('../entity/NavLinks.php');
$footer=new NavLinks();
 
 $navbar=$footer->fetchCluster('NAVBAR');
 
 
?>

 
  <!-- header start -->
  <div class="container upper-nav overflow-hidden">
    <div class="inner-container d-flex justify-content-between align-items-center">
      <div class="search-box d-none d-md-none d-lg-block">
        <!-- Logo with a tag start -->
        <a href="index.php">
          <picture class="Logo">
            <source media="(min-width:650px)" srcset="../theme/assets/group-4@2x.png" />
            <source media="(min-width:465px)" srcset="../theme/assets/group-4.png" />
            <img src="../theme/assets/group-4@3x.png" alt="Sciences University Logo" width="139px" height="48px"
              style="width: auto" />
          </picture>
        </a>
        <!-- Logo with a tag end -->
      </div>
      <!-- social icons for phones start-->
      <div class="d-none d-md-none d-lg-block">
        <ul class="list-inline d-flex align-items-center social-links lg">
          <li class="list-inline-itme">
            <a  href=" <?php echo $socialLinks[2]['path']; ?>"
              class="fab fa-linkedin-in d-flex justify-content-center align-items-center social ">
              <span class="invisible"> #</span>
            </a>
          </li>
          <li class="list-inline-itme">
            <a href=" <?php echo $socialLinks[3]['path']; ?>"
              class="fab fa-youtube d-flex justify-content-center align-items-center social">
              <span class="invisible"> #</span>
            </a>
          </li>
          <li class="list-inline-itme">
            <a href=" <?php echo $socialLinks[1]['path']; ?>"
              class="fab fa-instagram d-flex justify-content-center align-items-center social">
              <span class="invisible"> #</span>

            </a>
          </li>
          <li class="list-inline-itme">
            <a href=" <?php echo $socialLinks[4]['path']; ?>"
              class="fab fa-twitter d-flex justify-content-center align-items-center social">
              <span class="invisible"> #</span>
            </a>
          </li>
          <li class="list-inline-itme mr-3">
            <a href=" <?php echo $socialLinks[0]['path']; ?>"
              class="fab fa-facebook-f d-flex justify-content-center align-items-center social">
              <span class="invisible"> #</span>

            </a>
          </li>
          <!-- social icons for phones end-->
          <!-- search box for desktop start -->
          <div class="search-box d-none d-md-none d-lg-block">
            <div class="search">
              <svg x="0px" y="0px" viewBox="0 0 24 24" width="20px" height="20px">
                <g stroke-linecap="square" stroke-linejoin="miter" stroke="currentColor">
                  <line fill="none" stroke-miterlimit="10" x1="22" y1="22" x2="16.4" y2="16.4" />
                  <circle fill="none" stroke="currentColor" stroke-miterlimit="10" cx="10" cy="10" r="9" />
                </g>
              </svg>

              <div>
                <input type="search" placeholder="Search for something..." />

              </div>
            </div>
          </div>
          <!-- search box for desktop end -->
        </ul>
      </div>
    </div>
  </div>
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
      <div class="container">
        <div class="d-md-block d-lg-none">
          <a class="navbar-brand ml-3" href="./index.php"><img src="../theme/assets/group-4.png"
              alt="Sciences University Logo" /></a>
        </div>
        <label for="search" class="visuallyhidden">collapse</label>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <!-- nav items start -->
          <ul class="navbar-nav nav-links d-flex justify-content-evenly">
          <?php for ($i=0; $i <count($navbar) ; $i++) {   ?>
            <li class="nav-item link-cont">
              <a class="nav-link text-uppercase link hover" href="<?php echo $navbar[$i]['path'] ?>" target="_blank" ><?php echo $navbar[$i]['title'] ?></a>
            </li>
            <?php }?>
             
            <li class="nav-item">
              <div class="search-box-mb d-md-block d-lg-none">
                <div class="input-group mt-4 mb-2">

                  <input type="text" class="form-control" placeholder="Search..." aria-describedby="searchbtn" />
                  <div class="input-group-append">
                    <label for="search" class="visuallyhidden">Search: </label>
                    <button class="btn btn-outline-secondary" type="button" id="searchbtn">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </li>
          </ul>
                    <!-- nav items end -->

            <div class="d-md-block d-lg-none">
              <!-- social icons for desktop header start-->
              <ul class="list-inline d-flex align-items-center social-links lg m-4">
                <li class="list-inline-itme">
                  <a href="<?php echo $socialLinks[2]['path']; ?>"
                    class="fab fa-linkedin-in d-flex justify-content-center align-items-center social">
                    <span class="invisible"> #</span>
                  </a>
                </li>
                <li class="list-inline-itme">
                  <a href="<?php echo $socialLinks[3]['path']; ?>"
                    class="fab fa-youtube d-flex justify-content-center align-items-center social">
                    <span class="invisible"> #</span>
                  </a>
                </li>
                <li class="list-inline-itme">
                  <a href="<?php echo $socialLinks[1]['path']; ?>"
                    class="fab fa-instagram d-flex justify-content-center align-items-center social">
                    <span class="invisible"> #</span>

                  </a>
                </li>
                <li class="list-inline-itme">
                  <a href="<?php echo $socialLinks[4]['path']; ?>"
                    class="fab fa-twitter d-flex justify-content-center align-items-center social">
                    <span class="invisible"> #</span>
                  </a>
                </li>
                <li class="list-inline-itme mr-3">
                  <a href="<?php echo $socialLinks[0]['path']; ?>"
                    class="fab fa-facebook-f d-flex justify-content-center align-items-center social">
                    <span class="invisible"> #</span>
                  </a>
                </li>
              </ul>
              <!-- social icons for desktop header end-->
            </div>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- header end -->