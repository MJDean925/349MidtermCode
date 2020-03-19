<!-- PART 1 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Midterm Coding</title>
</head>
<body>
    <form>
        <div>
            <label>First Name</label>
            <input type="text" id="Fname"  name="Fname" required autofocus>    
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" id="Lname"  name="Lname" required>    
        </div>
        <div>
            <label>Email</label>
            <input type="text" id="email"  name="email" required>    
        </div>
        <div>
            <label>
                <input type="radio" id="major1" value="CS"></input>
                CS
            </label>
            <label>
                <input type="radio" id="major2" value="CSCE"></input>
                CSCE
            </label>
            <label>
                <input type="radio" id="major3" value="MATH"></input>
                MATH
            </label>
        </div>
        <div>
            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</body>
</html>

<!-- PART 2 -->
<?php
    $connection = mysqli_connect("localhost", "phpmyadmin", "password", "phppractice");
    if (!$connection) {
        echo "Cannot connect to MySQL.". mysqli_connect_error();
        exit();
    }
?>

<!-- PART 3 -->
<?php
    $row = mysqli_fetch_object($result);
    $db_userid = $row->admin_id;
    $db_password = $row→admin_password;
    $encryptpasswd = sha1($userPasswd); // Note: sha1 encryption is obsolete
    $db_name = $row->admin_name;

    if ($db_userid != $userid || $db_password != $encryptpasswd) {
        $query = "INSERT INTO administrator (admin_id, admin_password, admin_name)
                  VALUES ($db_userid, $encryptpasswd, $db_name)";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            echo ("Insert to administrator failed. ". mysqli_error($connection));
            exit();
        }
    }
?>