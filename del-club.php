<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Deleting Club</title>
    </head>
    <body>
        <?php
            //Set variable is equal to null
            $club_id= null;
            if(!empty($_GET['club_id'])){
                if(is_numeric($_GET['club_id'])){
                $club_id = $_GET['club_id'];
                }
            }

            if (!empty($club_id)){
            //Make DATABASE connection
                $conn =new PDO('mysql:host=ca-cdbr-azure-central-a.cloudapp.net;dbname=comp1006lab1','bd37408b7c17da','a7a274f4');
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                //Set Up SQL query
                $sql ="DELETE FROM clubs WHERE club_id=:club_id";
                // run and store results
                $cmd =$conn->prepare($sql);
                $cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
                $cmd->execute();
                //Disconnect DB
                $conn = null;
            }
            //Redirect to record page
            header('location:clubs.php');
        ?>

    </body>
</html>