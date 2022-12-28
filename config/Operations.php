<?php 
// session_start();
require_once('./config/Dbconfig.php');
$db = new DbConfig();
 
class Operations extends Dbconfig{

    //insert record in database
    public function Create_Pesan(){
        global $db;
        if(isset($_POST['btn_save']) ) {
            $nama = $db->check($_POST['nama']);
            $nim = $db->check($_POST['nim']);
            $email = $db->check($_POST['email']);
            $kelas = $db->check($_POST['kelas']);
            $angkatan = $db->check($_POST['angkatan']);
            $semester = $db->check($_POST['semester']);

            if ($this->Create($nama, $nim, $email, $kelas, $angkatan, $semester)) {
                echo '<div class="alert alert-success">Data Berhasil Di Tambahkan</div>';
            }
            else {
                echo '<div class="alert alert-danger">Data Gagal Di Tambahkan</div>';
                
            }
        }
    }

    public function Baru($nama,$nim,$email,$kelas,$angkatan, $semester){
        global $db;

        $query = "INSERT INTO mahasiswa (nama,nim, email,kelas, angkatan, semester) VALUES('$nama','$nim','$email','$kelas','$angkatan', '$semester')";

        

        $duplicate = mysqli_query($db->connection, "SELECT * FROM mahasiswa WHERE nim = $nim OR email = '$email' ");

        if (mysqli_num_rows($duplicate) > 0) {
            return 10;
        }else {
            if ($query) {
                mysqli_query($db->connection,$query);
                return 1;
            }else {
                return 100;
            }
        }
    }

    //insert record in the database using query
    public function Create($nama,$nim,$email,$kelas,$angkatan, $semester){
        global $db;
        $kelas = $_POST['kelas'];
        $query = "INSERT INTO mahasiswa (nama,nim, email, kelas, angkatan, semester) VALUES('$nama','$nim','$email','$kelas','$angkatan', '$semester')";
        $result = mysqli_query($db->connection, $query,);

        if ($result) {
            return true;
        }else {
            return false;
        }
    }

    //ambil data dari tabel database 
    public function View_Create($query){
        global $db;
        // $query = "SELECT * FROM mahasiswa ORDER BY nama ASC";
        $result = mysqli_query($db->connection, $query);
        $rows = [];
        while ($row = mysqli_fetch_array($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    //edit/Update
    public function Get_Update($id){
        global $db;
        $sql= "SELECT * FROM mahasiswa WHERE id = $id";
        $data = mysqli_query($db->connection,$sql);
        return $data;
    }

    public function Update(){
        global $db;
        if (isset($_POST['btn_update'])) {
            $id = $db->check($_POST['id']);
            $nama = $db->check($_POST['nama']);
            $nim = $db->check($_POST['nim']);
            $email = $db->check($_POST['email']);
            $kelas = $db->check($_POST['kelas']);
            $angkatan = $db->check($_POST['angkatan']);
            $semester = $db->check($_POST['semester']);

            if ($this->update_record($id,$nama,$nim,$email,$kelas,$angkatan, $semester)) {
                $this->set_message('<div class="alert alert-success">Data Berhasil Di Update!</div>');
                header("Location:index.php");
            }else{
            $this->set_message('<div class="alert alert-success">Data Gagal Ditambahkan!</div>');
            }
    
        
        }
    }
    //Update function 2
    public function update_record($id,$nama,$nim,$email,$kelas,$angkatan,$semester){
        global $db;
        $sql = "UPDATE mahasiswa SET 
                nama='$nama', 
                nim='$nim',
                email='$email',
                kelas='$kelas',
                angkatan='$angkatan',
                semester='$semester'

                WHERE id='$id'
                ";
        $result = mysqli_query($db->connection,$sql);
        if ($result) {
            return true;
        }else {
            return false;
        }

    }



    // Set Message
    public function set_message($msg){
        if (!empty($msg)) {
            $_SESSION['Message']=$msg;
        }else {
            $msg = "";
        }
    }

    // Display Session Message
    public function display_message(){
        if (isset($_SESSION['Message'])) {
            echo $_SESSION['Message'];
            unset($_SESSION['Message']);
        }
    }


    // delete 
    public function delete_record($id){
        global $db;
        $query = "DELETE FROM mahasiswa WHERE id =$id ";
        $result = mysqli_query($db->connection,$query);
        if ($result) {
            return true;
        }else {
            return false;
        }
    }


    public function cari($keyword) {
        global $db;

        $query = "SELECT * FROM mahasiswa";
        $result = mysqli_query($db->connection, $query);

        $arr = $result->fetch_all(MYSQLI_ASSOC);

        $tmp = [];
        foreach ($arr as $row) {
            if (strtolower($row['nama']) == strtolower($keyword) || $row['nim'] == $keyword) {
                $tmp[] = $row;
            }
        }

        return $tmp;
    }
    
    // function relasi
    public function Get_Nilai_Byid($id)
    {
        global $db;
        $sql = "SELECT mahasiswa.*,nilai.* FROM mahasiswa LEFT JOIN nilai ON mahasiswa.id=nilai.id_user WHERE mahasiswa.id = $id";
        $result = mysqli_query($db->connection, $sql);

        return $result->fetch_assoc();
    }

    //function update nilai
    public function Update_nilai($id, $data){
        global $db;
        $sql = "UPDATE nilai SET 
        pbo = '$data[pbo]', adbo = '$data[adbo]', pweb = '$data[pweb]', basdat = '$data[basdat]', daa = '$data[daa]', imk = '$data[imk]'      
         WHERE id_user = $id";

        $result = mysqli_query($db->connection, $sql);

        return $result;
    }

    // Function tambah nilai
    public function Add_nilai($id, $data){
        global $db;
        $query = "INSERT INTO nilai (id_user, pbo, adbo, pweb, basdat, daa, imk) VALUE ($id, $data[pbo], $data[adbo], $data[pweb], $data[basdat], $data[daa], $data[imk])";

        $result = mysqli_query($db->connection, $query);

        return $result;
    }
}