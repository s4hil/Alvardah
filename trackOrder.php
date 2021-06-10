
<?php
	include './components/header.php';
    require_once './admin/phpStuff/db_connection.php';
?>
<script type="text/javascript">
	document.getElementById('loader_bg').remove();
</script>

<?php
	if (isset($_POST['track'])) {

		$orderID = mysqli_real_escape_string($conn, $_POST['oID']);

		$sql = "SELECT * FROM `orders` WHERE `orderid` = '$orderID'";

		$query = mysqli_query($conn, $sql);

		$status = mysqli_fetch_array($query);
			
			if ($status) {
				?> <br><br>
					<div class="alert alert-success text-center container" style="width: 80%;">
						<h1>Status => <?php echo $status['status']; ?></h1>
					</div>

				<?php
			}
			else {
				?>
					<br><br>
					<div class="alert alert-danger text-center container" style="width: 80%;">
						<h1>Invalid Order ID</h1>
					</div>
				<?php
			}
		}
		
?>

	<style type="text/css">
			
		.form-container {
			width: 60%;
			border-radius: 30px;
			box-shadow: 5px 6px 10px grey;
			border: 1px solid grey;
			margin: 60px auto;
			padding: 40px;
		}

		.nav-item {
			pointer-events: none;
		}
		@media only screen and (max-width: 768px){
			.form-container {
				width: 90%;
			}
		}

	</style>
	<div class="container">


			
		<div class="form-container">
			<form action="?" method="POST">
				<legend>Track Order</legend>
				<fieldset class="form-group">
					<label>Order ID</label>
					<input type="number" name="oID" class="form-control" required="true">
				</fieldset>

				<fieldset class="form-group">
					<button type="submit" name="track" class="form-control btn btn-primary">Track</button>
				</fieldset>
			</form>
		</div>

	</div>


<?php
	include './components/footer.php'
?>