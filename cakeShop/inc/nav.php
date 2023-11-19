			
			
			<div class="menu-wrap">

					<ul>
						<li>
							<a class="logoinhome" href="index.php">HPY Cake (logo)</a>
						</li>					
					</ul>



				<div class="header-xtra">


					<div class="mu-text">
						<li>
							<a href="menu.php">Menu</a>
						</li>
					</div>

					<div class="mu-text">
						<li>
							<a href="aboutus.php">About us</a>						
						</li>
					</div>

					<div class="mu-text">
						<li>
							<a href="contact-us.php">Contact us</a>						
						</li>
					</div>

	
	

					<?php $cart = $_SESSION['cart']; ?>
						<div class="s-acc">
							<div class="acc-ico">
								<a href="my-account.php">
									<i class="fa fa-user"></i>
								</a>
							</div>

						</div>
	
					<div class="s-cart">
						<div class="sc-ico"><i class="fa fa-shopping-cart"></i><em><?php
							echo count($cart); ?></em>
						</div>

						<div class="cart-info">
							<small>You have <em class="highlight"><?php
								echo count($cart); ?> item(s)</em> in your basket</small>
							<br>
							<br>
							<?php
				
								$total = 0;
								foreach ($cart as $key => $value) {
									//echo $key . " : " . $value['quantity'] ."<br>";
									$navcartsql = "SELECT * FROM product WHERE id=$key";
									$navcartres = mysqli_query($connection, $navcartsql);
									$navcartr = mysqli_fetch_assoc($navcartres);

				
			 				?>
							<div class="ci-item">
								<img src="admin/<?php echo $navcartr['thumb']; ?>" width="70" alt=""/>
								<div class="ci-item-info">
									<h5><a href="single.php?id=<?php echo $navcartr['id']; ?>"><?php echo substr($navcartr['name'], 0 , 20); ?></a></h5>
									<p><?php echo $value['quantity']; ?> x $ <?php echo $navcartr['price']; ?>/<?php echo $navcartr['unit']; ?></p>
									<div class="ci-edit">
						<!-- <a href="#" class="edit fa fa-edit"></a> -->
										<a href="delcart.php?id=<?php echo $key; ?>" class="edit fa fa-trash"></a>
									</div>
								</div>
							</div>
							<?php 
								$total = $total + ($navcartr['price']*$value['quantity']);
							} ?>
							<div class="ci-total">Basket Total: $ <?php echo $total; ?></div>
							<div class="cart-btn">
								<a href="cart.php">View Basket</a>
								<a href="checkout.php">Checkout</a>
							</div>
						</div>
					</div>
	
					<div class="s-search">
						<div class="ss-ico"><i class="fa fa-search"></i></div>
						<div class="search-block">
							<div class="ssc-inner">
								<form>
									<input type="text" placeholder="Type Search text here...">
									<button type="submit"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</div>


					</div>

	


				</div>
			</div>
	</header>