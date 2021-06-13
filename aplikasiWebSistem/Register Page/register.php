<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
</head>

<body>
    <h1> Halaman Register</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" placeholder="Username" required>
            </li>
            <br>
            <li>
                <label for="passwword">Passwword : </label>
                <input type="password" name="passwword" id="passwword" placeholder="Password" required>
            </li>
            <br>
            <li>
                <label for="confirmPass">Confirm Password : </label>
                <input type="password" name="confirmPass" id="confirmPass" placeholder="Confirm Password" required>
            </li>
            <br>
            <li>
                <label for="email">E-mail : </label>
                <input type="email" name="email" id="email" placeholder="Confirm Password" required>
            </li>
            <br>
            <li>
                <button type="submit" name="submit">Register</button>
            </li>
        </ul>
    </form>
</body>

</html>