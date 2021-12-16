<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Car Booking Form</title>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6s+L3BlXeVIU" crossorigin="anonymous"/>
<link rel="stylesheet" type="text/css" href="carbooking.css">
</head>

<body>
  <div class="testbox">
   <form action="insertbooking.php" method="POST">
     <div class="banner">
      <h1>Car Booking Form</h1>
     </div>
     <div class="item">
      <p>Name</p>
      <div class="name-item">
       <input type="text" name="Name" value="<?php echo $currentUser['ClientName'] ?>"/>
      </div>
     </div>
    <div class="item">
     <p>E-mail</p>
     <input type="text" name="Email" value="<?php echo $currentUser['ClientEmail'] ?>"/>
    </div>
    <div class="item">
    <p>Address</p>
    <div class="city-item">
      <input type="text" name="Address" placeholder="Street Address" value="<?php echo $currentUser['Address'] ?>"/>
      <input type="text" name="PostCode" placeholder="Post Code" value="<?php echo $currentUser['PostCode'] ?>"/>
    </div>
   </div>
   <div class="question">
     <p>Vehicle</p>
     <div class="question-answer">
       <?php
          if (mysqli_num_rows($allCars) > 0){
            while($row = mysqli_fetch_assoc($allCars)){
              ?>
              <div>
              <input type="radio" value="<?php echo $row['Car_ID'] ?>" id="<?php echo $row['Car_ID'] ?>" name="vehicle" />
              <label for="<?php echo $row['Car_ID'] ?> class="radio">
                <span>
                  <?php echo $row['CarType'] . ". MAX" . $row['CarCapacity'] . " people"  ?>
                </span>
               </label>
              </div>
             <?php
           }
         }
       ?>
      </div>
     </div>
     <div class="item">
        <p>Booking Date</p>
        <input type="date" name="bdate" />
        <i class="fas fa-calendar-alt"></i>
     </div>
     <div class="item">
        <p>Booking Time</p>
        <input type="time" name="btime" />
        <i class="fas fa-clock"></i>
       </div>
       <div class="btn-block">
         <button type="submit" href="/">BOOK</button>
       </div>
      </form>
     </div>
</body>
</html>