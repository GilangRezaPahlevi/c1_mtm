<?php

function koneksi()
{
    $koneksi = mysqli_connect('localhost', 'root', '', 'db_many_to_many');
    return $koneksi;
}
function konek()
{
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "db_many_to_many";

    $kon = mysqli_connect($host, $user, $password, $db);
    if (!$kon) {
        die("Koneksi gagal:" . mysqli_connect_error());
    }
    return $kon;
}

function query($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $query);
    // jika hasilnya hanya 1 data

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function kone()
{
    $cone = new PDO("mysql:host=localhost;dbname=db_many_to_many", "root", "");
    return $cone;
}

function new_user($data)
{
    $kon = konek();
    $con = kone();
    $name = htmlspecialchars($data['name']);
    $id_ca = $data['id_cate'];
    $c = count($id_ca);



    $q = "INSERT INTO user (nama) VALUES ('$name')";

    $s = mysqli_query($kon, $q);
    $sql2 = query("SELECT id FROM user ORDER BY id DESC LIMIT 1");
    $p = $sql2['id'];

    for ($i = 0; $i < $c; $i++) {
        $s = mysqli_query($kon, "INSERT INTO penghubung (id_category,id_user) VALUES ('$id_ca[$i]','$p')");
    }
    if ($s) {
        echo "<script>document.location.href='index.php'</script>";
    } else {
        echo "Error";
    }
    echo mysqli_error($kon);
    return mysqli_affected_rows($kon);
    // var_dump($sql2['id']);
    // die;
}
function new_category($data)
{
    $kon = koneksi();
    $name = htmlspecialchars($data['category']);

    $qu = "INSERT INTO category VALUES (null,'$name')";

    // $simpan_bank = mysqli_query($kon, $q);
    // if ($simpan_bank) {
    //     header("Location:index.php?add=berhasil");
    // } else {
    //     header("Location:index.php?add=gagal");
    // }

    mysqli_query($kon, $qu) or die(mysqli_error($kon));
    echo mysqli_error($kon);
    return mysqli_affected_rows($kon);
}
