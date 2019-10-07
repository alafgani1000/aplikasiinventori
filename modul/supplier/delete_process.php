<?php
session_start();
include "../../koneksi.php";
include "../function/functions.php";

if(isset($_POST['delete']) && $_POST['delete'] == "supplier"){
    $id = $_POST['id'];

    $insert = mysqli_query($conn,
        "delete from supplier where  id_supllier = '$id'"
    );

    if($insert)
    {
        echo "Data Customer Berhasil dihapus!.";
    }
    else {
        echo "Proses Gagal";
    }
}
?>