 <?php
  include('../entity/News.php');
  include('../entity/Events.php');
  include('../entity/Slider.php');
  include('../entity/ContactUs.php');
  $news = new News();
  $events = new Events();
  $slider = new Slider();
  $newsData = $news->fetchWithImgActive();

  $eventsData = $events->fetchWithImg();


  $sliderData = $slider->fetchAll();

  $contactUs = new ContactUs();
  if (isset($_POST['submit'])) {
    $msg = '';
    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $body = $_POST['body'];

    try {
      $contactUs->insert($fullName, $phoneNumber, $email, $body);
      $msg = 'your message arrived';
      header('location:../html_pages/index.php?mesage=' . $msg);
      die();
    } catch (\Throwable $th) {
      echo $th;
    }
  }

  ?>

 <!DOCTYPE html>
 <html lang="en">
 <?php include('../includes/header.php'); ?>



 <body>
   <?php if (isset($_GET['query'])) {
      echo '<div class="alert alert-success">thanks for contacting us</div>';
    } ?>
   <?php include('../includes/navbar.php') ?>



   <!-- carousel start -->
   <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000000">
     <!-- Indicators -->
     <ul class="carousel-indicators">

       <li data-target="#carousel" data-slide-to="0" class="active"></li>
       <?php $count = 1 ?>
       <?php foreach ($sliderData as $slider) : ?>
         <?php if ($count == count($sliderData)) break; ?>
         <li data-target="#carousel" data-slide-to="<?= $count++ ?>"></li>
       <?php endforeach; ?>
     </ul>

     <!-- The slideshow -->
     <div class="carousel-inner">


       <?php $counter = 1;
        for ($i = 0; $i < count($sliderData); $i++) {  ?>
         <div class="carousel-item <?php if ($counter <= 1) {
                                      echo " active";
                                    } ?>">
           <img src="../theme/assets/<?php echo $sliderData[$i]['img_url'] ?>" class="" width="100%" height="100%" alt="slider 1 people take a seat in the university square">
           <div class="wrapper container">
             <div class="overlay ">
               <h1 class="text-uppercase text-center">
                 <?php echo  $sliderData[$i]['slider_text'] ?>
               </h1>
             </div>
           </div>
           </img>

         </div>
       <?php $counter++;
        } ?>

     </div>

   </div>
   <!-- carousel end -->

   <!-- news section start -->
   <!-- news section start -->
   <section id="news" class="">
     <div class="container">
       <div class="row">
         <div class="col-lg-6 d-flex" id="news-img">
           <div class="col-md-6 col-xs-6 mb-xs-4 pl-0">
             <div class="news-block-img">
               <a href="#" target="_blank">
                 <img src="../theme/assets/c-s-howdoi@3x.jpg" alt="news undergraduate courses" loading="lazy" />
                 <div class="text-uppercase" title="undergraduate courses">people studing</div>
               </a>
             </div>
             <div class="news-block-img">
               <a href="#" target="_blank">
                 <img src="../theme/assets/i-stock-000014379570-large@3x.jpg" alt="NEWS GRADUATE COURSES" loading="lazy" />
                 <div class="text-uppercase" title="GRADUATE COURSES">GRADUATE </div>
               </a>
             </div>
           </div>
           <div class="col-md-6 col-xs-6 pr-0">
             <div class="news-block-img">
               <a href="#" target="_blank">
                 <img src="../theme/assets/student-applying-for-federal-student-aid-f-a-f-s-a@3x.jpg" alt="NEWS INTERNATIONAL STUDENTS" loading="lazy" />
                 <div class="text-uppercase" title="INTERNATIONAL STUDENTS">INTERNATIONAL STUDENTS</div>
               </a>
             </div>
             <div class="news-block-img">
               <a href="#" target="_blank">
                 <img src="../theme/assets/student-photo@3x.jpg" alt="NEWS SCHOLARSHIPS" loading="lazy" />
                 <div class="text-uppercase" title="SCHOLARSHIPS">SCHOLARSHIPS</div>
               </a>
             </div>
           </div>
         </div>

         <div class="col-lg-6 col-xl-6 blogs" id="news-blogs">
           <div class="container">
             <div class="row blog-block">
               <div class="news-blogs">
                 <div class="title-wrapper text-uppercase">
                   <span class="title-m"> news</span>
                 </div>
                 <?php for ($i = 0; $i < count($newsData); $i++) { ?>
                   <div class="col-md-12 pl-0 pr-0 news-border">
                     <div class="news-block">
                       <div class="read-more text-left">
                         <a href="news.php?ID=<?php echo  $newsData[$i]['news_id']; ?>">


                           <div class="details"><?php echo  $newsData[$i]['created_at'] ?></div>

                           <h3 class="h1 text-capitalize content-title">
                             <?php echo $newsData[$i]['title'] ?>
                           </h3>

                           <p class="content-summary" title="">
                             <?php echo $newsData[$i]['summary'] ?>
                           </p>


                           <a class="text-uppercase d-block text-right " href="news.php?ID=<?php echo  $newsData[$i]['news_id']; ?>"> read more <i class="fas fa-arrow-right"></i></a>



                         </a>
                       </div>

                     </div>
                   <?php if ($i == 2) {
                      break;
                    }
                  } ?>

                   </div>
               </div>
             </div>
           </div>
         </div>
       </div>
   </section>

   <!-- statics start -->
   <section id="statics">
     <div class="container">
       <div class="row">
         <div class="col-lg-4 col-md-12
           col-sm-12 overflow-hidden">
           <div class="info-block" id="info-block-1">
             <img src="../theme/assets/group-11.svg" alt="Profession-ready degree programs #90" loading="lazy" />
             <div class="number d-flex align-items-center">
               <div class="number odometer" id="degree">0</div>
               <span>+</span>
             </div>

             <h3 class="h1 info-title" title="Profession-ready degree programs 90#">Profession-ready degree programs</h3>
           </div>
         </div>
         <div class="col-lg-4 col-md-12
           col-sm-12 overflow-hidden">
           <div class="info-block" id="info-block-2">
             <img src="../theme/assets/group-12.svg" alt="Our MBA for salary-to-debt ratio #1" loading="lazy" />
             <div class="number d-flex align-items-center">
               <span>#</span>
               <div class="number odometer" id="MBA">9</div>
             </div>
             <h3 class="h1 info-title" title="Our MBA for salary-to-debt ratio #1">Our MBA for salary-to-debt ratio</h3>
           </div>
         </div>
         <div class="col-lg-4 col-md-12
           col-sm-12">
           <div class="info-block" id="info-block-3">
             <img src="../theme/assets/noun-64173-cc.svg" alt="Sciences University alumni worldwide #100,000" loading="lazy" />
             <div class="number d-flex align-items-center">
               <div class="number odometer" id="university">0</div>
               <span>+</span>
             </div>
             <h3 class="h1 info-title" title="Sciences University alumni worldwide #100,000">Sciences University alumni
               worldwide</h3>
           </div>
         </div>
       </div>
     </div>
   </section>
   <!-- statics end -->
   <!-- events start -->
   <section id="events">
     <div class="title-wrapper text-uppercase text-center">
       <span class="title-m"> events </span>
     </div>
     <div class="container">
       <div class="row">

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

         <?php if ($i == 2) {
              break;
            }
          } ?>

       </div>
     </div>
   </section>
   <!-- events end -->

   <!-- apply link start -->
   <section id="apply">
     <picture>
       <source media="(min-width:650px)" srcset=" ../theme/assets/66-b-08-d-136-d-3058544-e-02-fa-236-f-7-ae-10-c@2x.jpg" />
       <source media="(min-width:465px)" srcset="../theme/assets/66-b-08-d-136-d-3058544-e-02-fa-236-f-7-ae-10-c.jpg" />
       <img src="../theme/assets/66-b-08-d-136-d-3058544-e-02-fa-236-f-7-ae-10-c@3x.jpg" class="img-fluid" alt="university Campus" loading="lazy" />
       <div class="apply-content">
         <h3 class="h1 apply-title">
           ADMISSIONS ARE NOW OPEN FOR 2017/2018 INTAKE
         </h3>
         <a class="text-uppercase main-btn" href="#">apply now</a>
       </div>
       </img>
     </picture>

   </section>
   <!-- apply link end -->

   <!-- contact us form start -->
   <section id="form">
     <div class="form-box">
       <div class="title-wrapper text-uppercase text-center">
         <span class="title-m"> get in touch</span>
       </div>
       <form action="../entity/ContactUs.php" method="post" id="Form">
         <div class="form-row">
           <div class="form-group col-md-6">
             <label for="FullName" class="visuallyhidden">FullName: </label>
             <input type="text" class="form-control" id="FullName" name="fullName" placeholder="Full Name" required />
             <i class="fas fa-check-circle"></i>
             <i class="fas fa-exclamation-circle"></i>
             <small>error Message</small>
           </div>

           <div class="form-group col-md-6">
             <label for="PhoneNumber" class="visuallyhidden">PhoneNumber: </label>
             <input type="tel" pattern="\+(9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|
