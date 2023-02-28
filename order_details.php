<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchen Odisha Order Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .details{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        ul {
            padding: 10px;
            display: grid;
            justify-content: center;
            align-content: center;
            position: relative;
            top: 5vh;
            border: 2px solid white;
        }
        li {
            padding:10px;
            color: white;
            font-family:'Times New Roman', Times, serif;
            font-weight: 500;
        }
    </style>
</head>

<body class="bg-gray-900">
    <?php
    include 'header.php';
    ?>
    <hr>
    <?php
        $conn=mysqli_connect('localhost','root','','order_details') or die("No Connection");

        $query="select * from order_table where id=(select max(id) from order_table)";

        $res=mysqli_query($conn,$query) or die("Query Not Executed");
    ?>
    <div class="details">
        <?php
            while($row=mysqli_fetch_assoc($res)){
        ?>
        <ul>
            <h1 style="color: white; text-align:center; font-weight: 700; ">Order Details </h1>
            <br>
            <hr>
          
            <br>
            <li style="color: white;">Order Id : <?php echo $row['id']; ?></li>
            <li style="color: white;">Person Name : <?php echo $row['fname']; ?></li>
            <li style="color: white;">Gmail  : <?php echo $row['gmail']; ?></li>
            <li style="color: white;">State : <?php echo $row['state']; ?></li>
            <li style="color: white;">City : <?php echo $row['chity']; ?></li>
            <li style="color: white;">Zip : <?php echo $row['zip']; ?></li>
            <li style="color: white;">Order name : <?php echo $row['phno']; ?></li>
            <li style="color: white;">Order Price : <?php echo $row['order_name']; ?></li>
            <li style="color: white;">Order Price : <span id="pay"></span></li>
        </ul>
        <?php  } ?>
    </div>

    <?php
    include 'log_in.php'
    ?>

</body>
<script>
    document.getElementById("pay").innerText = localStorage.getItem("order_price");
</script>

</html>