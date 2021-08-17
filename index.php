<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<?php
// define variables and set to empty values
$fnameErr = $emailErr = $lnameErr=$passErr=$photoErr="";
$fname = $email = $lname = $pass= $photo = "";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
      $fnameErr = "first Name is required";
    } else {
      $fname = test_input($_POST["fname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
        $fnameErr = "Only letters and white space allowed";
      }
    }
    if (empty($_POST["lname"])) {
        $lnameErr = "last Name is required";
      } else {
        $lname = test_input($_POST["lname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
          $lnameErr = "Only letters and white space allowed";
        }
      }
    
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
      
    if (empty($_POST["pass"])) {
      $passErr = "Password is required";
    } else {
      $pass = test_input($_POST["pass"]);
      // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
      if (!preg_match("/^[0-9-' ]*$/",$pass)) {
        $passErr = "Only number and white space allowed";
      }
    }
  
    if (empty($_POST["photo"])) {
      $photoErr = "Photo is required";
    }
  

  
}
?>
<div class="container bootstrap snippets bootdey">
    <hr>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="well profile">
                <img class="user img-circle pull-left clearfix" height="54" src="https://bootdey.com/img/Content/user_1.jpg" alt="">
                <h3 class="name pull-left clearfix">Anis safia</h3>
                <div class="clearfix"></div>
                <ul class="nav nav-tabs">
                    <li class="">
                        <a href="#tab2" data-toggle="tab">
                        	Account
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    
                    <div class="tab-pane" id="tab2">
                        <div class="row">
                            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="basic">
                                        <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="inputfullname" class="col-lg-2 control-label">First Name</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="inputfullname" placeholder="First Name" name="fname" value="<?php echo $fname;?>">
                                                    <span class="error">* <?php echo $fnameErr;?></span>
                                                    <br><br>
                                                  </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputlastname" class="col-lg-2 control-label">Last Name</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="inputlastname" placeholder="Last Name" name="lname" value="<?php echo $lname;?>">
                                                    <span class="error">* <?php echo $lnameErr;?></span>
                                                    <br><br>
                                                  </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputemail" class="col-lg-2 control-label">Email</label>
                                                <div class="col-lg-10">
                                                    <input type="email" class="form-control" id="inputemail" placeholder="Email" name="email" value="<?php echo $email;?>">
                                                    <span class="error">* <?php echo $emailErr;?></span>
                                                    <br><br>
                                                  </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputpassword" class="col-lg-2 control-label">Password</label>
                                                <div class="col-lg-10">
                                                    <input type="password" class="form-control" id="inputpassword" placeholder="Password" name="pass" value="<?php echo $pass;?>">
                                                    <span class="error">* <?php echo $passErr;?></span>
                                                    <br><br>
                                                  </div>
                                            </div>
                                            <div class="form-group">
                                               <div class="input-group mb-3">
                                                  
                                                 <div class="custom-file">
                                                   <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="photo" value="<?php echo $photo;?>">
                                                   <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                   <span class="error">* <?php echo $photoErr;?></span>
                                                    <br><br>
                                                    
                                                 </div>
                                               </div>
                                            </div>
                                            <input type="submit" name="submit" value="submit">
                                        </form>
                                        <?php
                                             echo "<h3>Your Input:</h3>";
                                              echo $fname;
                                              echo "<br>";
                                              echo $lname;
                                              echo "<br>";
                                              echo $email;
                                              echo "<br>";
                                              echo $pass;
                                              echo "<br>";
                                             echo $photo;

                                        
                                                    if(isset($_POST["submit"])) {
                                                      echo $name=$_FILES['photo']['name'];
                                                    }
                                                    if ($_FILES['photo']['size']/1024/1024 >5){
                                                      echo "upload file less then 5 mega";
                                                    }else {
                                                     move_uploaded_file($_FILES['photo']['tmp_name'],'img/'.$_FILES['photo']['name']);
                                                    }
                                                    if ($_FILES['photo']['type']=== 'image/png'||$_FILES['photo']['type']=== 'image/jpeg'||$_FILES['photo']['type']=== 'application/pdf'){
                                                      move_uploaded_file($_FILES['photo']['tmp_name'],'img/'.$_FILES['photo']['name']);

                                                    }else {
                                                      echo "please Enter Image (png , jpeg )or pdf";
                                                    }
                                                    // Check if file already exists
                                                    //  if (file_exists("img/". basename($_FILES["photo"]["name"]))) {
                                                    //  echo "Sorry, file already exists.";
                                                    // }
                                                    ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<section style="margin: 30px;">             
<?php include 'file.php'; ?> 
<br>
<br>
<?php include 'file1.php'; ?> 
</section>  
<br>
<br>
<section style="text-align: center;"> 
<?php include 'footer.php'; ?>
</section>  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>