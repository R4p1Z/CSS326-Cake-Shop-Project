<?php 
session_start();
require_once 'config/connect.php';
include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header">
    					<div style="float: left;">
        					<h1>Menu</h1>
							<p>Favorite</p>
   						</div>
					</div>
						<div class="row">
							<div id="shop-mason" class="shop-mason-3col">

							<?php 
								$sql = "SELECT * FROM product";
								if(isset($_GET['id']) & !empty($_GET['id'])){
									$id = $_GET['id'];
									$sql .= " WHERE categoryID=$id";
								}
								

								$res = mysqli_query($connection, $sql);
								while($r = mysqli_fetch_assoc($res)){
							?>
								<div class="sm-item isotope-item">
    								<div class="product">
        								<div class="product-thumb">
            								<div class="img-container">
                								<img src="admin/<?php echo $r['thumb']; ?>" class="img-responsive" width="250px" alt="">
            								</div>
            								<div class="product-overlay">
                								<span>
                    								<a href="single.php?id=<?php echo $r['id']; ?>" class="fa fa-link"></a>
                    								<a href="single.php?id=<?php echo $r['id']; ?>" class="fa fa-shopping-cart"></a>
                								</span>                    
            								</div>
        								</div>
        									<h2 class="product-title"><a href="single.php?id=<?php echo $r['id']; ?>"><?php echo $r['name']; ?></a></h2>
        								<div class="product-price">$ <?php echo $r['price']; ?><span></span></div>
    								</div>
								</div>

							<?php } ?>

								
							
						</div>
						<div class="clearfix"></div>

						
						
						
									
				

									
				</div>
			</div>
		</div>
	</section>
<?php include 'inc/footer.php' ?>