2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|
4[987654310]|3[9643210]|2[70]|7|1)\d{1,14}$" class="form-control" id="PhoneNumber" name="phoneNumber" required />

             <i class="fas fa-check-circle"></i>
             <i class="fas fa-exclamation-circle"></i>
             <small>error Message</small>
           </div>
         </div>
         <div class="form-row">
           <div class="form-group col-md-12">
             <label for="Email" class="visuallyhidden">Email: </label>
             <input type="email" class="form-control" id="Email" name="email" placeholder="Email" required />
             <i class="fas fa-check-circle"></i>
             <i class="fas fa-exclamation-circle"></i>
             <small>error Message</small>
           </div>
         </div>
         <div class="form-row">
           <div class="form-group col-md-12">
             <label for="Textarea" class="visuallyhidden">Textarea: </label>
             <textarea class="form-control" id="Textarea" maxlength="500" required rows="7" form="Form" name="body" placeholder="Message"></textarea>
             <div class="max-char text-right"><span id="chars">500</span> characters remaining</div>
             <i class="fas fa-check-circle"></i>
             <i class="fas fa-exclamation-circle"></i>
             <small>error Message</small>
           </div>
         </div>
         <div class="submit text-center">
           <button type="submit" name="submit" class="text-uppercase main-btn">
             submit
           </button>
         </div>
       </form>
     </div>
   </section>
   <!-- contact us form end -->

   <!-- footer start -->
   <?php include('../includes/footer.php'); ?>
   <!-- footer end -->

   <!-- js scripts  -->
   <?php include('../includes/scripts.php') ?>

   <!-- <script>
  var input = document.querySelector("#PhoneNumber");
  window.intlTelInput(input, {
  });
</script> -->
 </body>

 </html>