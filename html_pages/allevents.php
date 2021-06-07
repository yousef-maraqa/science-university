<?php
 
  include('../entity/Events.php');
 

 
  $events = new Events();
 
 


  $eventsData = $events->fetchWithImg();
 
 



  ?>

<!DOCTYPE html>
<html lang="en">

 <?php include('../includes/header.php'); ?>

<body>
  <!-- header start -->
 <?php include('../includes/navbar.php'); ?>
  <!-- header end -->
  <!-- inner page fixed image start -->

  <section id="img-title" class="m-0">
    <picture>
      <img src="../theme/assets/group-8@2x.png" alt="SU Event" loading="lazy" />
    </picture>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#fff" fill-opacity="1"
        d="M0,256L80,256C160,256,320,256,480,240C640,224,800,192,960,192C1120,192,1280,224,1360,240L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
      </path>
    </svg>
    <div class="event-title">
      <h1 class="event-text">Sciences University Events</h1>
    </div>
  </section>
  <!-- inner page fixed image end -->
  <!-- breadcrumb start -->
  <nav aria-label="breadcrumb">
    <div class="container">
      <ol class="breadcrumb p-0">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Events</li>
      </ol>
    </div>
  </nav>
  <!-- breadcrumb end -->
  <!-- display all events section start -->
  <section class="moreEvents">
    <div class="container" id="events">
    
<?php for ($i = 0; $i < count($eventsData); $i++) {   ?>
  <?php

   $month = strtr($eventsData[$i]['date'], '/', '-');
   $day = strtr($eventsData[$i]['date'], '/', '-');



   ?>
  <div class="col-lg-6 col-xl-4 overflow-hidden my-3">
    <div class="card" id="card-left">
      <img class="card-img-top event-img" src="../theme/assets/<?php echo  $eventsData[$i]['img_url']; ?>" alt="people talk to each other" loading="lazy" />
      <div class="calender-img">
        <div class="date">
          <span class="day"> <?php echo date('d', strtotime($day)); ?></span>
          <span class="month text-capitalize"> <?php echo date('F', strtotime($month)); ?></span>
        </div>
      </div>

      <div class="card-body pb-0 d-flex flex-column align-items-end justify-content-between">
        <div class="container event-content pr-0">
          <div class="row">
            <div class="time-place d-flex align-items-center justify-content-start">
              <span class="time details"> <?php echo  $eventsData[$i]['start_time']; ?> - <?php echo  $eventsData[$i]['end_time']; ?></span>
              <span class="line mx-2"></span>
              <div class="place text-capitalize details">
                <?php echo  $eventsData[$i]['location']; ?>
              </div>
            </div>
            <div class="event-title text-capitalize content-title">
              <?php echo  $eventsData[$i]['title']; ?>
            </div>
            <div class="content-summary" title="  <?php echo  $eventsData[$i]['summary']; ?>">
              <?php echo  $eventsData[$i]['summary']; ?>
            </div>
          </div>
        </div>
        <div class="read-more">
          <a class="text-uppercase stretched-link" href="event.php?ID=<?php echo  $eventsData[$i]['event_id']; ?>" target="_blank">read more</a>
          <i class="fas fa-arrow-right"></i>
        </div>
      </div>
    </div>
  </div>

<?php  
 } ?>
  
          
    
        
      </div>

    </div>

  </section>
  <!-- display all events section start -->
  <!-- footer start -->
<?php include('../includes/footer.php'); ?>
  <!-- footer start -->

  <?php include('../includes/scripts.php') ?>
</body>

</html>