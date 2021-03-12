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
    background-image: url(pict/dp.png) ;
    background-size: 810px;
    color:yellow;
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
    <form action="smartphone_simpan.php" method="post" enctype="multipart/form-data">
    <h2><b>.:: isi BARANG ::.</b></h2>
<table border="1">
<tr style="background-color:black;color: yellow">
<td>Merk Smartphone</td>
<td><input type="text" name="nama" /></td>
</tr>
<tr style="background-color:black;color: yellow">
<td>Harga Jual</td>
<td><input type="text" name="harga" /></td>
</tr>
<tr style="background-color:black;color: yellow">
<td>stok</td>
<td><input type="text" name="stok" /></td>
</tr>
<tr style="background-color:black;color: yellow">
<td>Gambar [max=1.5MB]</td>
<td><input type="file" name="foto"></td>
</tr>
<td colspan="2" align="center" style="background-color:black;color: yellow">
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
