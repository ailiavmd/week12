<!-- admin-->
<div class="row">
            
                <div class="col-12">
                
                    <h3>Upload Monstar</h3>

                    <form class="admin-f" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
                        <label>Name</label><input type="text" name="name" required>
                        <label>Image</label><input type="file" name="imageUploaded" required>
                        <label>Habitat</label>
                        <select name="habitat">
                            <option value="sea">Sea</option>
                            <option value="mountain">Mountain</option>
                            <option value="forest">Forest</option>
                            <option value="volcano">Volcano</option>
                        </select>
                        <label>Attack</label><input type="text" name="attack" required>
                        <label>Description</label><textarea name="description" required></textarea>
                        <input type="submit" name="m_submit" value="Upload" id="m_submit">
                    </form>

                    <?php

                        $host = "localhost";
                        $username = "ailiavmd_neo_us";
                        $password = "neomon";
                        $database = "ailiavmd_neomon_db";

                        $connection = mysqli_connect($host, $username, $password, $database);

                        if(isset($_POST['m_submit'])) {
                            $name = mysqli_real_escape_string($connection, $_POST['name']);
                            $targetDirectory = "img/monstars/";
                            $targetFile = $targetDirectory . basename($_FILES['imageUploaded']['name']);
                            $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
                            $habitat = mysqli_real_escape_string($connection, $_POST['habitat']);
                            $attack = mysqli_real_escape_string($connection, $_POST['attack']);       
                            $description = mysqli_real_escape_string($connection, $_POST['description']);
                            
                            $uploadOk = true;

                            if(!$connection) {
                                die("Connection has failed: " . mysqli_connect_error());
                            }

                            else {

                                $imageName = mysqli_real_escape_string($connection, $targetFile);
                                $uploadOk = true;

                                // Check if file already exists
                                ///////////////////////////////
                                if (file_exists($targetFile)) {
                                    echo "<p>FAILED - Image file already exists.</p>";
                                    $uploadOk = false;
                                }

                                // Allow certain file formats ''
                                ////////////////////////////////
                                if($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg" && $imageFileType !== "gif" && $imageFileType !== "svg" ) {
                                    echo "<p>FAILED - Image was not JPG, JPEG, PNG, GIF or SVG.</p>";
                                    $uploadOk = false;
                                }

                                if ($uploadOk == false) {
                                    echo "<p>Image file can't be uploaded.</p>";
                                } 

                                else {
                                    if(move_uploaded_file($_FILES['imageUploaded']['tmp_name'], $targetFile)) {
                                        echo "<h2>Upload successful!</h2>";

                                        $monstarInsert = "INSERT INTO monstar_tb (name, img, habitat, attack, description) VALUES ('" .$name. "', '" .$targetFile. "', '" .$habitat. "', '" .$attack. "', '" .$description. "')";
                                        $resultMonstarInsert = mysqli_query($connection, $monstarInsert);
                                    }
                                    else {
                                        echo "<p>The monstar did not upload successfully</p>";
                                    }

                                }

                            }
                        }

                        // Make sure to close connection
                        if(!$connection){
                            mysqli_close($connection);
                        }

                    ?>

                </div>
            </div>

            <div class="row">
                <form id="logOut" action="<?php echo htmlentities( $_SERVER[ 'PHP_SELF' ] ); ?>" method="post">
                    <button name="logOut">Log Out</button>
                </form>

                <?php
                
                    function logOut(){
                        // Delete all session variables if user logs out
                        if(isset($_POST['logOut']) OR !isset($_SESSION['uname'])) {
                            session_unset(); 
                            session_destroy();
                            header("location: login.php");
                        }

                    }

                ?>

                <p><a href="index.php"><i class="fa fa-long-arrow-left"></i> Go to home page</a></p>

            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="js/main.js"></script>


<?php
	// Start the session
	//session_start();
    //logOut();
?>
<!doctype html>

