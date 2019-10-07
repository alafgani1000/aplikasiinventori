<?php
session_start();
include "../../koneksi.php";
include "../function/functions.php";

if(isset($_POST['create']) && $_POST['create'] == "supplier"){
    $namaSupplier = $_POST['namaSupplier'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $noHp = $_POST['noHp'];
    $id = $_POST['id'];

    $insert = mysqli_query($conn,
        "update supplier set
            nama_supplier = '$namaSupplier'
            ,alamat = '$alamat'
            ,email = '$email'
            ,no_hp = '$noHp'
        where id_supllier = '$id'"
    );

    if($insert)
    {
        echo "Data Customer Berhasil diupdate!.";
    }
    else {
        echo "Gagal diinput";
    }
}
?>