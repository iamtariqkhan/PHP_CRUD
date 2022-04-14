<?php
    include_once('dbconfig.php');
    $search = $_POST['search'] ?? '';
    if($search){
        $statement = $pdo->prepare("SELECT * FROM items WHERE item_name LIKE :item_name ORDER BY id DESC");
        $statement->bindValue(':item_name', "%$search%");
    //     $statement = $pdo->prepare('SELECT * FROM product WHERE title LIKE :title ORDER BY create_date DESC');  
    //   $statement->bindValue(':title', "%$search%");
    }else{
        $statement = $pdo->prepare("SELECT * FROM items ORDER BY id DESC");
    }
    $statement->execute();
    $items = $statement->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($items);
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
            margin:20px;
        }
        table{
            margin-top:20px;
            margin-left:40px;
            width:90%;
            text-align:center;
        }
    tr, td, th{
        border: 2px solid black;
        padding:5px;
    }
    table tr:nth-child(even){
        background-color:#edebe4;
    }
    #search{
        background:url("icon/search.svg") no-repeat 10px 10px;
        /* background-position: 10px 10px; */
        box-sizing:border-Box;
        border-radius:0px;
        padding: 5px 35px;
        outline:none;
        border:none;
        border: 1px solid red;
    }
    #search:focus{
        background-color:#edebe4;
    }
    </style>
</head>
<body>
    <div class="wrapper">
    <h1 align="center">Products Crud Application</h1>
        <a href="create.php" type="button" class="btn btn-success">Create Product</a>
       <form method="POST" style="margin-top:10px;">
    <div class="input-group mb-3">
      <input type="text" class="form-control" id="search" placeholder="Search Product" name="search" value="<?php echo $search; ?>">
      <div class="input-group-append">
        <button type="submit" class="btn btn-success" id="basic-addon2">Search</button>
      </div>
    </div>
</form>
        <table>
        <tbody>
        <tr>
            <th>S.No.</th>
            <th>Product</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Created Date</th>
            <th>Action</th>
        </tr>
        <?php foreach($items as $i=>$item): ?>
        <tr>
            <td><?php echo $i+1; ?></td>
            <td><?php echo $item['item_name']; ?></td>
            <td><img src="<?php echo $item['item_image']; ?>" height="60" width="60"></td>
            <td><?php echo $item['item_desc']; ?></td>
            <td><?php echo $item['item_price']; ?></td>
            <td><?php echo $item['create_date']; ?></td>
            <td>
            <a href="update.php?id=<?php echo $item['id']; ?>" type="button" class="btn btn-sm btn-primary">Edit</a>
            <form action="delete.php" method="POST" style="display:inline-block;">
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
            <input type="submit" class="btn btn-sm btn-danger" name="submit" value="Delete">
            </form>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    
</body>
</html>