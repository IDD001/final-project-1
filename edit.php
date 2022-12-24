<?php 
require_once('./config/Dbconfig.php');
$db = new Operations();
$db->Update();
$id = $_GET["U_ID"];
$result = $db->Get_Update($id);
$data = mysqli_fetch_assoc($result);


 
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
                        <h2 class="text-center">Edit Data Mahasiswa</h2>
                        
                        
                    </div>
                        <div class="card-body">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                <input type="text" name="nama" placeholder="Masukan Nama" class="form-control mb-2" required value="<?= $data['nama']; ?>">
                                <input type="text" name="nim" placeholder="Masukan NIM" class="form-control mb-2" required value="<?= $data['nim']; ?>">
                                <input type="email" name="email" placeholder="Masukan Email" class="form-control mb-2" required value="<?= $data['email']; ?>">

                                <select class="form-control mb-2" name="kelas" id="">
                                    <option value="<?= $data['kelas']; ?>" ><?= $data['kelas']; ?></option>
                                    <option value="IF21A">IF21A</option>
                                    <option value="IF21B">IF21B</option>
                                    <option value="IF21C">IF21C</option>
                                    <option value="IF21D">IF21D</option>
                                    <option value="IF21E">IF21E</option>
                                    <option value="IF21F">IF21F</option>
                                </select>
                             
                                <select class="form-control mb-2" name="angkatan" id="">
                                    <option value="<?= $data['angkatan']; ?>" ><?= $data['angkatan']; ?></option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            
                                <select class="form-control mb2" name="semester" id="">
                                    <option value="<?= $data['semester']; ?>" ><?= $data['semester']; ?></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
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