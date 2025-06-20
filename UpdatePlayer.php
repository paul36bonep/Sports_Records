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
            $pname = $_POST['Pname'];
            $tname = $_POST['Tname'];
            $ign = $_POST['IGN'];
            $age = $_POST['Age'];
            $position = $_POST['position'];
            $kills = $_POST['Kills'];
            $deaths = $_POST['Deaths'];
            $assists = $_POST['Assists'];
    
            $sql_update = "UPDATE player SET full_name = '$pname', team_id = $tname, age = $age, ign = '$ign'
            , position = '$position', kills = $kills, deaths = $deaths, assists = $assists
             WHERE player_id = $id";  
  
            $update_query = mysqli_query($conn,$sql_update);
            header("location:Players.php");
        }
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];

    }

    $sql_info = "SELECT * FROM player WHERE player_id = $id";
    $result_info = mysqli_query($conn, $sql_info);
    $row_info = mysqli_fetch_assoc($result_info);

    $team_id = $row_info['team_id'];
    $sql_team_id = "SELECT * FROM team WHERE 'team_id' = $team_id";
    $result_team_id = mysqli_query($conn, $sql_team_id);
    $row_team_id = mysqli_fetch_assoc($result_team_id);

    ?>
<div><a href="Players.php"><button class="button">Cancel</button></a></div>
<div class="parent">
        <div class = "child">
            <form action="UpdatePlayer.php?id=<?php echo $row_info['player_id'];?>" method="post">

                <div>
                    <label>Full Name</label><br>
                    <input type="text" class = "field" name = "Pname" value="<?php echo $row_info['full_name']?>" required>  
                </div>
                <br>
        
                <div>
                    <label>Team</label><br>
                    <select style="text-align: center;" type="text" name = "Tname" value="<?php echo $row_team_id['team_name']?></select>" required>
                    <?php
                    $sql_team ="SELECT * FROM team";
                    $result = mysqli_query($conn,$sql_team);
                    while($row = mysqli_fetch_assoc($result)){
                        $val = $row['team_name'];
                        $num = $row['team_id'];
                        echo '<option value="'.$num.'">'. $val.'</option>';
                    }
                    
                    ?>
                    </select>
                </div>
                <br>
        
                <div>
                    <label>In-game Name</label><br>
                    <input type="text" class = "field" name = "IGN" value="<?php echo $row_info['ign']?>" required>
                </div>
                <br>
        
                <div>
                    <label>Age</label><br>
                    <input type="text" class = "field" name = "Age" value="<?php echo $row_info['age']?>" required>
                </div>
                <br>
        
                <div>
                    <label>Position/Role</label><br>
                    <select style="text-align: center;" name="position"  value="<?php echo $row_info['position']?>" required>
                        <option value="Top Lane">Top Lane</option>
                        <option value="Mid Lane">Mid Lane</option>
                        <option value="Bottom Lane">Bottom Lane</option>
                        <option value="Support">Support</option>
                        <option value="Jungler">Jungler</option>
                    </select>
                </div>
                <br>

                <div>
                    <label>Kills</label><br>
                    <input type="text" class = "field" name = "Kills" value="<?php echo $row_info['kills']?>" required>
                </div>
                <br>

                <div>
                    <label>Deaths</label><br>
                    <input type="text" class = "field" name = "Deaths" value="<?php echo $row_info['deaths']?>" required>
                </div>
                <br>

                <div>
                    <label>Assists</label><br>
                    <input type="text" class = "field" name = "Assists" value="<?php echo $row_info['assists']?>" required>
                </div>
                <br><br>

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