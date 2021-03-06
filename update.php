<?php
    session_start();
    include 'connect.php';
    if(!isset($_GET["id"])){
        header("location:view.php");
        exit();
    }
    $id = $_GET["id"];
    $getData = $connection -> query("SELECT *FROM product WHERE productID = ".$id);

    if($getData->num_rows==0){
        header("location:view.php");
        exit();
    }
    $getData=$getData -> fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Crud- Update</title>
</head>
<body>
    <a href="view.php"><button>BACK</button></a>
    <h1>Create Product</h1>
    <form action="doUpdateProduct.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <input type="hidden" name="id" value="<?=$_GET["id"]?>">
            <td>Product name</td>
            <td>:</td>
            <td><input type="text" name="productName" value="<?=$getData["productName"]?>"></td>
        </tr>
        <tr>
            <td>Product Description</td>
            <td>:</td>
            <td><textarea type="text" name="productDesc" value="<?=$getData["productDesc"]?>"></textarea></td>
        </tr>
        <tr>
            <td>Product Price</td>
            <td>:</td>
            <td><input type="number" name="productPrice" value="<?=$getData["productPrice"]?>"></td>
        </tr>
        <tr>
            <td>Product Image</td>
            <td>:</td>
            <td><input type="file" name="productImage"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button>Update Product</button></td>
        </tr>
    </table>
    </form>
    <?php
    if (isset($_SESSION["message"])){
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
    }
    ?>
</body>
</html>