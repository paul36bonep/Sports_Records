<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Player</title>
    <link rel="stylesheet" href="NewPlayer.css">
</head>
<body>
    <?php
    include "DBconnection.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if(isset($_GET['id'])){

            $id = $_GET['id'];
            $tname = $_POST['Tname'];
            $date = $_POST['date'];
            $wins = $_POST['Wins'];
            $losses = $_POST['Lose'];
            $kills = $_POST['Kills'];
            $deaths = $_POST['Deaths'];
            $assists = $_POST['Assists'];
            $towers = $_POST['Towers'];
    
            $sql_update = "UPDATE team SET team_name = '$tname', date_established = '$date', wins = $wins,
                lose = $losses, kills = $kills, deaths = $deaths, assists = $assists, towers = $towers
                WHERE team_id = $id";  
  
            $update_query = mysqli_query($conn,$sql_update);
            header("location:Teams.php");
        }
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];

    }

    $sql_info = "SELECT * FROM team WHERE team_id = $id";
    $result_info = mysqli_query($conn, $sql_info);
    $row_info = mysqli_fetch_assoc($result_info);

    ?>
<div><a href="Teams.php"><button class="button">Cancel</button></a></div>
<div class="parent">
        <div class = "child">
            <form action="UpdateTeam.php?id=<?php echo $row_info['team_id'];?>" method="post">

                <div>
                    <label>Team Name</label><br>
                    <input style="text-align:center" type="text" class = "field" name = "Tname" value="<?php echo $row_info['team_name']?>" required>  
                </div>
                <br>
        
                <div>
                    <label>Date</label><br>
                    <input style="text-align:center" type="date" class = "field" name = "date" value="<?php echo $row_info['date_established']?>" required>
                </div>
                <br>

                <div>
                    <label>Wins</label><br>
                    <input style="text-align:center" type="text" class = "field" name = "Wins" value="<?php echo $row_info['wins']?>" required>  
                </div>
                <br>

                <div>
                    <label>Loses</label><br>
                    <input style="text-align:center" type="text" class = "field" name = "Lose" value="<?php echo $row_info['lose']?>" required>  
                </div>
                <br>

                <div>
                    <label>Kills</label><br>
                    <input style="text-align:center" type="text" class = "field" name = "Kills" value="<?php echo $row_info['kills']?>" required>  
                </div>
                <br>

                <div>
                    <label>Deaths</label><br>
                    <input style="text-align:center" type="text" class = "field" name = "Deaths" value="<?php echo $row_info['deaths']?>" required>  
                </div>
                <br>

                <div>
                    <label>Assists</label><br>
                    <input style="text-align:center" type="text" class = "field" name = "Assists" value="<?php echo $row_info['assists']?>" required>  
                </div>
                <br>

                <div>
                    <label>Towers</label><br>
                    <input style="text-align:center" type="text" class = "field" name = "Towers" value="<?php echo $row_info['towers']?>" required>  
                </div>
                <br>

                <br>
                <div style="padding-left: 150px;">
                    <input class="button" type="submit" value="Update">
                </div>
                
            </form>

            </div>
    </div>

    <?php
    $conn->close();
    ?>
    
</body>
</html>