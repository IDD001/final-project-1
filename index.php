<?php 
require_once('./config/Login.php');

$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
}
else{
  header("Location: login.php");
}


require_once('./config/Dbconfig.php');
$db = new Operations();

$mahasiswa = $db->View_Create("SELECT * FROM mahasiswa ORDER BY nama ASC");
// seacrhing


if(isset($_GET["cari"]) ) {
    $mahasiswa = $db->cari($_GET["cari"]);
}


// if (!isset($_POST['submit'])) {
//     $mh = $db->View_Create("SELECT * FROM mahasiswa ORDER BY nama ASC");
//     return $mh;
// }else{
//     echo "error";
// }





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
 <body class="">


    <div class="container-fluid shadow-lg">
        <div class="row">
            <div class="col">
                <div class="card mt-5 shadow-lg">
                    <!-- <div class="card-header">
                    
                    </div> -->
                    <div class="card-header ">
                        <!--  -->
                        <nav class="navbar navbar-light">
                        <form method="get">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="cari" class="form-control sticky-top">
                                    <div class="input-group-prepend">
                                        <button type="submit" class="rounded btn btn-primary sticky-top">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </nav>
                        <!--  -->
                        <h2 class="text-center text-dark">Tampilan Data Mahasiswa</h2>
                        <h2 class="text-center"><a href="create.php" class="btn btn-success">Tambah data mahasiswa</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <?php $db->display_message(); 
                              $db->display_message(); 
                        ?>
                        <table class="table table-striped table-bordered border"> 
                            <tr class="">
                        
                                <td class="text-center warna-satu border border-secondary ">ID</td>
                                <td class="text-center warna-dua border border-secondary">Nama</td>
                                <td class="text-center warna-satu border border-secondary">NIM</td>
                                <td class="text-center warna-dua border border-secondary">Email</td>
                                <td class="text-center warna-satu border border-secondary">Kelas</td>
                                <td class="text-center warna-dua border border-secondary">Angkatan</td>
                                <td class="text-center warna-satu border border-secondary">Smester</td>
                                <td colspan="2" class="warna-dua text-center border border-secondary">Aksi</td>
                                <td colspan="2" class="warna-satu text-center border border-secondary">Data Nilai</td>
                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach($mahasiswa as $mhs) : ?>
                            <tr>
                                    <td class="text-center"><?= $i; ?></td>
                                    <td class="text-center"><?= $mhs['nama'] ?></td>
                                    <td class="text-center"><?= $mhs['nim'] ?></td>
                                    <td class="text-center"><?= $mhs['email'] ?></td>
                                    <td class="text-center"><?= $mhs['kelas'] ?></td>
                                    <td class="text-center"><?= $mhs['angkatan'] ?></td>
                                    <td class="text-center"><?= $mhs['semester'] ?></td>
                                    <?php  ?>
                                    <td><a href="edit.php?U_ID=<?= $mhs['id']  ?>" class="btn btn-success">Edit</a></td>
                                    <td><a href="delete.php?D_ID=<?= $mhs['id'] ?>" class="btn btn-warning" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?');" >Delete</a></td>
                                    <td><a href="nilai.php?id=<?= $mhs['id'] ?>" class="btn btn-primary" >Data Nilai</a></td>
                            </tr>
                            <?php $i++;?>
                                <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed-bottom footer"><a class=" rounded-sm button  rounded" href="logout.php">Logout</a></div>




    <!-- js boostrartrap -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

 </body>
 </html>