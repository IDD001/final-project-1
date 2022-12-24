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
                        <h2 class="text-center">Edit Data Nilai</h2>
                    </div>
                    
                        <div class="card-body">
                            <form method="POST">
                                <input type="text" name="nama" placeholder="Masukan Nama" class="form-control mb-2" required>
                                <input type="text" name="nim" placeholder="Masukan NIM" class="form-control mb-2" required>
                                <input type="email" name="email" placeholder="Masukan Email" class="form-control mb-2" required>
                                <input type="text" name="kelas" placeholder="Masukan Kelas" class="form-control mb-2" required>
                                <input type="text" name="angkatan" placeholder="Masukan Angkatan contoh : 2021" class="form-control mb-2" required>
                                <input type="text" name="semester" placeholder="Masukan Smester ke- ,  contoh : 3" class="form-control mb-2" required>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success redirect" name="btn_save"> Save </button>    
                            </form>
                            <a href="index.php" class="btn btn-success"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5ZM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5Z"/>
                            </svg> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </body>
 </html>