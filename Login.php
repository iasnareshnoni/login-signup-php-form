<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/solid.min.css" integrity="sha512-uj2QCZdpo8PSbRGL/g5mXek6HM/APd7k/B5Hx/rkVFPNOxAQMXD+t+bG4Zv8OAdUpydZTU3UHmyjjiHv2Ww0PA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />
    <link rel="stylesheet" href="style.css">
    <title>Registration Form</title>
</head>
<body>

      <div class="cont-1">
        <div class="row">
         <div class="col-6 image image2">
         <div class="div-1">
         <h3>Sign In</h3>
          <p>Login to our social questions & Answers Engine to ask questions answer people’s questions & connect with other people.</p>
         </div>

          <a href="index.php"> Sign Up Here</a>

         </div>
 
         <?php
         include ("connection.php");

          if(isset($_POST['submit'])){
            
            $username = $_POST['email'];
            $password = $_POST['password'];

            $selectquery = mysqli_query($con, "SELECT * FROM signup WHERE email = '$username' ");

           $email = mysqli_num_rows($selectquery);

           if($email){

            $pass = mysqli_fetch_assoc($selectquery);

            $db_password = $pass['password'];

            $pass_decode = password_verify($password,$db_password);

            if($pass_decode){
              ?>
                  <script>
                    alert("login succesful");
                  </script>
              <?php
            }else{
              ?>
                  <script>
                    alert("login not succesful");
                  </script>
              <?php
            }

           }else{
            ?>
               <script>
                    alert("Email and Password Invalid");
                  </script>
            <?php
           }

          }
         ?>


         <div class="col-6 content content-1">
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            
            <label>Username or Email</label> <br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text"><span class="material-symbols-outlined">mail
                </span>
              <input type="email" name="email">
            </div>
            <br>
            
            <label>Password</label> <br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text"><span class="material-symbols-outlined">lock
                </span>
              <input type="password" name="password">
            </div>
            <br>

            <a href="#">Forget Password?</a>
            <br>
            <br>
            
            <button type="submit" name="submit">Login</button>

         </form>
         </div>
        </div>

      </div>
    



      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/solid.min.js" integrity="sha512-dcTe66qF6q/NW1X64tKXnDDcaVyRowrsVQ9wX6u7KSQpYuAl5COzdMIYDg+HqAXhPpIz1LO9ilUCL4qCbHN5Ng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>