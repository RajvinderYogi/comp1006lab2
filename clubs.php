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
            //Make DATABASE connection
            $conn =new PDO('mysql:host=ca-cdbr-azure-central-a.cloudapp.net;dbname=comp1006lab1','bd37408b7c17da','a7a274f4');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //Set Up SQL query
            $sql ="SELECT * FROM clubs ORDER BY club_id";
            // run and store results
            $cmd =$conn->prepare($sql);
            $cmd->execute();
            $clubTeams =$cmd->fetchAll();
            //display the data in a table
            echo '<table class ="table table-striped table-hover"><tr><th>Club ID</th><th>Club Name</th><th>Ground</th><th>Edit</th><th>Delete</th></tr>';
            //use for loop through the data
            foreach($clubTeams AS $clubTeam) {
            echo '<tr><td>' . $clubTeam ['club_id'] . '</td>
            <td>' . $clubTeam ['club_name'] . '</td>
            <td>' . $clubTeam ['ground'] . '</td> 
            <td><a href="club-edit.php?club_id='.$clubTeam['club_id'].'" class="btn btn-info">Edit</a></td>
            <td><a href="del-club.php?club_id='.$clubTeam['club_id'].'" class="btn btn-warning confirmation">Delete</a></td></tr>';
            }
            //end table
            echo '</table>';
            //terminate the connection
            $conn=null;
        ?>
        <a href="club-edit.php">Add New Record Here</a>
        <!-- JAVA Script Here -->
        <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>