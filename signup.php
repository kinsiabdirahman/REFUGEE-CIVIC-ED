
<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in & Sign up Form</title>
    <link rel="stylesheet" href="css/reg.css" />
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form method="post" action="signup.php" autocomplete="off" class="sign-in-form">
            <?php include('errors.php'); ?>
       
              <div class="logo">
                <img src="./img/rfglogo.png" alt="easyclass" />
                <h4>Refugee Civic Education</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="login.php" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="username" 
                    required
                    value="<?php echo $username; ?>"
                    
                  />
                  <label>Username</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="email"
                    class="input-field"
                    autocomplete="off"
                    name="email"
                    required
                    value="<?php echo $email; ?>"
                    
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="password_1"
                    
                  />
                  <label>Password</label>
                </div>


                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="password_2"
                    
                  />
                  <label>Confirm Password</label>
                </div>
                

                <button type="submit" value="Sign Up" class="sign-btn" name="reg_user">Sign Up</button>

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="./img/agreement.png" class="image img-1 show" alt="" />
              <img src="./img/constread.png" class="image img-2" alt="" />
              <img src="./img/signin.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Educating Refugees</h2>
                  <h2>On their civic rights</h2>
                  <h2>And assylum rights</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="js/slide.js"></script>
  </body>
</html>
