<?php require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    } 
   if(!isset($_SESSION['cart'])){
  $_SESSION['cart'] = array();
}
  //unset qunatity
unset($_SESSION['qty_array']);
?>
<html>
<head>
  <title>Factory Outlet</title>
  <link rel="stylesheet" href="css/css2.css">
</head>
<body bgcolor="white">
<div id="conteudo1">
  <h2><a href="home.php"><big>FACTORY OUTLET</big></a></h2>
  <nav>
        <ul>
            <li><a href="wanita.php">WANITA</a></li>
            <li><a href="pria.php">PRIA</a></li>
            <li><a href="lain.php">LAINNYA</a></li>
            <li><a href="view_cart.php" class="ikon"><img src="images/kr.jpg" width="30" height="30"><?php echo count($_SESSION['cart']); ?></a></li>
            
        </ul>
  </nav>
</div>

    <div class="blog">
      
      <div class="widget">
        <h3><big>Form Pembelian</big></h3><hr></hr>
    <table align="center" width="500" cellpadding="10" >
        <font size="3"><form action="" method="POST">
        <tr>
          <td>Nama Pelanggan</td>
          <td>
            : <input type="text" size="30" name="full_name" class="kotak" value="" required>
          </td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>
            : <textarea name="street" value="" class="kotak" required></textarea>
          </td>
        </tr>
        </tr>
        <tr>
          <td>Kode POS</td>
          <td>
            : <input type="text" size="30" name="kode_pos" class="kotak" value="" required>
          </td>
        </tr>
        <tr>
          <td>No Telpon</td>
          <td>
            : <input type="text" size="30" name="no_telp" class="kotak" value="" required>
          </td>
        </tr>
       <tr>
       <tr>
          <td>Tanggal</td>
          <td>
            : <input type="date" size="30" name="tanggal" class="kotak" value="" required>
          </td>
        </tr>
        <tr>
          <td>
            <button name="submit" class="tbl">Pesan</button>
          </td>
          <td>
            <div class="a">
        <a href="view_cart.php" style="text-decoration:none"><button name="submit" class="tbl">Kembali</a>
        </td></tr>
      </table>
    </form>

  <?php

  if (isset($_POST['submit'])){
    include "koneksi.php";
        $full_name = $_POST['full_name'];
        $street = $_POST['street'];
        $kode_pos = $_POST['kode_pos'];
        $no_telp = $_POST['no_telp'];
        $tanggal = $_POST['tanggal'];

        $total;
        $discon;
        $jum_bayar;

      function HitungTotal(){
          global  $full_name, $street, $kode_pos, $no_telp, $tanggal, 
                  $title, $sizes, $qty_array, $price, $total, $discon, $jum_bayar;
          $total = $qty_array * $price;
          if($total>=250000)
            $discon = $total*0.1;
          else
            $discon = 0;
          $jum_bayar = $total - $discon;
         
        }
        function TampilTotalBayar(){
        HitungTotal();
        global $full_name, $street, $kode_pos, $no_telp, $tanggal, 
              $nama_barang, $sizes, $qty_array, $price, $total, $discon, $jum_bayar;
        echo "<h2><hr>Thankyou for Order</h2>";      
        echo "<h4>Nama Pelanggan  : $full_name <br>";
        echo "Alamat          : $street <br>";
        echo "Kode Pos        : $kode_pos <br>";
        echo "No Telpon       : $no_telp <br>";
        echo "Tanggal         : $tanggal </h4><br>";
        echo "Total Biaya\t   :Rp \t $total<br>";
        echo "Discont\t       :Rp \t $discon<br>";
        echo "Jumlah Bayar\t  :Rp \t $jum_bayar <br>";
        }
        TampilTotalBayar();
        $query = "INSERT INTO `transactions`(`full_name`, `street`, `kode_pos`, `no_telp`, 
        `tanggal`, `title`, `sizes`, `qty_array`, `price`, `total`, `discon`, `jum_bayar`)
        VALUES ('$full_name','$street',' $kode_pos','$no_telp','$tanggal','$title','$sizes','$qty_array','$price','$total','$discon','$jum_bayar')";
        $sql=mysqli_query($koneksi, $query);
        if($sql){
          echo "<br> BERHASIL MENAMBAHKAN DATA!";
        }
          else{
        echo "<br> GAGAL MENAMBAHKAN DATA! COBA ULANG KEMBALI!";
    }
  }
 unset($_SESSION['cart']); 
?>
      </div><br></br>

</body>
</html>