<?php 
require_once('./config/Dbconfig.php');
$db = new Operations();

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "<script>alert('invalid id')</script>";

    exit;
}
if (isset($_POST['btn_save'])) {
    $res = $db->Add_nilai($id, $_POST);
    if ($res) {
        echo "<script>alert('Berhasil menambahkan nilai'); window.location.href='nilai.php?id=$id';</script>";
    }
}
?>



 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
 </head>
 <body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="text-center">Tambah Data nilai Mahasiswa</h2>
                    </div>
                    
                        <div class="card-body">
                            <form method="POST">
                                <input type="text" name="pbo" placeholder="Masukan Nilai pbo" class="form-control mb-2" required>
                                <input type="text" name="adbo" placeholder="Masukan Nilai adbo" class="form-control mb-2" required>
                                <input type="text" name="pweb" placeholder="Masukan Nilai pweb" class="form-control mb-2" required>
                                <input type="text" name="basdat" placeholder="Masukan Nilai basdat" class="form-control mb-2" required>
                                <input type="text" name="daa" placeholder="Masukan Nilai daa" class="form-control mb-2" required>
                                <input type="text" name="imk" placeholder="Masukan Nilai imk" class="form-control mb-2" required>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success redirect" name="btn_save"> Save </button>    
                            </form>
                            <a href="nilai.php?id=<?= $id; ?>" class="btn btn-success"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5ZM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5Z"/>
                            </svg> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </body>
 </html>