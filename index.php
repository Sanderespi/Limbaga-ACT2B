<?php
include("config.php");
include("firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Firebase RDB CRUD</title>
    <style>
        body{
            background-image: url("https://i1.wp.com/www.snapshotsandmythoughts.com/wp-content/uploads/2020/06/Ice-Cream-Party-Featured-Image.jpg?fit=3575%2C2696&ssl=1");
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
        }

        #form{
            background-color: transparent;
            width:50%;
            border-radius: 4px;
            margin: 250px auto;
            padding:50px;
        }

        @media screen and (max-width: 570px) {
            #form {
            width: 65%;
            margin-left:none;
            padding:40px;
            }
        }
        table{
            border: 1;
            width: 85%;
        }
        td{
            text-align: center;
            vertical-align: center;
        }
        img{
            max-width: 100px;
        }
        
    </style>
</head>
<body>
    <div id="form">
        <center><h1 style = "font-family : Calibri; color : indigo">Ice Cream Flavors</h1></center>
        <form name="form" action="add.php" onsubmit="return isvalid()" method="POST">
            <a href="add.php" ><button style = "font-size : 18px; background-color: skyblue">Add</button></a><br><br>
            <center><table style = "font-size : 20px; font-family : Calibri" border="1" width="500">
            <tr align = "center" bgcolor = "#da4191" >
                <td><b>Photo</td>
                <td><b>Flavor</td>
                <td><b>Price</td>
                <td><b>Size</td>
                <td style="width:25%" colspan="2"><b>Action</td>
            </tr>
            <?php
            $data = $db->retrieve("film");
            $data = json_decode($data, 1);
            
            if(is_array($data)){
                foreach($data as $id => $film){
                    echo "<tr>
                    <td><img src='{$film['thumbnail']}'></td>
                    <td>{$film['title']}</td>
                    <td>{$film['year']}</td>
                    <td>{$film['rating']}</td>
                    <td><a href='edit.php?id=$id' class='btn btn-primary' role='button' >Edit</a></td>
                    <td><a href='delete.php?id=$id' class='btn btn-primary' role='button'>Delete</a></td>
                </tr>";
                }
            }
            ?>
            </table>
        </center>
        </form>
    </div>
</body>
</html>