<?php
// Turn off all error reporting
error_reporting(0);
session_start();
$servername = "localhost";
$server_user = "root";
$server_pass = "";
$dbname = "food";
$name = $_SESSION['name'];
$role = $_SESSION['role'];
$con = new mysqli($servername, $server_user, $server_pass, $dbname);

$username = $_POST['username'];
$password = $_POST['password'];
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>JKS | Food</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/JKS-icons.css">
<link rel="stylesheet" type="text/css" href="css/settings.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="css/zerogrid.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/loader.css">
<link rel="shortcut icon" href="images/favicon.png">

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

<!--Loader-->
<div class="loader"> 
   <div class="cssload-container">
     <div class="cssload-circle"></div>
     <div class="cssload-circle"></div>
   </div>
</div>

<!--Top bar-->


<!--Topbar-->
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="pull-left hidden-xs">JKS Foods and Restaurant, the Best in Town</p>
        <p class="pull-right"><i class="fa fa-phone"></i>Order Online +91-892-808-5056</p>
      </div>
    </div>
  </div>
</div>

<!--Header-->
<header id="main-navigation">
  <div id="navigation" data-spy="affix" data-offset-top="20">
    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-default">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#fixed-collapse-navbar" aria-expanded="false"> 
            <span class="icon-bar top-bar"></span> <span class="icon-bar middle-bar"></span> <span class="icon-bar bottom-bar"></span> 
            </button>
           <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo" class="img-responsive"></a> 
         </div>
        
            <div id="fixed-collapse-navbar" class="navbar-collapse collapse navbar-right">
              <ul class="nav navbar-nav">
                <li>
                   <a href="index.html">Home</a>
                   
                </li>
                <li><a href="food.php">Our Food</a></li>
                
                
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                  
                <li><a href="./account/register.php">Order Now</a></li>
                
              </ul>
            </div>
         </nav>
         </div>
       </div>
     </div>
  </div>
</header>

<!--Page header & Title-->
<section id="page_header">
<div class="page_title">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <h2 class="title">Our Food</h2>
         <p>Check out our menu and some of our special, featured recipies!</p>
      </div>
    </div>
  </div>
</div>  
</section>



<!--Welcome-->
<section id="welcome" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <h2 class="heading">Welcome to JKS</h2>
         <hr class="heading_space">
      </div>
      <div class="col-md-7 col-sm-6">
        <p class="half_space">Launched in Mumbai, JKS has grown from a home project to one of the largest food aggregators in the world. We are present in 24 countries and 10000+ cities globally, enabling our vision of better food for more people. We not only connect people to food in every context but work closely with restaurants to enable a sustainable ecosystem.</p>
        <p class="half_space"></p>
        <p class="half_space">It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including them.</p>
        <ul class="welcome_list">
        <li>Business Events</li>
        <li>Birthdays</li>
        <li>Cardiovascular Diseases</li>
        <li>Weddings</li>
        <li>Party & Others</li>
        </ul> 
      </div>
      <div class="col-md-5 col-sm-6">
       <img class="img-responsive" src="images/welcome.jpg" alt="welcome JKS">
      </div>
    </div>
  </div>
</section> 


