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
    padding:145px;
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
                    <li class="utama"><a href="http://localhost/pwss/koneksi2.php">Cek Koneksi Database </a></li>
                </li>
</div>
    <div id="isi">
    <?php
$idbarang = $_GET["idbarang"];
include "koneksi2.php";
$sql = "select * from barang where idbarang = '$idbarang'";
$hasil = mysqli_query($kon,$sql);
if(!$hasil) die ("Gagal query...");

$data = mysqli_fetch_array($hasil);
$nama = $data["nama"];
$harga = $data["harga"];
$stok = $data["stok"];
$foto = $data["foto"];
?>
<h2>.:: EDIT BARANG ::.</h2>
<form action="smartphone_simpan.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="idbarang" value="<?php echo $idbarang;?>" />
<table border="3">
<tr>
<td>Nama Barang</td>
<td><input type="text" name="nama" value="<?php echo $nama;?>" /></td>
</tr>
<tr>
<td>Harga Jual</td>
<td><input type="text" name="harga" value="<?php echo $harga;?>"/></td>
</tr>
<tr>
<td>stok</td>
<td><input type="text" name="stok" value="<?php echo $stok;?>" /></td>
</tr>
<tr>
<td>Gambar [max=1.5MB]</td>
<td>
<input type="file" name="foto">
<input type="hidden" name="foto_lama" value="<?php echo $foto;?>" /> <br/>
<img src="<?php echo "thumb/t_".$foto; ?>" width="100px" />
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" value="Simpan" name="proses" />
<input type="reset" value="Reset" name="reset" />
</td>
</tr>
</table>
</form>
</div>
    <div id="footer">
        Copyright 2019 @ Setyo Nugraha
    </div>
</div>
</body>
</html>