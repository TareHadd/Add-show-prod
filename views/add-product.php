<?php

include("../vendor/autoload.php");
$products = new \app\Products();
$errors = new \app\Validation();

ob_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/style.css">
    <title>Document</title>
</head>



<body class="bg-dark">
    <nav class="nav-nav d-flex justify-content-between container align-items-center p-4 py-5" style="height: 50px;">
        <div class="left">
            <a class="text-light fs-4" style="margin-right: 50px; text-decoration: none;" href="#">Product add</a>
        </div>
        <div class=" px-2 py-1">
            <a href="index.php" class="btn btn-warning position-absolute cancel-btn">CANCEL</a>

        </div>
    </nav>
    <hr class="bg-light m-0">

  


    <main class="w-100 h-100">
        <div class="movies container w-100 h-100">
            <div class="row mt-5 justify-content-between">
                
                <div class="col-12  text-warning d-flex justify-content-center align-items-center mb-3" id="warning">
                
                </div>

                

                <div class="col-xxl-6 col-xl-6 col-lg-7 col-md-8 col-12 bg-scondary d-flex flex-column align-items-start text-light mb-3">
                    <form class="w-100" id="product_form" action="<?php $products->add(); ?>" method="post" >

                        <div id="error" class="text-danger fs-4"></div>
                        <?php
                        $errors->validation();
                        ?>


                        <div class="row mb-3">
                            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sku" name="sku">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="price" class="col-sm-2 col-form-label">Price ( $ )</label>
                            <div class="col-sm-10">
                                <input type="number" step="0.01" class="form-control" id="price" name="price">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" id="selectedValue" onchange="getSelectedValue();">
                                    <option selected value="0">Select type</option>
                                    <option value="1">DVD</option>
                                    <option value="2">Furniture</option>
                                    <option value="3">Book</option>
                                </select>
                            </div>

                        </div>




                        <div id="addhtml">

                        </div>



                    </form>
                </div>


                <script>
                    const dform = document.getElementById("product_form");
                    const name = document.getElementById("name");
                    const sku = document.getElementById("sku");
                    const price = document.getElementById("price");
                    const error = document.getElementById("error");

                    // const input = document.getElementById("input");
                    // const select = document.getElementById('selectedValue');
                    // console.log(select.value);

                    dform.addEventListener('submit', (e) => {
                        let messages = [];
                        if (name.value === '' || name.value == null) {
                            messages.push('Name is required');
                        }

                        if (sku.value === '' || sku.value == null) {
                            messages.push('Sku is required');
                        }

                        if (price.value === '' || price.value == null) {
                            messages.push('Price is required');
                        }

                        if (messages.length > 0) {
                            e.preventDefault();
                            error.innerText = messages.join('\n');
                            document.getElementById("warning").innerHTML="<i class='fas fa-exclamation-triangle mx-1 fa-5x'></i>"
                        }
                    });

                    const sel = document.getElementById("selectedValue");
                    if (sel.value == 0)
                    {
                    }
                </script>

            </div>
        </div>
    </main>

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
    <script src="../includes/index.js"></script>




</body>

</html>