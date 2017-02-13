<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Updating New Record</title>
    </head>
    <body>
        <?php
            //create 3 variables and store 3 form inputs in them
            $club_id = $_POST['club_id'];
            $club_name = $_POST['club_name'];
            $ground = $_POST['ground'];
            //variable to indicate if there are 1 or more error
            $ok = true;

            //validate the input
            if (empty($club_name)) {
                echo 'Please Enter Club Name <br />';
                $ok = false;
            }
            if (empty($ground)) {
                echo 'Ground is required<br />';
                $ok = false;
            }

            if ($ok == true) {
            //connect to the database - dbtype, server address, dbname, username, password
                $conn = new PDO('mysql:host=ca-cdbr-azure-central-a.cloudapp.net;dbname=comp1006lab1', 'bd37408b7c17da', 'a7a274f4');
                if (empty($club_id)) {
            // set up an SQL instruction to save the new album - INSERT & UPDATE
                    $sql = "INSERT INTO clubs (club_name, ground) VALUES (:club_name, :ground);";
                } else {
                    $sql = "UPDATE clubs SET club_name= :club_name, ground=:ground WHERE club_id = :club_id";
                }
            //pass the input variables to the SQL command
                $cmd = $conn->prepare($sql);
                $cmd->bindParam(':club_name', $club_name, PDO::PARAM_STR, 50);
                $cmd->bindParam(':ground', $ground, PDO::PARAM_STR, 50);

                if (!empty($club_id)) {
                    $cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
                }
            //execute the INSERT
                $cmd->execute();

            // disconnect
                $conn = null;

            //direct to records page
                header('location:clubs.php');
            }
        ?>
    </body>
</html>