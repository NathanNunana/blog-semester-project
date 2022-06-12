 <?php
  include "./includes/header.php";
  include './database/connect.php';
  $sql = "SELECT * FROM `posts`";
  ?>
 <title>Home</title>
 <?php include "./includes/navbar.php"; ?>
 <div class="site-section bg-light">
   <div class="container">
     <div class="row align-items-stretch retro-layout-2">
       <?php
        if ($result = $conn->query($sql)) {
          $featured = [];
          while ($record = $result->fetch_assoc()) {
            if ($record["featured"]) {
              array_push($featured, $record);
            }
          }

          $number = range(0, count($featured) - 1);
          shuffle($number);

          $featured1 = $featured[$number[0]];
          $title = $featured1["title"];
          $category = $featured1["category"];
          $image = $featured1["image"];
          $date = $featured1["date"];


          $featured2 = $featured[$number[1]];
          $title2 = $featured2["title"];
          $image2 = $featured2["image"];
          $category2 = $featured2["category"];
          $date2 = $featured2["date"];


          $featured3 = $featured[$number[2]];
          $title3 = $featured3["title"];
          $image3 = $featured3["image"];
          $category3 = $featured3["category"];
          $date3 = $featured3["date"];


          $featured4 = $featured[$number[3]];
          $title4 = $featured4["title"];
          $image4 = $featured4["image"];
          $category4 = $featured4["category"];
          $date4 = $featured4["date"];

          $featured5 = $featured[$number[4]];
          $title5 = $featured5["title"];
          $image5 = $featured5["image"];
          $category5 = $featured5["category"];
          $date5 = $featured5["date"];

          echo "<div class='col-md-4'>
        <a href='single.php' class='h-entry mb-30 v-height gradient' style='background-image: url(uploads/$image);'>
          <div class='text'>
            <h2>$title</h2>
            <span class='date'>$date</span>
          </div>
        </a>
        <a href='single.php' class='h-entry v-height gradient' style='background-image: url(uploads/$image2);'>

          <div class='text'>
            <h2>$title2</h2>
            <span class='date'>$date2</span>
          </div>
        </a>
      </div>
      <div class='col-md-4'>
        <a href='single.php' class='h-entry img-5 h-100 gradient' style='background-image: url(uploads/$image5);'>

          <div class='text'>
            <div class='post-categories mb-3'>
              <span class='post-category bg-danger'>$category5</span>
              <span class='post-category bg-primary'>$category</span>
            </div>
            <h2>$title5</h2>
            <span class='date'>$date5</span>
          </div>
        </a>
      </div>
      <div class='col-md-4'>
        <a href='single.php' class='h-entry mb-30 v-height gradient' style='background-image: url(uploads/$image3);'>

          <div class='text'>
            <h2>$title3</h2>
            <span class='date'>$date3</span>
          </div>
        </a>
        <a href='single.php' class='h-entry v-height gradient' style='background-image: url(uploads/$image4);'>

          <div class='text'>
            <h2>$title4</h2>
            <span class='date'>$date4</span>
          </div>
        </a>
      </div>";
        ?>
     </div>
   </div>
 </div>

 <div class="site-section">
   <div class="container">
     <div class="row mb-5">
       <div class="col-12">
         <h2>Recent Posts</h2>
       </div>
     </div>
     <div class="row">
       <?php
          if ($result = $conn->query($sql)) {
            while ($record = $result->fetch_assoc()) {
              $title = $record["title"];
              $category = $record["category"];
              $description = $record["description"];
              $image = $record["image"];
              $date = $record["date"];
              $userId = $record["user_id"];
              if($user = $conn->query("SELECT `username` FROM `users` WHERE `id`=".$userId)){
                $rec = $user->fetch_assoc();
                $name = $rec["username"];
              }
              echo "<div class='col-lg-4 mb-4'>
                        <div class='entry2'>
                          <div class='img-wrapper'><a href='single.php'><img src='./uploads/$image' alt='Image' class='img-fluid rounded'></a>
                          </div>
                          <div class='excerpt'>
                            <span class='post-category text-white bg-secondary mb-3'>$category</span>
           
                            <h2><a href='single.php'>$title</a></h2>
                            <div class='post-meta align-items-center text-left clearfix'>
                              <figure class='author-figure mb-0 mr-3 float-left'><img src='static/images/person_5.jpg' alt='Image' class='img-fluid'></figure>
                              <span class='d-inline-block mt-1'>By <a href='#'>$name</a></span>
                              <span>&nbsp;-&nbsp; $date</span>
                            </div>
           
                            <p>$description</p>
                            <p><a href='#'>Read More</a></p>
                          </div>
                        </div>
                      </div>
                      ";
            }
          }
        ?>
     </div>
     <div class="row text-center pt-5 border-top">
       <div class="col-md-12">
         <div class="custom-pagination">
           <span>1</span>
           <a href="#">2</a>
           <a href="#">3</a>
           <a href="#">4</a>
           <span>...</span>
           <a href="#">15</a>
         </div>
       </div>
     </div>
   </div>
 </div>

 <div class="site-section bg-light">
   <div class="container">

     <div class="row align-items-stretch retro-layout">
     <?php
          echo "<div class='col-md-5 order-md-2'>
            <a href='single.php' class='hentry img-1 h-100 gradient' style='background-image: url(uploads/$image);'>
              <span class='post-category text-white bg-danger'>$category</span>
              <div class='text'>
                <h2>$title</h2>
                <span>$date</span>
              </div>
            </a>
          </div>
   
          <div class='col-md-7'>
   
            <a href='single.php' class='hentry img-2 v-height mb30 gradient' style='background-image: url(uploads/$image2);'>
              <span class='post-category text-white bg-success'>$category2</span>
              <div class='text text-sm'>
                <h2>$title2</h2>
                <span>$date2</span>
              </div>
            </a>
   
            <div class='two-col d-block d-md-flex'>
              <a href='single.php' class='hentry v-height img-2 gradient' style='background-image: url(uploads/$image3);'>
                <span class='post-category text-white bg-primary'>$category3</span>
                <div class='text text-sm'>
                  <h2>$title3</h2>
                  <span>$date3</span>
                </div>
              </a>
              <a href='single.php' class='hentry v-height img-2 ml-auto gradient' style='background-image: url(uploads/$image4);'>
                <span class='post-category text-white bg-warning'>$category4</span>
                <div class='text text-sm'>
                  <h2>$title4</h2>
                  <span>$date4</span>
                </div>
              </a>
            </div>
   
          </div>";
        }
      ?>
     </div>

   </div>
 </div>


 <div class="site-section bg-lightx">
   <div class="container">
     <div class="row justify-content-center text-center">
       <div class="col-md-5">
         <div class="subscribe-1 ">
           <h2>Subscribe to our newsletter</h2>
           <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
           <form action="#" class="d-flex">
             <input type="text" class="form-control" placeholder="Enter your email address">
             <input type="submit" class="btn btn-primary" value="Subscribe">
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
 <?php include './includes/footer.php'; ?>