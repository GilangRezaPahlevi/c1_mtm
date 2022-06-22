<?php
include "f.php";
if (isset($_POST['new_user'])) {
    if (new_user($_POST) == 0) {
        echo 'ok';
    }
}

$conn = koneksi();
$con = "SELECT * FROM user";
$result = mysqli_query($conn, $con);

$con = kone();
$sql = "SELECT * FROM category";
$statement = $con->prepare($sql);
$statement->execute();
$cate = $statement->fetchAll();
$sql2 = "SELECT id FROM user ORDER BY id DESC LIMIT 1";
$statemen = $con->prepare($sql2);
$statemen->execute();
$us = $statemen->fetchAll();

if (isset($_GET['add'])) {

    if ($_GET['add'] == 'berhasil') {
        echo "<div class='alert alert-success'><strong>Berhasil!</strong> File gambar telah diupload!</div>";
    } else if ($_GET['add'] == 'gagal') {
        echo "<div class='alert alert-danger'><strong>Gagal!</strong> File gambar gagal diupload!</div>";
    }
}

if (isset($_GET['hapus'])) {

    if ($_GET['hapus'] == 'berhasil') {
        echo "<div class='alert alert-success'><strong>Berhasil!</strong> File gambar telah dihapus!</div>";
    } else if ($_GET['hapus'] == 'gagal') {
        echo "<div class='alert alert-danger'><strong>Gagal!</strong> File gambar gagal dihapus!</div>";
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
    <title>user</title>
</head>

<body>
    <form action="" method="post">
        <label for="name" class="fs-5 m-5 mb-0">New User</label><br>
        <input type="text" name="name" id="" class="m-5 me-0"><br>
        <?php if (mysqli_num_rows($result) == 0) : ?>
            <input type="checkbox" name="id_user" id="" value="1" checked style="display:none ;">
        <?php else : ?>
            <input type="checkbox" name="id_user" id="" value="<?= $us[0]['id'] + 1 ?>" checked style="display:none ;">
        <?php endif ?>
        <?php foreach ($cate as $c) : ?>
            <label for="id_cate"><?= $c['category'] ?></label>
            <input type="checkbox" name="id_cate[]" id="" value="<?= $c['id'] ?>"><br>
        <?php endforeach ?>

        <p><?= $us[0]['id'] + 1 ?></p>
        <button type="submit" name="new_user" class="fs-1">Tambah</button>
    </form>
</body>

</html>