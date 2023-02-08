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
         <div class="col-6 image">
         <div class="div-1">
         <h3>Sign Up</h3>
          <p>Sign Up to our social questions and Answers Engine to ask questions, answer people’s questions, and connect with other people.</p>
         </div>

          <a href="Login.php">Hava an Account? Sign In</a>

         </div>

         <?php
         
         include ("connection.php");

         if(isset($_POST['submit'])){
              $name = mysqli_real_escape_string($con,$_POST['name']);
              $email = mysqli_real_escape_string($con,$_POST['email']);
              $password = mysqli_real_escape_string($con,$_POST['password']);
              $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
              $mobile = mysqli_real_escape_string($con,$_POST['mobile']);

              $pass = password_hash($password, PASSWORD_BCRYPT);
              $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

              $emailquery = " SELECT * FROM signup WHERE email = '$email' ";
              $query = mysqli_query($con, $emailquery);

              $emailcount = mysqli_num_rows($query);

              if($emailcount>0){
                echo "email already exits";
              }else{
                if($password === $cpassword){
                  $insertquery = mysqli_query($con, "INSERT INTO signup(name,email,password,cpassword,mobile)values('$name','$email','$pass','$cpass','$mobile')");
                   if($insertquery){
                    header("location:Login.php");
                   }else{
                    header("location:index.php");
                   }

                }else{
                  ?>
                    <script>
                      alert("password not matched");
                    </script>
                  <?php
                }
              }

         }

         
         ?>


         <div class="col-6 content">
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <label>Name</label> <br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text"><span class="material-symbols-outlined">person
              </span>
              <input type="text" name="name" required>
            </div>
            <br>
            
            <label>Email</label> <br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text"><span class="material-symbols-outlined">mail
                </span>
              <input type="email" name="email" required>
            </div>
            <br>
            
            <label >Password</label> <br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text"><span class="material-symbols-outlined">lock
                </span>
              <input type="password" name="password" required>
            </div>
            <br>

            <label>Confirm Password</label> <br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text"><span class="material-symbols-outlined">lock
                </span>
              <input type="password" name="cpassword" required>
            </div>
            <br>
            
            <label>Mobile</label> <br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" ><span class="material-symbols-outlined">call
                </span>
              <input type="text" name="mobile" required>
            </div>
            <br>
            
            <button type="submit" name="submit">Register</button>

         </form>
         </div>
        </div>

      </div>
    



      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/solid.min.js" integrity="sha512-dcTe66qF6q/NW1X64tKXnDDcaVyRowrsVQ9wX6u7KSQpYuAl5COzdMIYDg+HqAXhPpIz1LO9ilUCL4qCbHN5Ng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>