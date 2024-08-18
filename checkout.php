<?php include "config/db.php" ?>
<?php include "includes/header.php" ?>
<?php echo displayMessage() ?>

<?php

	

?>


<main class="main">
	<div class="container">
		<ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
			<li class="active">
				<a href="cart.html">Shopping Cart</a>
			</li>
			<li>
				<a href="checkout.html">Checkout</a>
			</li>
			<li class="disabled">
				<a href="cart.html">Order Complete</a>
			</li>
		</ul>
		
		<div class="row">
			<div class="col-lg-8">
				<div class="cart-table-container">
					<table class="table table-cart">
						<thead>
							<tr>
								<th class="thumbnail-col"></th>
								<th class="product-col">Product</th>
								<th class="price-col">Price</th>
								<th class="qty-col">Quantity</th>
								<th class="text-right">Subtotal</th>
							</tr>
						</thead>
						<tbody>


							<?php cart();
							?>
			

						</tbody>


							<tfoot>
								<tr>
									<td colspan="5" class="clearfix">
										<div class="float-left">
											<div class="cart-discount">
												<form action="#">
													<div class="input-group">
														<input type="text" class="form-control form-control-sm" placeholder="Coupon Code" required>
														<div class="input-group-append">
															<button class="btn btn-sm" type="submit">Apply
																Coupon</button>
														</div>
													</div><!-- End .input-group -->
												</form>
											</div>
										</div><!-- End .float-left -->

										<div class="float-right">
															<button type="submit" class="btn btn-shop btn-update-cart">
												Update Cart
											</button>
										</div><!-- End .float-right -->
									</td>
								</tr>
							</tfoot>
					</table>
				</div><!-- End .cart-table-container -->
			</div><!-- End .col-lg-8 -->								

			<div class="col-lg-4">
				<div class="cart-summary">
					<h3>CART TOTALS</h3>

					<table class="table table-totals">
						<tbody>
							<tr>
								<td>Subtotal</td>

								<td><?php if (isset($_SESSION['item-total'])) echo $_SESSION['item-total'];
									else $_SESSION['item-total'] = ""; ?></td>
							</tr>

							<tr>
								<td colspan="2" class="text-left">
									<h4>Shipping</h4>

									<div class="form-group form-group-custom-control">
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input" name="radio" checked>
											<label class="custom-control-label">Local pickup</label>
										</div><!-- End .custom-checkbox -->
									</div><!-- End .form-group -->

									<div class="form-group form-group-custom-control mb-0">
										<div class="custom-control custom-radio mb-0">
											<input type="radio" name="radio" class="custom-control-input">
											<label class="custom-control-label">Flat rate</label>
										</div><!-- End .custom-checkbox -->
									</div><!-- End .form-group -->

									<form action="#">
										<div class="form-group form-group-sm">
											<label>Shipping to <strong>NY.</strong></label>
											<div class="select-custom">
												<select class="form-control form-control-sm">
													<option value="USA">India</option>
													<option value="Turkey">Turkey</option>
													<option value="China">England</option>
													<option value="Germany">Germany</option>
												</select>
											</div><!-- End .select-custom -->
										</div><!-- End .form-group -->

										<div class="form-group form-group-sm">
											<div cla				ss="select-custom">
												<select class="form-control form-control-sm">
													<option value="NY">Delhi</option>
													<option value="CA">uttakhand</option>
													<option value="TX">Panjab</option>
												</select>
											</div><!-- End .select-custom -->
										</div><!-- End .form-group -->

										<div class="form-group form-group-sm">
											<input type="text" class="form-control form-control-sm" placeholder="Town / City">
										</div><!-- End .form-group -->

										<div class="form-group form-group-sm">
											<input type="text" class="form-control form-control-sm" placeholder="ZIP">
										</div><!-- End .form-group -->

										<button type="submit" class="btn btn-shop btn-update-total">
											Update Totals
										</button>
									</form>
								</td>
							</tr>
						</tbody>

						<tfoot>
							<tr>
								<td>Total</td>
								<td>Rs <?php if (isset($_SESSION['item-total'])) echo $_SESSION['item-total'];
										else $_SESSION['item-total'] = ""; ?></td>
							</tr>
						</tfoot>
					</table>

					<div class="checkout-methods">


						<?php if (!isset($_SESSION['user_name'])) {
						?>
							<a href="login.php" class="btn btn-block btn-dark"> Proceed to Checkout
								<i class="fa fa-arrow-right"></i></a>
						<?php
						} else { ?>
				

							<?php
								if($_SESSION['item-total']!=0) echo '<a href="order.php" class="btn btn-block btn-dark"> Proceed to Checkout
								<i class="fa fa-arrow-right"></i></a>';
								else echo '<a class="btn btn-block btn-dark" disabled> Proceed to Checkout
								<i class="fa fa-arrow-right"></i></a>';
		

							?>
							
							
						<?php } ?>

					</div>
				</div><!-- End .cart-summary -->
			</div><!-- End .col-lg-4 -->
		</div><!-- End .row -->
	</div><!-- End .container -->

	<div class="mb-6"></div><!-- margin -->
</main><!-- End .main -->



<!-- End .page-wrapper -->


<?php include "includes/footer.php" ?>
<!-- <script>


	product_price_increase = document.querySelector('.product-single-qty>input').value;
	product_subtotal = document.querySelector('.subtotal-price').textContent;
	product_price =  document.querySelector('.product-prices');

	console.log(product_price);

	function subtotal(){

	}

</script> -->