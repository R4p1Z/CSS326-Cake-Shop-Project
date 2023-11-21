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
                    <h1>Payment</h1>
                </div>
            </div>

            <div class="tobect">
                <img class="qrpic" src="pic/QR.png" class="img-responsive">
                <div class="gopay">
    			    <input type="button" class="button btn-small" value="Check your order" onclick="redirectToAnotherFile()">
			    </div>

			<script>
    			function redirectToAnotherFile() {
        			window.location.href = "my-account.php";
    			}
			</script>
            </div>


			           
        </div>

        
      </div>
    </div>
  </section>

<?php include 'inc/footer.php' ?>