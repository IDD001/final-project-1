<?php require_once('./config/Dbconfig.php');
$db = new Operations();
$id = $_GET["id"];

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
 </head>
 <body class="">


    <div class="container-fluid shadow-lg">
        <div class="row">
            <div class="col">
                <div class="card mt-5 shadow-lg">
                    
                    <div class="card-header">
                        <!--  -->
                        <nav class="navbar navbar-light bg-light">
                        <a class="btn btn-warning" href="index.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5ZM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5Z"/>
                            </svg> Kembali</a></a>
                        </nav>
                        <!--  -->
                        <h2 class="text-center text-dark">Tampilan Data Nilai Mahasiswa</h2>
                        <h2 class="text-center">
                            <?php if (!$data['id_user']) { ?>
                                <a href="create_nilai.php?id=<?= $id; ?>" class="btn btn-success">
                                Tambah nilai mahasiswa</a>
                            <?php } else { ?>
                                <a href="edit_nilai.php?id=<?= $id; ?>" class="btn btn-warning">
                                Edit nilai mahasiswa</a>
                            <?php } ?>
                        </h2>
                    </div>
                    <div class="card-body">
                        <?php $db->display_message(); 
                              $db->display_message(); 
                        ?>
                        <table class="table table-bordered border"> 
                            <tr class="">
                                <td class="text-center border border-secondary">ID</td>
                                <td class="text-center border border-secondary">Nama</td>
                                <td class="text-center border border-secondary">pbo</td>
                                <td class="text-center border border-secondary">adbo</td>
                                <td class="text-center border border-secondary">pweb</td>
                                <td class="text-center border border-secondary">basdat</td>
                                <td class="text-center border border-secondary">daa</td>
                                <td class="text-center border border-secondary">imk</td>

                            </tr>
                            
                            
                            <tr>
                                    <td>1</td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['pbo'] ?></td>
                                    <td><?= $data['adbo'] ?></td>
                                    <td><?= $data['pweb'] ?></td>
                                    <td><?= $data['basdat'] ?></td>
                                    <td><?= $data['daa'] ?></td>
                                    <td><?= $data['imk'] ?></td>
                            </tr>
                            
                                
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- js boostrartrap -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

 </body>
 </html>