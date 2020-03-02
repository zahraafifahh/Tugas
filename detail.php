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


<?php

$query = mysqli_query($koneksi, "SELECT * FROM products WHERE id='$_GET[kd]'");
$data  = mysqli_fetch_array($query);

$jenis_id = $data['jenis_barang'];
$query2 = mysqli_query($koneksi, "SELECT jenis_barang FROM jenis_barang WHERE id='$jenis_id'");
$data2  = mysqli_fetch_array($query2);

$sizestring = $data['sizes'];
$size_array = explode(',', $sizestring);
?>
	<div class="blog">      
      <div class="conteudo">
      	<table border="0">
		<tr>

			<td rowspan="7"><img src="<?php echo $data['image']; ?>" /></td>
        </tr>
        <tr>
            <td colspan="3"><h3><big><center><div class="title"><h3><?php echo $data['title']; ?><dd><hr></h3></div></td>
        </tr>
        <tr>  
            <td><dd><font color="#666"><h4>Detail</h4></td>
            <td><dd><font color="#666"><h4>:</h4></td>
            <td><font color="#666"><h4><?php echo $data['description']; ?></h4></td>
        </tr>
        <tr>  
            <td><dd><font color="#666"><h4>Jenis Barang</h4></td>
            <td><dd><font color="#666"><h4>:</h4></td>
            <td><font color="#666"><h4><?php echo $data2['jenis_barang']; ?></h4></td>
        </tr>
        <tr>  
            <td><dd><font color="#666"><h4>Harga</h4></td>
            <td><dd><font color="#666"><h4>:</h4></td>
            <td><font color="#666"><h4>Rp.<?php echo number_format($data['price'],2,",",".");?></h4></td>
        </tr>
        
       
         
<!--<tr>
<td></td>
<td><h3>Stock</h3></td>
<td><h3>:</h3></td>
<td><div><h3><?php if ($data['br_stok'] >= 1){
echo '<strong style="color: blue;">In Stock</strong>'; 
} else {
echo '<strong style="color: red;">Out Of Stock</strong>';  
}; ?></h3></div></td>
 </tr>-->
</div>
         <tr>
         <td></td>         
         <td colspan="3"><dd><hr><a href="home.php"><input type="submit" value="Close" class="tombol"></a>
         <a href="add_cart.php?id=<?php echo $data['id']; ?>"><input type="submit" class="tombol" value="Add to cart">

         	</div></td>
         </tr>
         <tr>
         <td></td>         
         <td colspan="3">
         </td>
         </tr>

      </table>
                   

</body>
</html>