<!--Food Facilities-->
<section id="food" class="padding bg_grey">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="heading" style="padding-right: 10px;"><a href="food.php">Our &nbsp; Menu</a></h2>
        <h2 class="heading" style="padding-right: 10px;"><a href="food.php?category=Best">Best Dishes</a></h2>
        <h2 class="heading" style="padding-right: 10px;"><a href="food.php?category=Main">Main Menu</a></h2>
        <h2 class="heading" style="padding-right: 10px;"><a href="food.php?category=appetizers">appetizers</a></h2>
        <h2 class="heading" style="padding-right: 10px;"><a href="food.php?category=desserts">desserts</a></h2>
        <h2 class="heading" style="padding-right: 10px;"><a href="food.php?category=Drink">Drinks</a></h2>
        <hr class="heading_space">
      </div>
    </div>
    <div class="row">
    <div class="col-md-4">
        <ul class="menu_widget">
          <?php
          $category = "";
          $url = basename($_SERVER['REQUEST_URI']);
          $parts = parse_url($url);
          parse_str($parts['query'], $query);
          $category =  $query['category'];
          if (empty($category)){
            $result = mysqli_query($con, "SELECT * FROM items;");
          while($row = mysqli_fetch_array($result))
          {
              echo '<li>'.$row['name'].'<span>'.$row['price'].'BATH </span></li>';
          }
          }
          else {
          $result = mysqli_query($con, "SELECT * FROM items WHERE category = '$category';");
          while($row = mysqli_fetch_array($result))
          {
              echo '<li>'.$row['name'].'<span>'.$row['price'].'BATH </span></li>';
          }
        }
          ?>
        </ul>
      </div>
      <div class="col-md-8 grid_layout">
      <div class="row">
      <div class="zerogrid">
          <div class="wrap-container">
            <div class="wrap-content clearfix">
            <?php
            function console_log($output, $with_script_tags = true) {
              $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
          ');';
              if ($with_script_tags) {
                  $js_code = '<script>' . $js_code . '</script>';
              }
              echo $js_code;
          }
          $category = "";
          $url = basename($_SERVER['REQUEST_URI']);
          $parts = parse_url($url);
          parse_str($parts['query'], $query);
          $category =  $query['category'];
          if (empty($category)){
            $result = mysqli_query($con, "SELECT * FROM items;");
          while($row = mysqli_fetch_array($result))
          {
            echo '<div class="col-1-2">
            <div class="wrap-col first">
                <div class="item-container"> 

                 <img style="height: 345px;width: 345px;" src="data:image/jpeg;base64,'.base64_encode($row['image']).'" alt="'.base64_encode($row['name']).'"/>
                 <div class="overlay">
                     <a class="overlay-inner fancybox" data-fancybox-group="gallery">
                     '.$row['name'].'
                     </a> 
                 </div>
                </div>
              </div>
            </div>';
          }
        }
          else if($category == 'Best'){
            $best = mysqli_query($con, "SELECT DISTINCT item_id FROM order_details;");
            foreach ($best as $cell) {
              $result = mysqli_query($con, "SELECT * FROM items WHERE id = '$cell[item_id]';");
              foreach ($result as $row) {
                  echo '<div class="col-1-2">
                  <div class="wrap-col first">
                      <div class="item-container"> 

                      <img style="height: 345px;width: 345px;" src="data:image/jpeg;base64,'.base64_encode($row['image']).'" alt="'.base64_encode($row['name']).'"/>
                      <div class="overlay">
                          <a class="overlay-inner fancybox" data-fancybox-group="gallery">
                          '.$row['name'].'
                          </a> 
                      </div>
                      </div>
                    </div>
                  </div>';
              }
          }
            
          }
          
          else {
          $result = mysqli_query($con, "SELECT * FROM items WHERE category = '$category';");
          while($row = mysqli_fetch_array($result))
          {
              echo '<div class="col-1-2">
              <div class="wrap-col first">
                  <div class="item-container"> 

                   <img style="height: 345px;width: 345px;" src="data:image/jpeg;base64,'.base64_encode($row['image']).'" alt="'.base64_encode($row['name']).'"/>
                   <div class="overlay">
                       <a class="overlay-inner fancybox" data-fancybox-group="gallery">
                       '.$row['name'].'
                       </a> 
                   </div>
                  </div>
                </div>
              </div>';
          }
        }
          ?>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Featured Receipes -->
<section id="news" class="bg_grey padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
      <h2 class="heading">Featured &nbsp; Food &nbsp; Receipes</h2>
      <hr class="heading_space">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="cheffs_wrap_slider">
          <div id="news-slider" class="owl-carousel">
            <div class="item">
              <div class="news_content">
               <img src="images/news-img3.jpg" alt="Docotor">
               <div class="date_comment">
                  <span>22<small>apr</small></span>
                  <a href="#."><i class="icon-comment"></i> 5</a>
               </div>
               <div class="comment_text">
                 <h3><a href="#.">Quesadillas Acapulco</a></h3>
                 <p>Enjoy Delicious Food!</p>
               </div>
              </div>
            </div>
            <div class="item">
              <div class="news_content">
               <img src="images/news-img2.jpg" alt="Docotor">
               <div class="date_comment">
                  <span>22<small>apr</small></span>
                  <a href="#."><i class="icon-comment"></i> 5</a>
               </div>
               <div class="comment_text">
                 <h3><a href="#.">Barbecue Beef</a></h3>
                 <p>Enjoy Delicious Food!</p>
               </div>
              </div>
            </div>
            <div class="item">
              <div class="news_content">
               <img src="images/news-img1.jpg" alt="Docotor">
               <div class="date_comment">
                  <span>22<small>apr</small></span>
                  <a href="#."><i class="icon-comment"></i> 5</a>
               </div>
               <div class="comment_text">
                 <h3><a href="#.">Mexican Taco</a></h3>
                 <p>Enjoy Delicious Food!</p>
               </div>
              </div>
            </div>
            
            <div class="item">
              <div class="news_content">
               <img src="images/food-1.jpg" alt="Docotor">
               <div class="date_comment">
                  <span>22<small>apr</small></span>
                   <a href="#."><i class="icon-comment"></i> 5</a>
               </div>
               <div class="comment_text">
                 <h3><a href="#.">Thai Chicken Chilly</a></h3>
                 <p>Enjoy Delicious Food!</p>
               </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- testinomial -->
