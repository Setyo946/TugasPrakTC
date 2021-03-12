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
                    <li class="utama"><a href="koneksi2.php">Cek Koneksi Database </a></li>
                </li>
</div>
    <div id="isi">
    <?php
$nama_barang = "";
if(isset($_POST["nama_barang"]))
    $nama_barang = $_POST["nama_barang"];

include "koneksi2.php";
$sql = "select *from barang where nama like '%".$nama_barang."%'
        order by idbarang desc";
$hasil = mysqli_query($kon, $sql);
if(!$hasil)
    die("Gagal querry..".mysqli_error($kon));
?>
<a href="smartphone_isi.php" ><b>INPUT BARANG</b></a>
&nbsp; &nbsp; &nbsp;
<a href="smartphone_cari.php" ><b>CARI BARANG</b></a>
<table border="5" style="background-color: black;color:yellow">
    <tr >
        <th>Foto</th>
        <th>Jenis Smartphone </th>
        <th>Harga Jual</th> 
        <th>Stok</th>
        <th>Operasi</th>
    </tr>
    <?php
        $no = 0;
        while ($row = mysqli_fetch_assoc($hasil)) {
            echo " <tr > ";
            echo " <td> <a href='pict/{$row['foto']} ' />
            <img src='thumb/t_{$row['foto']}'width='100' />
            </a> </td> " ;
            echo " <td> ".$row['nama']." </td> ";
            echo " <td> ".$row['harga']." </td> " ;
            echo " <td> ".$row['stok']." </td> " ;
            echo " <td> ";
            echo " <a href='smartphone_edit.php?idbarang=" . $row['idbarang']." '> 
                EDIT </a> " ;
            echo " &nbsp;&nbsp;";
            echo " <a href='smartphone_hapus.php?idbarang=" . $row['idbarang'] . " '> 
                HAPUS </a> ";
            echo" </td> " ;
            echo " </tr>";
        }
    ?>
</table>
</div>
    <div id="footer">
        Copyright 2019 @ Setyo Nugraha
    </div>
</div>
</body>
</html>