<?php

include("../vendor/autoload.php");
$products = new \app\Products();
$delete = new \app\Delete();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>Test</title>
</head>


<body class="bg-dark">
    <nav class="nav-nav d-flex justify-content-between container align-items-center p-4 py-5" style="height: 50px;">
        <div class="left">
            <a class="text-light fs-4" style="margin-right: 50px; text-decoration: none;" href="#">Product list</a>
        </div>
        <div class=" px-2 py-1">
            <a href="add-product.php" class="btn btn-primary position-absolute add-btn">ADD</a>
        </div>
      
    </nav>
    <hr class="bg-light m-0">

   

    <form action="<?php $delete->delete(); ?>" method="post">
        <main class="w-100">
        <div class=" container w-100 h-100">
            <div class="row mt-5 justify-content-center d-flex">
                <?php foreach ($products->getProducts() as $product) : ?>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-10 position-relative m-4 p-0 border col-prod rounded d-flex justify-content-center align-items-center" style="height: fit-content; cursor: pointer;">

                        
                            <div class="form-check position-absolute m-2 top-0 start-0">
                                <input class="form-check-input" name="checkbox[]" type="checkbox" value="<?php echo $product['id'] ?>">
                            </div>
                        
                        <a href="#" class="text-decoration-none d-flex flex-column align-items-center py-2">
                            <h4 class="text-light mt-2 mb-1 fs-4">SKU: <?php echo $product['sku'] ?></h4>
                            <p class="text-light m-0 fs-5 fw-light">NAME: <?php echo $product['name'] ?></p>
                            <p class="text-light fs-5 fw-light">PRICE: <?php echo $product['price'] ?> $</p>
                            <p class="text-light fs-5 fw-light"><?php echo $product['details'] ?></p>
                            <!-- <p class="text-light fs-6 fw-light">SIZE: <?php // ech $product['size'] 
                                                                            ?> MB</p> -->
                        </a>
                    </div>

                <?php endforeach; ?>
                <div class="d-flex">
                <button type="submit" name="delete" class="btn btn-danger position-absolute delete-btn">MASS DELETE</button>
                </div>


            </div>

        </div>

        </div>

    </main>
</form>

    <!-- FOOTER  -->
    <footer style="height: 100px;">
        <div class="d-flex justify-content-center align-items-baseline text-light h-100">
            <p class="mt-auto">Scandiweb Test assignment</p>
        </div>
    </footer>

    <script>
        function openClose() {

            document.getElementById("toggle").classList.toggle("open");

        }
    </script>

</body>

</html>