<?php
    include_once('dbconfig.php');
    $id = $_GET['id']??null;
    if(!$id)
    {
        header('Location:index.php');
        exit;
    }
        $statement = $pdo->prepare('SELECT * FROM items WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
        $items = $statement->fetch(PDO::FETCH_ASSOC);
        
        // $image = $items['item_image'];
        $name = $items['item_name'];
        $desc = $items['item_desc'];
        $price = $items['item_price'];
        $date = date('Y-m-d H:i:s');
        $errors = [];
    if($_SERVER['REQUEST_METHOD']==='POST')
    {
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        if(!$name)
        {
            $errors[] = "Please Enter the Item Name.";
        }
        if(!$price)
        {
            $errors[] = "Please Enter the Item Price.";
        }
        if(!is_dir('images'))
        {
            mkdir('images');
        }
        if(empty($errors))
        {
            $image = $_FILES['image'];
            $imagePath = $items['item_image'];
            if($image && $image['tmp_name'])
            {
                // if There is Existing Image, Then Delete it.
                if($items['item_image'])
                {
                    unlink($items['item_image']);
                }
                $imagePath = 'images/'.$image['name'];
                move_uploaded_file($image['tmp_name'], $imagePath);
            }
            $statement = $pdo->prepare("UPDATE items SET item_name = :item_name, item_image = :item_image, item_desc = :item_desc, item_price = :item_price, create_date = :create_date WHERE id = $id");
            $statement->bindValue(':item_name', $name);
            $statement->bindValue(':item_image', $imagePath);
            $statement->bindValue(':item_desc', $desc);
            $statement->bindValue(':item_price', $price);
            $statement->bindValue(':create_date', $date);
            $statement->execute();
            header('Location:index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>CRUD</title>
    <style>
        .wrapper{
            margin:10px;
        }
        .form-item{
            margin:20px;
        }
        .form-body{
            padding:10px;
            background-color:#edebe4;
            border-radius:5px;
            margin:10px;
        }
        input[type=text], textarea, button {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
       label {
            width: 100%;
            padding: 10px 10px;
            margin: 0px 0;
            /* display: inline-block; */
            /* border: 1px solid #ccc; */
            /* border-radius: 4px; */
            /* box-sizing: border-box; */
        }
    </style>
</head>
<body>
    <div class="wrapper">
    <h1 align="center">Update Item</h1>
    <a href="index.php" type="button" class="btn btn-success">Home</a>
    <br> <br>
    <?php if(!empty($errors)): ?>
            <div class="alert alert-danger">
                    <?php foreach($errors as $error): ?>         
                        <div><?php echo $error; ?></div>
                    <?php endforeach; ?>
            </div>
        <?php endif; ?>
       <div style="text-align:center;"><img style="border:1px solid black;" src="<?php echo $items['item_image']; ?>" width="100px" height="100px"></div>
    <div class="form-body">
    <form method="POST" class="form-item" enctype="multipart/form-data">
            <label>Upload Image</label>
            <input type="file" name="image">
            <label>Item Name</label>
            <input type="text" name="name" placeholder="Enter Item Name" value="<?php echo $name; ?>">


            <label>Description</label>
            <textarea name="desc" placeholder="Enter Description..." ><?php echo $desc; ?></textarea>

            <label>Price</label>
            <input type="number" step="0.01" name="price" value="<?php echo $price; ?>" placeholder="Enter Item Price">

        <button type="submit" class="btn btn-success" id="basic-addon2">Update Item</button>
    </form>
    </div>    
    </div>
</body>
</html>