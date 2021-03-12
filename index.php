<!DOCTYPE html>
<html>
<head>
    <title>setyotug185610002</title>
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
    color : red;

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
    background-image: url(bc.jpg) ;
    background-size: 475px;
    font-family: sans-serif;
    font-size: 25px;
    color : yellow;
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
                    <li><a href="smartphone_isi.php">Tambah Data </a></li>
                    <li><a href="smartphone_tampil.php">Tampil Data </a></li>
                    <li><a href="smartphone_cari.php">Cari Data </a></li>
                </ul>
                </li>
                    <li class="utama"><a href="about.php">About</a></li>
                    </li>
                </li>
                    <li class="utama"><a href="koneksi2.php">Cek Koneksi Database </a></li>
                </li>
</div>
    <div id="isi">
    <b>METRO GADGET SHOP </b><br>
    <b>Jl.Jembatan Merah no.25 CC Depok Sleman YK</b><br>
    <b>MENERIMA : </b><br>
    <b>- JUAL BELI HP BARU DAN SEKEN</b><br>
    <b>- MENERIMA SERVICE HP</b><br>
    <b>- TUKAR TAMBAH HP</b><br>
    <b>- BACK UP DATA OS</b><br>
</div>
    <div id="footer">
        Copyright 2019 @ Setyo Nugraha
    </div>
</div>
</body>
</html>