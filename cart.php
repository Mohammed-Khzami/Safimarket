<!DOCTYPE html>
<html lang="en">
<?php session_start();
 include ("storage/head.php");
  ?>
<body class="animsition">
	
	<!-- Header -->
	

	<?php include ("storage/header.php");
	?>


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg" style="margin-top:50px">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Action</th>
									<th class="column-2">Product</th>
									<th class="column-3"></th>
									<th class="column-4">Price</th>
									<th class="column-5">Quantity</th>
									<th class="column-6">Update</th>
								</tr>
								<?php 
								$total =0;
								if(isset($_SESSION['cart'])){
									
									foreach($_SESSION['cart'] as $key => $value){
										$total =(float)$value['item_price']*$value['quantity'] + $total;
								?>
								<tr class="table_row">
									<td class="column-1">
									<form action="cartaction.php" method="POST">
									    <div class="">
											<button class="btn btn-sm btn-outline-danger" name="remove">Remove</button>
											<input type="hidden" name="item_name" value="<?php echo $value['item_name'] ?>">
										</div>
									</form>
										
									</td>
									<td class="column-2">

										<div class="how-itemcart1">
											<img src="admin/<?php echo $value['item_img'] ?>" alt="IMG">
										</div>
									</td>
									<td class="column-3"><?php echo $value['item_name'] ?></td>
									<td class="column-4">MAD  <?php echo $value['item_price'] ?></td>
									<td class="column-5">
									 <form action="cartaction.php" method="POST">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="<?php echo $value['quantity'] ?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
										
										 
									</td>
								<td class="column-6">
									<div class="">
											<button class="btn btn-sm btn-outline-primary" name="Update">Update</button>
											<input type="hidden" name="item_name" value="<?php echo $value['item_name'] ?>">
										</div> 
										</form>
							    </td>
									
								</tr>
								<?php	} }?>
								


								
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								
							</div>

							
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									MAD <?php echo $total;?>
								</span>
							</div>
						</div>

						

						<button onclick="location.href='cart2.php'" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
						
					</div>
				</div>
			</div>
		</div>
	</div>
		
	
		

	<!-- Footer -->
	<?php include ("storage/footer.php"); ?>

</body>
</html>