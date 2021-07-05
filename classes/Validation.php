<?php

namespace app;

class Validation
{
    public function validation()
    {
    
            if (isset($_GET['error'])) {

                $error = $_GET['error'];
            if ($error == 'fillallfields') {
                echo "<div class='text-danger fs-4 mb-3'><p class='fs-4'>Fill all fields.</p></div>";
            }

            if ($error == 'lettersonly') {
                echo "<div class='text-danger fs-4 mb-3'><p class='fs-4'>Use only letters in name.</p></div>";
            }

            if ($error == 'number') {
                echo "<div class='text-danger fs-4 mb-3'><p class='fs-4'>Use only numbers where number should be.</p></div>";
            }

            if ($error == 'sku') {
                echo "<div class='text-danger fs-4 mb-3'><p class='fs-4'>Sku is already registered. Use unique sku</p></div>";
            }

            if (!$error) {
                echo '';
            }
        }

    }
}