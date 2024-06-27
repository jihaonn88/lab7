<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registration Form in HTML CSS</title>
    <link rel="stylesheet" href="assets/login/style.css" />
  </head>
  <body>
    <section class="container">
      <header>Login Form</header>
      <form action="login.php" method="post" class="form">
        <div class="input-box">
          <label>Matric</label>
          <input name="matric" id="matric" type="text" placeholder="Enter matric number" required />
        </div>

        <div class="input-box">
          <label>Password</label>
          <input name="password" id="password" type="text" placeholder="Enter your password" required />
        </div>

        <div class="input-box">
          <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>

        <button>Submit</button>
      </form>
    </section>
  </body>
</html>
