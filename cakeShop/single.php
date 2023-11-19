<?php 
ob_start();
session_start();
require_once 'config/connect.php';
include 'inc/header.php'; 
include 'inc/nav.php'; 
if(isset($_GET['id']) & !empty($_GET['id'])){
    $id = $_GET['id'];
    $prodsql = "SELECT * FROM products WHERE id=$id";
    $prodres = mysqli_query($connection, $prodsql);
    $prodr = mysqli_fetch_assoc($prodres);
}else{
    header('location: index.php');
}
?>
    
<!-- SHOP CONTENT -->
<section id="content">
    <div class="content-blog">
        <div class="container">
            <div class="row">
					<div class="page_header">
    					<div style="float: left;">
        					<h1>Menu</h1>
							<p>Detail</p>
   						</div>
					</div>
                
                <div class="col-md-10 col-md-offset-1">
        <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
                    <div class="row">
                        <div class="col-md-5">
							<div class="inmenu">
								<div class="gal-wrap">
                                	<div id="gal-slider" class="flexslider">
                                    	<ul class="slides">
                                        	<li><img src="admin/<?php echo $prodr['thumb']; ?>" class="img-responsive" alt=""/></li>
                                    	</ul>
                                	</div>
                                	<ul class="gal-nav">
                                    	<li>
                                        	<div>
                                            	<img src="admin/<?php echo $prodr['thumb']; ?>" class="img-responsive" alt=""/>
                                        	</div>
                                    	</li>
                                	</ul>
                                	<div class="clearfix"></div>
                            
                            	</div>

							</div>
                            
                        </div>
                        <div class="col-md-7 product-single">
                            <h2 class="product-single-title no-margin"><?php echo $prodr['name']; ?></h2>
                            <div class="space10"></div>
                            <p class="dd23"><?php echo $prodr['description']; ?></p>
							<div class="p-price">$ <?php echo $prodr['price']; ?>/$ <?php echo $prodr['unit']; ?></div>
                            <form method="get" action="addtocart.php">


								<div class="additional-fields">
            						<div class="form-group">
										<label>Size:</label><br>
                						<input type="radio" id="medium" name="size" value="medium">
                						<label for="medium">Medium</label><br>
									</div>

            						<div class="form-group">
                						<label for="pickup-time">Pick-up Time:</label>
                						<input type="text" id="pickup-time" name="pickup_time" placeholder="XX:XX">
            						</div>
            						<div class="form-group">
                						<label for="pickup-date">Pick-up Date:</label>
                						<input type="date" id="pickup-date" name="pickup_date">
            						</div>

                                    <div class="form-group">
                						<label for="Note">Note:</label>
                						<input type="text" id="Note" name="Note" placeholder="Detail more about your cake Ex.Happy birthday Ashan">
            						</div>


        						</div>

								<div class="product-quantity">
                                    <span>Quantity:</span> 
                                    <input type="hidden" name="id" value="<?php echo $prodr['id']; ?>">
                                    <input type="text" name="quant" placeholder="1">
                                </div>

                                <div class="shop-btn-wrap">
                                    <input type="submit" class="button btn-small" value="Add to Cart">
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="clearfix space30"></div>

                    <div class="space30"></div>
                    <div class="related-products">
                        <h4 class="heading">Don't you want some cake?</h4>
                        <hr>
                        <div class="row">
                            <div id="shop-mason" class="shop-mason-3col">
                                <?php
                                    $relsql = "SELECT * FROM products WHERE id != $id ORDER BY rand() LIMIT 3";
                                    $relres = mysqli_query($connection, $relsql);
                                    while($relr = mysqli_fetch_assoc($relres)){
                                ?>
                                    <div class="sm-item isotope-item">
                                        <div class="product">
                                            <div class="product-thumb">
												<div class="img-container">
													<img src="admin/<?php echo $relr['thumb']; ?>" class="img-responsive" alt="">
												</div>
                                                <div class="product-overlay">
                                                    <span>
                                                        <a href="single.php?id=<?php echo $relr['id']; ?>" class="fa fa-link"></a>
                                                        <a href="#" class="fa fa-shopping-cart"></a>
                                                    </span>                    
                                                </div>
                                            </div>
                                            <h2 class="product-title"><a href="#"><?php echo $relr['name']; ?></a></h2>
                                            <div class="product-price">$ <?php echo $relr['price']; ?><span></span></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>
