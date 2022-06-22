<?php
include "f.php";
if (isset($_POST['new_category'])) {
    if (new_category($_POST) == 0) {
        echo "ok";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="category" class="m-5 mb-0 fs-5">New Category</label><br>
        <input type="text" name="category" id="" class="m-5 me-0">
        <button type="submit" name="new_category">Tambah</button>
    </form>
</body>

</html>