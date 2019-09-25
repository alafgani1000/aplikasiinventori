<?php
session_start();
include "../../koneksi.php";
include "../function/functions.php";

if(isset($_POST['create']) && $_POST['create'] == "supplier"){
    $namasupplier = $_POST['namasupplier'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $noHp = $_POST['nohp'];

    $insert = mysqli_query($conn,
        "insert into supplier
        (
            id_supllier
            ,nama_supplier
            ,alamat
            ,email
            ,no_hp
        )
        values
        (
            '',
            '$namasupplier',
            '$alamat',
            '$email',
            '$noHp'
        )"
    );

    if($insert)
    {
        echo "Data Supplier Berhasil diinput.";
    }
    else {
        echo "Gagal diinput";
    }
}
?>