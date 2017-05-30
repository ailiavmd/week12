<?php
	// Start the session
	session_start();
    session_log();
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>VANARTS STUDENT MOCKUP PROJECT SITE</title>
        <meta name="description" content="This is a student excercise website for the Vancouver Institute of Media Arts">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
        <script src="https://use.fontawesome.com/88ffc56346.js"></script>

        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    
        <div class="row expanded backend">

            <h3>Admin Login</h3>
            <p>Please type your username and password into the boxes below.</p> 
            <form action="<?php echo htmlentities( $_SERVER[ 'PHP_SELF' ] ); ?>" method="post">
                <input type="text" name="username" placeholder="Username"/>
                <input type="password" name="password" placeholder="Password"/>
                <br><br>
                <input id="login-s" name="submit" type="submit" value="Log In" />
                <br>
            </form>

            <?php
            
                function session_log(){

                    // Store username in username if login was pressed
                    if(isset($_POST['submit']) AND !empty($_POST['username'])) {

                        $host = "localhost";
                        $username = "ailiavmd_neo_us";
                        $password = "neomon";
                        $database = "ailiavmd_neomon_db";
                        $connection = mysqli_connect($host, $username, $password, $database);

                        if(!$connection) {
                            echo "Connection Failed";
                        }
                        else {

                            $username = mysqli_real_escape_string($connection, $_POST['username']);
                            $password = mysqli_real_escape_string($connection, $_POST['password']);

                            $query = "SELECT * FROM sessions_tb 
                                      WHERE password='$password' 
                                      AND username='$username'";

                            $queryResult = mysqli_query($connection, $query);

                            $rows = mysqli_num_rows($queryResult);

                            if ($rows == 1) {
                                $_SESSION['uname'] = $username; // Initializing Session
                                header("location: admin.php");
                            } 
                            else {
                                echo "<p class='error'>Username or Password is invalid</p>";
                            }
                        }
                    }

                    // Check to see if username is entered into session
                    // As if the user is logged in 
                    if(isset($_SESSION['uname'])) {
                        header("location: admin.php");
                    }
                }
            ?>

            <p><a href="index.php"><i class="fa fa-long-arrow-left"></i> Go to home page</a></p>

        </div>
        
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
