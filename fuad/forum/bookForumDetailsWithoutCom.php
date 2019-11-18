<?php
    session_start();
    require_once("../dbfiles/db.php");
    if(!isset($_SESSION['index_login_email']))
    {
        header('location: ../index.php');
        exit;
    }
?>

<html>
<head>
    <title>Forum</title>
</head>
<body>
    <table width="99%" border="1">
    <!-- navbar table -->
        <tr>
            <td><h2> <a href="../forum/forumHome.php">bookAbook</a></h2></td>
            <td>
                <form action="" method="get">
                    <input type="search" name="search" placeholder="Search forum" id="">
                </form>
            </td>
            <td>
                <form action="forumHandler.php" method="post">
                    <input type="submit" value="Create a forum" name="forumCreate">
                </form>
            </td>
            <td>
                <?php
                    $sql = "select * from user_login where email = '".$_SESSION['index_login_email']."'";
                    $result = get_result($sql);
                    $row = mysqli_fetch_assoc($result);
                    echo $row['name'];
                ?>
            </td>
            <td>
            <a href="../index.php">Sign out</a>
            <!-- <form action="">
                    <select name="" id="">
                        <option value="settings">Settings</option>
                        <option value="logout">  </option>
                    </select>
                </form> -->
            </td>
        </tr>
    </table>
    <!-- end of navbar table -->
    <!-- main body -->
    <table width="99%" border="1">
        <tr>
            <td>
                <!-- menu cell -->
                <form action="forumHandler.php" method="post">
                    <input type="submit" value="Home" name="home"> <br>
                    <input type="submit" value="My forums" name="myfor"> <br>
                    <input type="submit" value="Joined forums" name="myJoinedfor"> <br>
                    <input type="submit" value="Notifications" name="noti"> <br>
                </form>
                <!-- end of menu cell -->
            </td>
            <td>
            <table>
                    <?php
                            $id = $_REQUEST['id'];
                            $sql = "select * from forum where ID =$id";
                            $result = get_result($sql);
                            $row = mysqli_fetch_assoc($result);
                            $book_Name = $row['book_title'];
                            $writer_Name = $row['author_name'];
                            $book_Edition = $row['book_edition'];
                            $forum_Body = $row['forum_body'];
                    ?>
                        <tr>
                            <td><h1><?= $book_Name ?></h1></td>
                        </tr>
                        
                        <tr>
                            <td><b><?= $writer_Name ?></b></td>
                            <td><b><?= $book_Edition ?></b></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <form action=<?="joinForumController.php?id=".$row['ID']?> method="post">
                                <td><input type="submit" value="Join Forum" name="joinFor"></td>
                            </form>
                        </tr>
                    </table>
                    <hr>
                    <table>
                        <tr>
                            <td>
                                <p><?= $forum_Body ?></p>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <hr>
                </form>
                <!-- end tiles -->
            </td>
            <td>
                <!-- ad -->
                <img src="pic1.jpg" alt="picture one">
                <br>
                <img src="pic2.jpg" alt="picture two">
            </td>
        </tr>
    </table>
</body>
</html>