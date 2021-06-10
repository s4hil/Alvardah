<?php

include './components/header.php';

require_once './admin/phpStuff/db_connection.php';

if (isset($_GET['id'])) {
	


	global $conn;

	$id = $_GET['id'];

	$sql = "SELECT * FROM `inventory` WHERE `productid` = '$id'";

	$query = mysqli_query($conn, $sql);

	$result = mysqli_fetch_array($query);

?>



<style type="text/css">
	
	* {
		padding: 0px;
		margin: 0px;
	}

	.wrapper {
		width: 70%;
		border: 1px solid #f1f1f1;
		box-shadow: 5px 8px 6px grey;
		margin: 30px auto;
		padding: 40px;
		border-radius: 30px;
	}

	@media only screen and (max-width: 1024px){
		.wrapper{
			width: 90%;
		}
	}

	.nav-item {
		pointer-events: none;
		cursor: not-allowed;
	}

	label {
		color: white;
	}

</style>
	
<div class="container wrapper  bg-dark">
		<h1 class="alert alert-success text-center">Buy Product</h1>

		<div class="form-container">
			<form action="placeOrder.php" method="POST" autocomplete="OFF" class="form">
				<input type="text" hidden name="productid" value="<?php echo $result['productid'] ?>">
				<input type="text" hidden name="date" value="<?php echo date('d/m/y'); ?>">
				<fieldset class="form-group">
					<label>Product Name</label>
					<input readonly class="form-control" type="text" name="pName" value="<?php echo $result['name']; ?>">
				</fieldset>
				<fieldset class="form-group">
					<label>Your Name</label>
					<input class="form-control" type="text" name="cName" maxlength="25" required>
				</fieldset>
				<fieldset class="form-group">
					<label>Address</label>
					<input class="form-control" type="text" name="cAddress" maxlength="120" required>
				</fieldset>
				<fieldset class="form-group">
					<label>Size</label>
					<input class="form-control" type="text" maxlength="4" name="cSize" required>
				</fieldset>
				<fieldset class="form-group">
					<label>Mobile Number</label>
					<input class="form-control" type="number" name="cNumber" maxlength="12" required>
				</fieldset>
				<fieldset class="form-group">
					<label>Email</label>
					<input class="form-control" type="text" name="cEmail" maxlength="50" required="" onblur="validateEmail(this);">
				</fieldset>
				<button onsubmit="validate(e);" class="btn btn-success" type="submit" name="place">Place Order</button>
			</form>

			<script type="text/javascript">
				function validate(e) {
					e.preventDefault();
				}
				function validateEmail(emailField){
			        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

			        if (reg.test(emailField.value) == false) 
			        {
			            alert('Invalid Email Address');
			            return false;
			        }

			        return true;

					}
			</script>

		</div>

	</div>


<?php
include './components/footer.php';
}

else {
	echo "<h1>Please Return To The Home Page!</h1>";
}
?>