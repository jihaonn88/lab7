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
        <header>Registration Form</header>
        <form action="insert.php" class="form" method="post">
            <div class="input-box">
                <label>Matric</label>
                <input name="matric" type="text" placeholder="Enter matric number" required />
            </div>

            <div class="input-box">
                <label>Name</label>
                <input name="name" type="text" placeholder="Enter your name" required />
            </div>

            <div class="input-box">
                <label>Password</label>
                <input name="password" type="password" placeholder="Enter your password" required />
            </div>

            <div class="input-box">
                <label>Role :</label>
                <div class="select-box">
                    <select name="role" required>
                        <option value="Lecturer">Lecturer</option>
                        <option value="Student">Student</option>
                    </select>
                </div>
            </div>
            <br>
            <p>Already have an account? <a href="loginform.php">Login here</a></p>

            <button type="submit">Submit</button>
        </form>
    </section>
</body>
</html>
