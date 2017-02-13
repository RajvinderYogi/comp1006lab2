<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>LAB2- Clubs</title>
        <!-- CSS link here-->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
    </head>
    <body>
        <?php
        //set all variable null
            $club_id = null;
            $club_name = null;
            $ground = null;
        //if club id is numeric
            if (!empty($_GET['club_id'])) {
                if (is_numeric($_GET['club_id'])) {
                    $club_id = $_GET['club_id'];
                }
            }
            if (!empty($club_id)) {
            //Make DATABASE connection
                $conn = new PDO('mysql:host=ca-cdbr-azure-central-a.cloudapp.net;dbname=comp1006lab1', 'bd37408b7c17da', 'a7a274f4');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Set Up SQL query
                $sql = "SELECT club_name, ground FROM clubs WHERE club_id = :club_id";
                // run and store results
                $cmd = $conn->prepare($sql);
                $cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
                $cmd->execute();
                $clubTeam = $cmd->fetch();
                $club_name = $clubTeam['club_name'];
                $ground = $clubTeam['ground'];
                //disconnect the DB
                $conn = null;
            }
        ?>
        <!-- input form here-->
        <div class="container">
            <h1> Update Club</h1>
            <form action="update-club.php" method="post">
                <fieldset>
                    <label for="club_name">Club Name*:</label>
                    <input type="text" name="club_name" id="club_name" required value="<?php echo $club_name ?>"/>
                </fieldset>
                <fieldset>
                    <label for="ground">Ground:</label>
                    <input type="text" name="ground" id="ground" required value="<?php echo $ground ?>"/>
                </fieldset>
                <input type="hidden" name="club_id" id="club_id" value="<?php echo $club_id ?>"/>
                <button class="btn btn-primary col-sm-offset-1">Save</button>
                <a href="clubs.php">Go to Records</a>
            </form>
        </div>
        <!-- JAVA Script Here -->
        <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
        crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>