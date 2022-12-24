<?php 
require_once('./config/Dbconfig.php');
$db= new Operations();

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "<script>alert('Invalid id'); history.back();</script>";
}

if (isset($_POST['btn_update'])) {
    $res = $db->Update_nilai($id, $_POST);
    if ($res) {
        echo "<script>alert('Berhasil diubah'); window.location.href='nilai.php?id=$id'</script>";
    }

}
$data = $db->Get_Nilai_Byid($id);

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
                        <h2 class="text-center">Tabel Data Mahasiswa Teknik Informatika</h2>
                        
                        
                    </div>
                        <div class="card-body">
                            <form method="POST">
                                <label for="pbo">Masukan Nilai pbo</label>
                                <input type="text" name="pbo" placeholder="masukan nilai" value="<?= $data['pbo']; ?>" class="form-control mb-2">
                                <label for="adbo">masukan nilai adbo</label>
                                <input type="text" name="adbo" placeholder="Masukan Nama" class="form-control mb-2" required value="<?= $data['adbo']; ?>">
                                <label for="pweb">masukan nilai Pweb</label>
                                <input type="text" name="pweb" placeholder="Masukan NIM" class="form-control mb-2" required value="<?= $data['pweb']; ?>">
                                <label for="basdat">Masukan Nilai Basdat</label>
                                <input type="text" name="basdat" placeholder="Masukan Email" class="form-control mb-2" required value="<?= $data['basdat']; ?>">
                                <label for="daa">Masukan Nilai daa</label>
                                <input type="text" name="daa" placeholder="Masukan Email" class="form-control mb-2" required value="<?= $data['daa']; ?>">
                                <label for="imk">Masukan Nilai imk</label>
                                <input type="text" name="imk" placeholder="Masukan Email" class="form-control mb-2" required value="<?= $data['imk']; ?>">
                               
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success redirect" name="btn_update" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
                                </svg> Update </button>    
                            </form>
                            
                            <a href="index.php" class="btn btn-success "> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5ZM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5Z"/>
                            </svg> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </body>
 </html>