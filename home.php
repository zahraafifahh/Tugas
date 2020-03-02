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
  <link rel="stylesheet" href="css/css1.css">
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
        <h3><big>ALL ITEM</big></h3><hr></hr></div>
<div class="conteudo">
  <?php
  $sql = mysqli_query($koneksi, "SELECT * FROM products ORDER BY id DESC");
  if(mysqli_num_rows($sql) == 0){
  echo "Tidak ada produk!";
  }else{
  while($row = mysqli_fetch_assoc($sql)){
  ?>
    <div class="gallery">
    <img src="<?php echo $row['image']; ?>" />
    <div class="desc"><?php echo $row['title']; ?></div>
    <b><font face='Segoe UI Symbol' font size=4>Rp.<?php echo number_format($row['price'],2,",",".");?></b></font><br>
    <a href="detail.php?kd=<?php echo $row['id'];?>"><input type="submit" value="Detail" class="tombol"></a>

            <!--<a href="detailproduk.php?hal=detailbarang&kd=<?php echo $row['id'];?>" class="btn btn-lg btn-success">Beli &raquo;</a></div>-->

    </div>
  <?php   
   }}?>

   <br></br>
   
</body>
</html>