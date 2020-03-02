<?php require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    } 
   if(!isset($_SESSION['cart'])){
  $_SESSION['cart'] = array();
}
  //unset qunatity
?>
<!DOCTYPE html>
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
        <h3><big>KERANJANGKU</big></h3><hr></hr></div>
<div class="conteudo">
			<form method="POST" action="save_cart.php">
			<table align="center" border="0" class="table2">
				
					<th></th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Size</th>
					<th>Subtotal</th>
				
				<tbody>
					<?php
						//initialize total
						$total = 0;
						if(!empty($_SESSION['cart'])){
						//connection
						$conn = new mysqli('localhost', 'root', '', 'factory');
						//create array of initail qty which is 1
 						$index = 0;
 						
 						if(!isset($_SESSION['qty_array'])){
 							$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						}
						$sql = "SELECT * FROM products WHERE id IN (".implode(',',$_SESSION['cart']).")";
						$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								?>
								<tr>
									<td>
										<a href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>" ><img src="images/del.jpg" width="30" height="30"></a>
									</td>
									<td><?php echo $row['title']; ?></td>
									<td><?php echo number_format($row['price'], 2); ?></td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
									<td><font color="#666"><h4><select name="size" class="kotak">
										<?php
										$sizestring = $row['sizes'];
										$size_array = explode(',', $sizestring);
										foreach ($size_array as $str) :
                    $string_array = explode(':', $str);
                    $size = $string_array[0];
                    $available = $string_array[1];
                    if($available > 0){
                      echo "<option value='$size' data-available='$available'>$size ($available Tersedia)</option>";
                    }
                  endforeach;?></td>
									<td><?php echo number_format($_SESSION['qty_array'][$index]*$row['price'], 2); ?></td>
									<?php $total += $_SESSION['qty_array'][$index]*$row['price']; ?>

								</tr>
								<?php
								$index ++;
							}
						}
						else{
							 ?>
							<tr>
								<td colspan="4" class="text-center">No Item in Cart</td>
							</tr>
							<?php
						}

					?>
					<tr>
						<td colspan="5" align="right"><b>Total</b></td>
						<td><b><?php echo number_format($total, 2); ?></b></td>
					</tr>
				</tbody>
			</table>
			<div class="a">
			<a href="home.php" style="text-decoration:none" class="tbl">Back</a></button>
			<button type="submit" style="text-decoration:none" class="tbl" name="save">Save</button>
			<a href="clear_cart.php" style="text-decoration:none" class="tbl">Clear Cart</a></button>
			<a href="form.php" style="text-decoration:none" style="text-decoration:none" class="tbl">Checkout</a></button></div>
			</form>
		</div>
	</div>
</div>
</body>
</html>