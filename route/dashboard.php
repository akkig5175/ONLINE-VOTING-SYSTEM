<?php 
    session_start();

    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['Status'] == 0){
        $status = '<b style= "color: red" >Not voted</b>';
    }
    else{
        $status = '<b style = "color: green"> Voted </b>';
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title> Online Voting System - Dashboard </title>
    <link rel = "stylesheet" href = "../css/stylesheet.css">
</head>

<body>

    <style>
        #backbtn{
            padding : 5px;
            font-size : 15px;
            background-color: #3498db;
            border-radius: 5px;
            float: left;
        }
        #logoutbtn{
            padding : 5px;
            font-size : 15px;
            background-color: #3498db;
            border-radius: 5px;
            float: right;
        }
        #Profile{
            text-align: left;
            background-color: white;
            width: 30%;
            padding: 2%;
        }
        #Group{
            text-align:left;
            background-color: white;
            width: 60%;
            padding 10%;
            float: right;
        }
        #votesbtn{
            padding:n 5px;
            font-size: 10px;
            background-color: #3498db;
            color: white;
            border-radius:5px;
        }
        #voted{
            padding:n 5px;
            font-size: 10px;
            background-color: green;
            color: white;
            border-radius:5px;
        }

    </style>

    <div id = "mainsection">
        <div id = " headersession">
            <a href = "../"><button id = "backbtn">Back</button></a>
            <a href = "../api/logout.php"><button id = "logoutbtn">logout</button></a>
            <h1 style="text-align: center;">Online Voting System</h1>
        </div>
        <hr>    
        <div id="Group">
            <?php
                if($_SESSION['groupsdata']) {
                    for($i = 0; $i <count($groupsdata); $i++){
                        ?>
                        <div>
                            <img style = "float : right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height = "100">                            <b>Group Name: <?php echo $groupsdata[$i]['Name']?> </b><br><br>
                            <b>Votes:<?php echo $groupsdata[$i]['Votes']?></b><br><br>
                            <form action="../api/vote.php" method = "POST">
                                <input type="hidden" name = "gvotes" value = "<?php echo $groupsdata[$i]['Votes'] ?>">
                                <input type="hidden" name = "gid" value = "<?php echo $groupsdata[$i]['Id'] ?>">
                                <?php 
                                    if($_SESSION['userdata']['Status']==0){
                                        ?>
                                        <input type="submit" name = "votesbtn" value = "Vote" id ="votebtn">
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <button disabled type = "button" name = "votesbtn" value = "Vote" id ="voted">Voted</button>
                                        <?php
                                    }
                                ?>
                                
                            </form>
                        </div>
                        <?php
                    }
                }
                else{

                }
            ?>
    
        </div>

        <div id="Profile">
            <center><img src="../uploads/<?php echo $userdata['photo'] ?>" height = "100"></center><br><br>
            <b>Name:</b><?php echo $userdata['Name'] ?><br><br>
            <b>Mobile:</b><?php echo $userdata['Mobile'] ?><br><br>
            <b>Address:</b><?php echo $userdata['Address'] ?><br><br>
            <b>Status:</b><?php echo $status?><br><br>
        </div>
    </div>
</body>

</html>
