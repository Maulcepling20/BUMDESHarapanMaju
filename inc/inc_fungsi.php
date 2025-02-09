<?php
function url_dasar(){
    //Server Name
    $url_dasar = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']);
    return $url_dasar;
}
function ambil_gambar($id_tulisan){
    global $koneksi;
    $sql1 = "select * from beranda where id = '$id_tulisan'";
    $q1   = mysqli_query($koneksi,$sql1);
    $r1   = mysqli_fetch_array($q1);
    $text = $r1['Foto_2'];

    preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $text, $img);
    $gambar = $img[1]; // ../gambar/filename.jpg
    $gambar = str_replace("../gambar/",url_dasar()."/gambar/",$gambar);
    return $gambar;
}

function ambil_kalimat($id_tulisan) {
    global $koneksi;
    $sql1 = "select * from beranda where id = '$id_tulisan'";
    $q1 = mysqli_query($koneksi,$sql1);
    $r1 = mysqli_fetch_array($q1);
    $text = $r1['Kalimat_1'];
    return $text;
}

function ambil_isi($id_judul_2) {
    global $koneksi;
    $sql1 = "select * from beranda where id = '$id_judul_2'";
    $q1 = mysqli_query($koneksi,$sql1);
    $r1 = mysqli_fetch_array($q1);
    $text = $r1['foto'];
    return $text;
}

function bersihkan_judul($Kalimat_1){
    $judul_baru = strtolower($Kalimat_1);
    $judul_baru = preg_replace("/[^a-zA-Z0-9\s]/","",$judul_baru);
    $judul_baru = str_replace(" ","-",$judul_baru);
    return $judul_baru;
}
function buat_link_halaman($id) {
global $koneksi;
$sql1 = "select * from beranda where id = '$id'";
$q1 = mysqli_query($koneksi,$sql1);
$r1 = mysqli_fetch_array($q1);
$Kalimat_1 = bersihkan_judul($r1['Kalimat_1']);
return url_dasar()."/beranda.php/$id/$Kalimat_1";
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function kirim_email($email_penerima, $nama_penerima,$judul_email,$isi_email){
    
    $email_pengirim     = "mauluddinmudzakkir67782@gmail.com";
    $nama_pengirim      = "noreply";

    //Load Composer's autoloader
    require getcwd().'/vendor/autoload.php';

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $email_pengirim;                     //SMTP username
        $mail->Password   = 'pakmartonokece';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($email_pengirim, $nama_pengirim);
        $mail->addAddress($email_penerima,$nama_penerima);     //Add a recipient
       

        

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $judul_email;
        $mail->Body    = $isi_email;
        

        $mail->send();
        return "sukses";
    } catch (Exception $e) {
        return "gagal: {$mail->ErrorInfo}";
    }
}
?>