<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="adm.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin index</title>
</head>
<body>
    <div class="container">
        <header>
            <h2>Admin Panel</h2>
            <ul>
            <li><a href="">view</a></li><br><br><br><br>
                <li><a href="">update</a></li><br><br><br><br>

                

                <li><a href="">notify</a></li><br><br><br><br>
            </ul>
        </header>

    </div>
    <table border='2'>
        <th>name</th>
        <th>email</th>
        <th>role</th>
        <th colspan='2'>operation</th>
        <?php
        include('conn.php');
        $select="SELECT * FROM users WHERE role=student";
        $query=mysqli_query($conn,$select);
        while ($row=mysqli_fetch_assoc($query)) {
            
        ?>
        <tr>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['role'];?></td>
            <td><a href="">edit</a></td>
            <td><a href="">delete</a></td>
        </tr>

        <?php
        }?> 

    </table>
   
</body> 
</html>         