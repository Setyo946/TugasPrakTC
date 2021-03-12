<!DOCTYPE html>
<html>
<head>
    <title>TUGAS PWSS</title>
    <style type="text/css">

body{
    font-family: arial;
    font-size: 18px;
    background-color: black;
}

#canvas{
    width: 950px;
    margin : 0 auto ;
    border : 5px solid yellow;
    background-color:greenyellow;
}

#header{
    width: 89,5%;
    padding:30px;
    background-image: url(img/hp.jpg);
    margin : 0 auto ;
    text-align: center;
    font-size: 40px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color : yellow;

}
#menu{
    background-color: #0066ff;
    border : 5px solid yellow;
}
#menu ul{
    list-style: none;
    margin:0;
    padding:0;
}
#menu ul li.utama{
    display: inline-table;
}
#menu ul li:hover{
    background-color: #0033cc;
}
#menu ul li a{
    display:block;
    text-decoration: none;
    line-height:40px;
    padding: 0 10px;
    color:#fff;
}
.utama ul{
    display:none;
    position:absolute;
    z-index:2;
}
.utama:hover ul{
    display:block;
}
.utama ul li{
    display:block;
    background-color: #6cf;
    width:140px;
}
#isi{
    min-height: 200px;
    padding:150px;
    background-color:white;
}
#footer{
    text-align:center;
    padding:10px;
    background-color: #0066ff;
    color : #fff;
    border : 5px solid yellow;
}
</style>
</head>
<body>

<div id="canvas">
    <div id="header">
    <b>Metro Gadget Shop</b>
</div>

    <div id="menu">
        <ul>
            <li class="utama"><a href="index.php">Beranda</a></li>
            <li class="utama"><a href="">Smartphone</a>
                <ul>
                    <li><a href="smartphone_isi.php">Tambah Data</a></li>
                    <li><a href="smartphone_tampil.php">Tampil Data</a></li>
                    <li><a href="smartphone_cari.php">Cari Data</a></li>
                </ul>
                </li>
                    <li class="utama"><a href="about.php">About</a></li>
                    </li>
                </li>
                    <li class="utama"><a href="koneksi2.php">Cek Koneksi Database </a></li>
                </li>
</div>
    <div id="isi">
    <?php
if(isset($_POST['idbarang'])){
    $idbarang = $_POST['idbarang'];
    $foto_lama = $_POST['foto_lama'];
    $simpan ="EDIT";
}else{
    $simpan = "BARU";
}

$nama   = $_POST['nama'];
$harga  = $_POST['harga'];
$stok   = $_POST['stok'];

$foto       =$_FILES['foto']['name'];
$tmpName    =$_FILES['foto']['tmp_name'];
$size       =$_FILES['foto']['size'];
$type       =$_FILES['foto']['type'];

$maxsize    =1500000;
$typeYgBoleh=array("image/jpeg","image/png","image/pjpeg");

$dirfoto    ="pict";
if(!is_dir($dirfoto))
    mkdir($dirfoto);
$fileTujuanFoto = $dirfoto."/".$foto;

$dirThumb ="thumb";
if(!is_dir($dirThumb))
    mkdir($dirThumb);
$fileTujuanThumb = $dirThumb."/t_".$foto;

$dataValid="YA";

if($size > 0){
    if($size > $maxsize){
        echo "Ukuran File Terlalu Besar <br/>";
        $dataValid="TIDAK";
    }
    if(!in_array($type, $typeYgBoleh)) {
        echo "Type File Tidak DiKenal <br/>";
        $dataValid="TIDAK";
    }
}

if(strlen(trim($nama))==0){
    echo "Nama Barang Harus Diisi <br />";
}
if(strlen(trim($harga))==0){
    echo "Harga Harus Diisi <br />";
    $dataValid ="TIDAK";
}
if(strlen(trim($stok))==0){
    echo "Stok Harus Diisi <br />";
    $dataValid ="TIDAK";
}
if ($dataValid == "TIDAK") {
    echo " Masih Ada Kesalahan , silahkan perbaiki! </br>";
    echo " <input type ='button' value='kembali'
    onClick = 'self.history.back()'>";

    exit;
}

include "koneksi2.php";

if($simpan == 'EDIT'){
    if($size == 0){
        $foto = $foto_lama;
    }
    $sql = "update barang set
            nama= '$nama' , 
            harga= '$harga' , 
            stok= '$stok' , 
            foto = '$foto' , 
            where idbarang = $idbarang ";
}else{
    $sql = "isert into barang
            (nama.harga,stok,foto)
            values
            ('$nama','$harga',$stok,'$foto')";
}
$sql = "insert into barang
        (nama,harga,stok,foto)
        values
        ('$nama',$harga,$stok,'$foto') ";
$hasil = mysqli_query($kon, $sql);

if(!$hasil){
    echo " Gagal Simpan , silahkan diulangi! <br /> ";
    echo mysqli_error($kon);
    echo "<br/> <input type='button' value='kembali'
            onClick='self.history.back()'>";
    exit;
}else{
    echo "Simpan data berhasil";
}

if($size > 0){
    if(!move_uploaded_file($tmpName, $fileTujuanFoto)){
        echo "Gagal Upload Gambar..<br/>";
        echo "<a href='smartphone_tampil.php'>Daftar Barang</a>";
        exit;
    }else{
        buat_thumbnail($fileTujuanFoto, $fileTujuanThumb);
    }
}

echo "<br/>File sudah di upload. <br/>";

function buat_thumbnail($file_src, $file_dst){
    //hapus jika thumbail sebelumnya sudah ada
    list($w_src,$h_src,$type) = getImageSize($file_src);

    switch ($type){
        case 1: // gif -> jpg
            $img_src = imagecreatefromgif($file_src);
            break;
        case 2: // jpeg -> jpg
            $img_src = imagecreatefromjpeg($file_src);
            break;
        case 3: // png -> jpg
            $img_src = imagecreatefrompng($file_src);
            break;
    }

    $thumb = 100; //max. size untuk thumb
    if($w_src > $h_src){
        $w_dst = $thumb; // landscape
        $h_dst = round($thumb / $w_src * $h_src);
    }else{
        $w_dst = round($thumb / $h_src * $w_src); // portrait
        $h_dst = $thumb;
    }

    $img_dst = imagecreatetruecolor($w_dst, $h_dst); //resample

    imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0,
            $w_dst, $h_dst, $w_src, $h_src);
    imagejpeg($img_dst, $file_dst); //simpan thumnail
    //bersihkan memori
    imagedestroy($img_src);
    imagedestroy($img_dst);
}

?>
<hr/>
<a href="smartphone_tampil.php">DAFTAR BARANG</a>
</div>
    <div id="footer">
        Copyright 2019 @ Setyo Nugraha
    </div>
</div>
</body>
</html>