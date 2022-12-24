<?php 
require_once('./config/Dbconfig.php');
$db = new Operations();

if (isset($_GET['D_ID'])) {
    global $db;
    $id = $_GET['D_ID'];
    if ($db->delete_record($id)) {
        $db->set_message('<div class="alert alert-danger">Data Berhasil Di Hapus</div>');
        header('Location:index.php');
    }else {
        $db->set_message('<div class="alert alert-danger">Data Gagal Dihapus </div>');

    }
}








?>