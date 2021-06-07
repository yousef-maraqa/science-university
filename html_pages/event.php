<?php 
  session_start();


  require '../entity/Events.php';


  $event = new Events;

  


$eventID =$_GET['ID'] ;

$row=$event->getElementById($eventID );

 
$eventsData= $event ->fetchWithImg();
 
$month = strtr( $row[0]['date'], '/', '-');
$day = strtr( $row[0]['date'], '/', '-');
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
      <h1 class="event-text"><?php echo $row[0]['title'];  ?></h1>
    </div>
  </section>
  <!--  inner page fixed image end-->
  <!-- breadcrumb start -->
  <nav aria-label="breadcrumb">
    <div class="container">
      <ol class="breadcrumb p-0">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="allevents.php">Events</a></li>

        <li class="breadcrumb-item active" aria-current="page">
        <?php echo $row[0]['title'];  ?>
        </li>
      </ol>
    </div>
  </nav>
  <!-- breadcrumb end  -->
  <!-- event details start -->
  <div class="event-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <img src="../theme/assets/alumnievents.jpg" alt="event" loading="lazy" />
        </div>
        <div class="col-md-4">
          <div class="event-details my-3">
            <div class="container">
              <div class="row">
                <div class="col-12 d-flex align-items-center p-0 mb-2">
                  <i class="fas fa-calendar-alt mr-2"></i>
                  <span><?php  echo date('F j',strtotime($day)) ;?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-12 d-flex align-items-center p-0 mb-2">
                  <i class="fas fa-clock mr-2"></i>
                  <span> <?php echo  $row[0]['start_time'];?> - <?php echo  $row[0]['end_time']; ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-12 d-flex align-items-center p-0 mb-2">
                  <i class="far fa-building mr-2"></i>
                  <span><?php echo $row[0]['location'];  ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <p class="mt-5 row col-12">
      <?php echo $row[0]['body'];  ?>
      </p>
   
    </div>
  </div>
  <!-- event details end -->
  <!-- more events  start -->
  <section id="events">
    <div class="title-wrapper text-uppercase text-center">
      <span class="title-m"> events </span>
    </div>
    <div class="container">
      <div class="row">
      <?php  for ($i=0; $i <count($eventsData) ; $i++) {  
      
        ?>

        <div class="col-lg-6 col-xl-4 overflow-hidden my-3">
          <div class="card" id="card-left">
            <img class="card-img-top event-img" src="../theme/assets/<?php echo  $eventsData[$i]['img_url']; ?>"
              alt="people talk to each other" loading="lazy" />
            <div class="calender-img">
              <div class="date">
                <span class="day"> <?php  echo date('d',strtotime($day)) ;?></span>
                <span class="month text-capitalize"> <?php  echo date('F',strtotime($month)) ;?></span>
              </div>
            </div>

            <div class="card-body pb-0 d-flex flex-column align-items-end justify-content-between">
              <div class="container event-content pr-0">
                <div class="row">
                  <div class="time-place d-flex align-items-center justify-content-start">
                    <span class="time details"> <?php echo  $eventsData[$i]['start_time'];?> - <?php echo  $eventsData[$i]['end_time']; ?></span>
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
                <a class="text-uppercase stretched-link"  href="event.php?ID=<?php echo  $eventsData[$i]['event_id']; ?>" target="_blank">read more</a>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </div>
        </div>

        <?php if ($i==2) {
          break;
        }  }?>
        
      </div>
    </div>
  </section>
  <?php include('../includes/footer.php'); ?>
  <!-- more events  end -->
  <script src="../../theme/admin_themes/js/jquery.min.js"></script>
	<script src="../../theme/admin_themes/js/popper.js"></script>
	<script src="../../theme/admin_themes/js/bootstrap.min.js"></script>
	<script src="../../theme/admin_themes/js/main.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
     
</body>

</html>