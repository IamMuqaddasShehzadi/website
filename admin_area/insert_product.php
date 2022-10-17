<?php

include('../includes/connect.php');
if (isset($_POST['insert_product'])) {


    $product_title = $_POST['product_title'];
    $description_title = $_POST['description_title'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';
    //access images
    // $product_image1 = $_FILES['product_image1']['name'];
    // $product_image2 = $_FILES['product_image2']['name'];
    // $product_image3 = $_FILES['product_image3']['name'];
    // //access image tmp name
    // $product_image1 = $_FILES['product_image1']['tmp_name'];
    // $product_image2 = $_FILES['product_image2']['tmp_name'];
    // $product_image3 = $_FILES['product_image3']['tmp_name'];

    // move_uploaded_file($temp_image1, "product_images/".$product_image1);
    // move_uploaded_file($temp_image2, "product_images/".$product_image2);
    // move_uploaded_file($temp_image3, "product_images/".$product_image3);
$date=date('Y-m-d');
    //insert Query
    $insert_products = "insert into products  (product_title,product_description,product_keywords,category_id,
    brand_id,product_image1,product_image2,product_image3,product_price,date,status) 
    values ('title','description','keyword','5','2',
    'abc.png','abc.png','abc.png','$product_price','$date','$product_status')";
    $result_query = mysqli_query($con, $insert_products);
    if ($result_query) {
        echo "successfully inserted the products";
    }else{
        echo mysqli_error($con); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- //form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- //title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>
            <!-- //description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Description title</label>
                <input type="text" name="description_title" id="description_title" class="form-control" placeholder="Enter description title" autocomplete="off" required="required">
            </div>
            <!-- //keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keyword</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product Keywords" autocomplete="off" required="required">
            </div>

            <!-- //categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                    $select_query = "Select * from categories";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                    <!-- <option value="">Category1</option>
    <option value="">Category2</option>
    <option value="">Category3</option>
    <option value="">Category4</option> -->

                </select>
            </div>

            <!-- //brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select a Brands</option>
                    <?php
                    $select_query = "Select * from brands";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                    <!-- <option value="">Select a Brands</option>
    <option value="">Brands1</option>
    <option value="">Brands2</option>
    <option value="">Brands3</option>
    <option value="">Brands4</option> -->
                </select>
            </div>
            <!-- //image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
            <!-- //image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            <!-- //image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
            <!-- //price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <!-- //button-->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>




        </form>

    </div>














</body>

</html>