<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Records</title>
    <link rel="stylesheet" href="Players.css">
</head>
<body>
    
    <div class = "menu-bar">
        <h1>Player Record</h1>
    </div>

    <div class="list">
        <a href="index.html"><button  style="margin-left:10px" class = button>Back</button></a>
        <h2 style="margin-left: 10px"></h2>
        <a href="NewPlayer.php"><button class = button>Add New Player</button></a>
    </div>

    <div>
        <table class="styled-table">
            <thead>
                <tr class>
                    <th>Player ID</th>
                    <th>Team ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>In-game</th>
                    <th>Position</th>
                    <th>Kills</th>
                    <th>Deaths</th>
                    <th>Assists</th>
                    <th>KDA</th>
                    <th>Update</th>
                    <th>Delete</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                include "DBconnection.php";
                $sql = "SELECT * FROM player";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr class="active-row">
                        <th><?php echo $row['player_id'];?></th>
                        <th><?php echo $row['team_id'];?></th>
                        <th><?php echo $row['full_name'];?></th>
                        <th><?php echo $row['age'];?></th>
                        <th><?php echo $row['ign'];?></th>
                        <th><?php echo $row['position'];?></th>
                        <th><?php echo $row['kills'];?></th>
                        <th><?php echo $row['deaths'];?></th>
                        <th><?php echo $row['assists'];?></th>
                        <th><?php if($row['deaths']==0){
                                   echo ($row['assists']+$row['kills']);
                                }else{
                                    echo ($row['assists']+$row['kills'])/$row['deaths'];
                                }
                        ?>
                        </th>
                        <th><a href="UpdatePlayer.php?id=<?php echo $row['player_id']; ?>" class="baby_button">Update</a></th>
                        <th><a href="DeletePlayer.php?id=<?php echo $row['player_id']; ?>" class="baby_button">Delete</a></th>
                    </tr>
                <?php
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>    

</body>
</html>   