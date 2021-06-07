<?php
session_start();
require '../entity/News.php';
$news = new News();
$news_id = $_GET['ID'];
$row = $news->getElementById($news_id);
$month = strtr($row[0]['date'], '/', '-');
$day = strtr($row[0]['date'], '/', '-');
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
            <path fill="#fff" fill-opacity="1" d="M0,256L80,256C160,256,320,256,480,240C640,224,800,192,960,192C1120,192,1280,224,1360,240L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
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
                    <img src="../theme/assets/<?php echo $row[0]['img_url'] ?>" class="w-100" alt="event" loading="lazy" />
                </div>
                <div class="col-md-4">
                    <div class="event-details my-3">
                        <div class="container">
                            <div class="row">

                            </div>
                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="col-12 d-flex align-items-center p-0 mb-2">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex align-items-center p-0 mb-2">
                <i class="fas fa-calendar-alt mr-2"></i>
                <span><?php echo date('F j', strtotime($day)); ?></span>
            </div>
            <p class="mt-5 row col-12">
                <?php echo $row[0]['body'];  ?>
            </p>

        </div>
    </div>
    <!-- event details end -->
    <?php include('../includes/footer.php'); ?>
    <!-- more events  end -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>

    <script src="../theme/admin_themes/js/jquery.min.js"></script>

    
    <script src="../../theme/admin_themes/js/main.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>

</body>

</html>