<section id="testinomial" class="padding">
  <div class="container">
  <div class="row">
      <div class="col-md-12 text-center">
      <h2 class="heading">Our &nbsp; happy &nbsp; Customers</h2>
      <hr class="heading_space">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
      <div id="testinomial-slider" class="owl-carousel text-center">
        <div class="item">
          <h3>Awesome Food. Food from some of the finest restaurants in India!</h3>
          <p>Chris Martin</p>
        </div>
        <div class="item">
          <h3>Good Recipes, Nice staff and customer care. A good service overall</h3>
          <p>Alex Hales</p>
        </div>
        <div class="item">
          <h3>Awesome Food. Food from some of the finest restaurants in India!</h3>
          <p>Shane Robertson</p>
        </div>
       </div>
      </div>
    </div>
  </div>
</section>


<!--Footer-->
<footer class="padding-top bg_black">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6 footer_column">
        <h4 class="heading">Who are we?</h4>
        <hr class="half_space">
        <p class="half_space"></p>
        <p>Launched in Mumbai, JKS has grown from a home project to one of the largest food aggregators in the world. We are present in 24 countries and 10000+ cities globally, enabling our vision of better food for more people. We not only connect people to food in every context but work closely with restaurants to enable a sustainable ecosystem.</p>
      </div>
      <div class="col-md-3 col-sm-6 footer_column">
        <h4 class="heading">Quick Links</h4>
        <hr class="half_space">
        <ul class="widget_links">
          <li><a href="index.html">Home</a></li>
          <li><a href="food.php">Our Food</a></li>
          <li><a href="about.html">About Us</a></li>
          
          <li><a href="faq.html">Faq's</a></li>
          <li><a href="./account/register.php">Order Now</a></li>
          
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 footer_column">
        <h4 class="heading">Newsletter</h4>
        <hr class="half_space">
        <p class="icon"><i class="icon-dollar"></i>Sign up with your name and email to get updates fresh updates.</p>
        <div id="result1" class="text-center"></div>        
        
       <form action="http://themesindustry.us13.list-manage.com/subscribe/post-json?u=4d80221ea53f3a4487ddebd93&id=494727d648&c=?" method="get" onSubmit="return false" class="newsletter">
          <div class="form-group">
            <input type="email" placeholder="E-mail Address" required name="EMAIL" id="EMAIL" class="form-control" />
          </div>
          <div class="form-group">
            <input type="submit" class="btn-submit button3" value="Subscribe" />
          </div>
        </form>
      </div>
      <div class="col-md-3 col-sm-6 footer_column">
        <h4 class="heading">Get in Touch</h4>
        <hr class="half_space">
        <p></p>
        <p class="address"><i class="icon-location"></i>JKS, Opposite S.L.Raheja Hospital, Mahim Causeway, Mahim (West), Mumbai, Maharashtra 400016.</p>
        <p class="address"><i class="fa fa-phone"></i>(+91) 892 808 5056</p>
        <p class="address"><i class="icon-dollar"></i><a href="office@jks.com">office@jks.com</a></p>
      </div> 
    </div>
    <div class="row">
     <div class="col-md-12">
        <div class="copyright clearfix">
          <p>Copyright &copy; 2020 JKS. All Right Reserved</p>
          <ul class="social_icon">
               <li><a href="#" class="facebook"><i class="icon-facebook5"></i></a></li>
               <li><a href="#" class="twitter"><i class="icon-twitter4"></i></a></li>
               <li><a href="#" class="google"><i class="icon-google"></i></a></li>
              </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

<a href="#" id="back-top"><i class="fa fa-angle-up fa-2x"></i></a>

<script src="js/jquery-2.2.3.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/jquery.appear.js"></script>  
<script src="js/jquery-countTo.js"></script> 
<script src="js/owl.carousel.min.js" type="text/javascript"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/functions.js" type="text/javascript"></script>

</body>
</html>
