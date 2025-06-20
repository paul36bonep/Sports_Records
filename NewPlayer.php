<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Registration</title>
    <link rel="stylesheet" href="NewPlayer.css">

</head>
<body>
    <div><a href="Players.php"><button class="button">Cancel</button></a></div>
    <div class="parent">
        <div class = "child">

            <form action="NewPlayerget.php" method="post">

                <div>
                    <label>Full Name</label><br>
                    <input type="text"  class = "field" name = "Pname" required>  
                </div>
                <br>
        
                <div>
                    <label>Team</label><br>
                    <select style="text-align: center;" type="text" name = "Tname" required>
                    <?php
                    include "DBconnection.php";
                    $sql ="SELECT * FROM team";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $val = $row['team_name'];
                        $num = $row['team_id'];
                        echo '<option value="'.$num.'">'. $val.'</option>';
                    }
                    $conn->close();
                    ?>
                    </select>
                </div>
                <br>
        
                <div>
                    <label>In-game Name</label><br>
                    <input type="text" class = "field" name = "IGN" required>
                </div>
                <br>
        
                <div>
                    <label>Age</label><br>
                    <input type="text" class = "field" name = "Age" required>
                </div>
                <br>
        
                <div>
                    <label>Position/Role</label><br>
                    <select style="text-align: center;" name="position" required>
                        <option value="Top Lane">Top Lane</option>
                        <option value="Mid Lane">Mid Lane</option>
                        <option value="Bottom Lane">Bottom Lane</option>
                        <option value="Support">Support</option>
                        <option value="Jungler">Jungler</option>
                    </select>
                </div>
                <br><br>

                <div class ="for-buttons">
                    <h1></h1>
                    <input class="button" type="submit" value="Register">
                    <h1></h1>
                </div>
                <br>
                
            </form>
        </div>
    </div>
    
    
</body>
</html>