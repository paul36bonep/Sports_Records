<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Records</title>
    <link rel="stylesheet" href="Teams.css">
</head>
<body>
    
    <div class = "menu-bar">
        <h1>Team Records</h1>
    </div>

    <div class="list">
    <a href="index.html"><button style="margin-left: 10px" class = button>Back</button></a>
    <h2 style="margin-left: 10px"></h2>
    <a href="NewTeam.php"><button class = button>Add New Team</button></a>
    </div>

    <div>
        <table class="styled-table">
            <thead>
                <tr class>
                    <th>Team ID</th>
                    <th>Team Name</th>
                    <th>Date Established</th>
                    <th>Wins</th>
                    <th>Loses</th>
                    <th>WR</th>
                    <th>Kills</th>
                    <th>Deaths</th>
                    <th>Assists</th>
                    <th>KDA</th>
                    <th>Towers</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "DBconnection.php";
                $sql = "SELECT * FROM team";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr class="active-row">
                        <th><?php echo $row['team_id'];?></th>
                        <th><?php echo $row['team_name'];?></th>
                        <th><?php echo $row['date_established'];?></th>
                        <th><?php echo $row['wins'];?></th>
                        <th><?php echo $row['lose'];?></th>
                        <th><?php if($row['lose'] + $row['wins'] == 0){
                                echo "0%";
                                }else{
                               echo ($row['wins']/($row['wins']+$row['lose'])*100) ."%";
                                }?>
                        </th>

                        <th><?php echo $row['kills'];?></th>
                        <th><?php echo $row['deaths'];?></th>
                        <th><?php echo $row['assists'];?></th>
                        <th><?php if($row['deaths']== 0){
                                   echo ($row['assists']+$row['kills']);
                                }else{
                                    echo ($row['assists']+$row['kills'])/$row['deaths'];
                                }
                        ?>
                        </th>
                        <th><?php echo $row['towers'];?></th>
                        <th><a href="UpdateTeam.php?id=<?php echo $row['team_id']; ?>" class="baby_button">Update</a></th>
                        <th><a href="DeleteTeam.php?id=<?php echo $row['team_id']; ?>" class="baby_button">Delete</a></th>
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