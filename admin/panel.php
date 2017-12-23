<!DOCTYPE html>
<html>
<head>
    <title>
        Admin Panel
    </title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
</head>
<body>
<div class="container ">
    <h2>Welcome to An Admin Panel!</h2>
    <a href="addItem.html">
        <button class="button button2">
            Add an Item
        </button>
    </a>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Photo</th>
            <th>Category</th>
            <th>Description</th>
            <th>Price</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $link = mysqli_connect("127.0.0.1", "root", "", "web_project");
        if (!$link) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        $sql="SELECT * FROM items";
        $result=mysqli_query($link,$sql);
        // Numeric array
        $items=mysqli_fetch_all($result,MYSQLI_ASSOC);

            foreach ($items as $item) {
                echo '
                    <tr>
                        <td><img src="../' . $item["photoUrl"] . '" alt="" style="width:80px; height: 70px"></td>
                        <td><p>' . $item["category_id"] . '</p></td>
                        <td><p>' . $item["description"] . '</p></td>
                        <td><p>' . $item["price"] . '</p></td>
                        <td>
                        <form action="delete.php">
                            <input type="hidden" name="item_delete_id" value="'.$item["id"].'">
                            <button type="submit" class="button button3">
                                X
                            </button>
                        </form>
                        </td>
                    </tr>
                ';
            }




        mysqli_close($link);

        ?>
        </tbody>
    </table>
</div>

</body>
</html>
