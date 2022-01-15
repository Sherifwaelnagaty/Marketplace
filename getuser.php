<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="container">
<table class="table table-hover">
<thead>
    <tr>
    <th>FirstName</th>
    <th>LastName</th>
    <th>Address</th>
    <th>Email</th>
    <th>MobileNumber</th>
    <th>Delete</th>
    </tr>
</thead>
<?php 
    $servername = "localhost";
    $un = "root";
    $password = "";
    $DB = "web project";

    $conn = new mysqli($servername, $un, $password, $DB);
    $sql="SELECT * FROM users WHERE Types='".$_GET['id']."'";
    $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){?>
                <tbody>
                    <tr>
                        <td><?php echo $row['FirstName'];?></td>
                        <td><?php echo $row['LastName'];?></td>
                        <td><?php echo $row['Address'];?></td>
                        <td><?php echo $row['Email'];?></td>
                        <td><?php echo $row['MobileNumber'];?></td>
                        <td><a href="Delete.php?id=<?php echo $row['userID'];?>">Delete</a></td>
                    <?php }?>
                    </tr>
                </tbody>
            </table>
            