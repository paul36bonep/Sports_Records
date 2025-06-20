<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Registration</title>
    <link rel="stylesheet" href="NewPlayer.css">
</head>
<body>
    <div><a href="Teams.php"><button class="button">Cancel</button></a></div>
    <div class="parent">
        <div class = "child">

            <form action="NewTeamget.php" method="post">

                <div>
                    <label>Team Name</label><br><br>
                    <input type="text"  class = "field" name = "Tname" required>
                </div>
                <br>
        
                <div>
                    <label>Date of Registration</label><br><br>
                    <input style="text-align: center;" type="date"  class = "field" name = "date" required>
                </div>
                <br><br>
        
                <div style="margin-left: 150px;">
                    <input class="button" type="submit" value="Register">
                </div>
               
            </form>

        </div>
    </div>
</body>
</html>