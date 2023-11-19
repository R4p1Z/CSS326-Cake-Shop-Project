<?php 
	ob_start();
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login.php');
	}

include 'inc/header.php'; 
include 'inc/nav.php'; 
$uid = $_SESSION['customerid'];
$cart = $_SESSION['cart'];
?>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>My Account</h2>
					</div>
					<div class="col-md-12">

			<h3>Recent Orders</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Order</th>
						<th>Order Date</th>
						<th>Pick up time</th>
						<th>Pick up date</th>
						<th>Price</th>
						<th>Status</th>
						<th>Note</th>
					</tr>
				</thead>
				<tbody>

				<?php
					$ordsql = "SELECT * FROM orders WHERE uid='$uid'";
					$ordres = mysqli_query($connection, $ordsql);
					$pricesql = "SELECT * FROM payment WHERE uid='$uid'";
					$priceres = mysqli_query($connection, $pricesql);
					while($ordr = mysqli_fetch_assoc($ordres) && $price = mysqli_fetch_assoc($priceres)){
				?>
					<tr>
						<td>
							<?php echo $ordr['id']; ?>
						</td>
						<td>
							<?php echo $ordr['orderDate']; ?>
						</td>
						<td>
							<?php echo $ordr['pickUp-time']; ?>			
						</td>
						<td>
							<?php echo $ordr['pickUp-date']; ?>
						</td>
						<td>
							<?php echo $price['totalPrice']; ?>
						</td>
						<td>
							<?php echo $ordr['status']; ?>
						</td>
						<td>
							<?php echo $ordr['note']; ?>
						</td>
						<td>
							<a href="view-order.php?id=<?php echo $ordr['id']; ?>">View</a> <!--Don't use this part now -->
							<?php if($ordr['status'] != 'Cancelled'){?>
							| <a href="cancel-order.php?id=<?php echo $ordr['id']; ?>">Cancel</a> <!--Don't forget to edit this part -->
							<?php } ?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>		

			<br>
			<br>
			<br>

			<div class="ma-address">
						<h3>My Addresses</h3>
						<p>The following addresses will be used on the checkout page by default.</p>

			<div class="row">
				<div class="col-md-6">
								<h4>My Address <a href="edit-address.php">Edit</a></h4>
					<?php
						$csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u.email, u1.phoneNO, u1.postcode FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
						$cres = mysqli_query($connection, $csql);
						if(mysqli_num_rows($cres) == 1){
							$cr = mysqli_fetch_assoc($cres);
							echo "<p>".$cr['firstname'] ." ". $cr['lastname'] ."</p>";
							echo "<p>".$cr['address1'] ."</p>";
							echo "<p>".$cr['address2'] ."</p>";
							echo "<p>".$cr['city'] ."</p>";
							echo "<p>".$cr['state'] ."</p>";
							echo "<p>".$cr['country'] ."</p>";
							echo "<p>".$cr['postcode'] ."</p>";
							echo "<p>".$cr['phoneNO'] ."</p>";
							echo "<p>".$cr['email'] ."</p>";
						}
					?>
				</div>

				<div class="col-md-6">

				</div>
			</div>



			</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>
