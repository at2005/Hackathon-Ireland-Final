<html>
    <body>
        <link rel="stylesheet" href="../CSS/home.css"></link>
        <?php
        include "../connectdb.php";
        $connection = connectdb();
        $fetch_causes_query = "SELECT * FROM organization";
        $causes = mysqli_query($connection, $fetch_causes_query) or die(mysqli_error($connection));

        while($row = mysqli_fetch_row($causes)) {
            echo "
            <div class = 'notifs'>
                <p>Cause: $row[0]</p>
                <p>Info: $row[3]</p>
                <form action='cell.php' method='POST'>
                <button type='submit' name='org_name' class='ad' value='$row[0]'>Join</button>
                </form>
            </div>
            ";             
        }

        mysqli_close($connection);

        ?> 
    </body>
</html>