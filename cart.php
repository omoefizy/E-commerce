<?php
session_start();

$page = 'cartt.php';

include ($_SERVER['DOCUMENT_ROOT'].'/AssCheckP1/config/connection.php');



if (isset($_GET['add'])) {
	$quantity = mysqli_query($connection, 'SELECT productID, quantity FROM products WHERE productID=' . mysql_real_escape_string((int)$_GET['add']));
	while ($quantity_row = mysqli_fetch_assoc($quantity)) {
		if ($quantity_row['quantity'] != $_SESSION['cart_' . (int)$_GET['add']]) {
			$_SESSION['cart_' . (int)$_GET['add']] += 1;

		}

	}
	header('Location:' . $page);
}

if (isset($_GET['remove'])) {
	$_SESSION['cart_' . (int)$_GET['remove']]--;
	header('Location:' . $page);
}

if (isset($_GET['delete'])) {
	$_SESSION['cart_' . (int)$_GET['delete']] = '0';
	header('Location:' . $page);
}

/**function products() {
	$get = mysqli_query($GLOBALS['connection'], 'SELECT ID, Name, Price FROM products WHERE quantity >0 ORDER BY ID DESC');
	if (mysqli_num_rows($get) == 0) {
		echo 'Your cart is empty';
	} else {
		while ($get_row = mysqli_fetch_assoc($get)) {
			echo '<p>' . $get_row['Name'] . '<br />' . number_format($get_row['Price'], 2) . '<a href="cart.php?add=' . $get_row['ID'] . '">Add</a></p>';
		}

	}

}*/

function paypal_items(){
	$num='0';
	foreach ($_SESSION as $name => $value) {
		if ($value > 0) {
			if (substr($name, 0, 5) == 'cart_') {
				$id = substr($name, 5, (strlen($name) - 5));
				$get = mysqli_query($GLOBALS['connection'], 'SELECT productID, name, price FROM products WHERE productID=' . mysql_real_escape_string((int)$id));
				while ($get_row = mysqli_fetch_assoc($get)) {
					$num++;
					echo '<input type="hidden" name="item_number_'.$num.'" value="'.$id.'">';
					echo '<input type="hidden" name="amount_'.$num.'" value="'.$get_row['price'].'">';
					//echo '<input type="hidden" name="shipping_'.$num.'" value="'.$get_row['shipping'].'">';
					//echo '<input type="hidden" name="shipping_'.$num.'" value="'.$get_row['shipping'].'">';
					echo '<input type="hidden" name="quantity_'.$num.'" value="'.$value.'">';
				}
			}

		}

	}
	
	
}

function cart() {
	foreach ($_SESSION as $Name => $value) {
		if ($value > 0) {
			if (substr($Name, 0, 5) == 'cart_') {
				$ID = substr($Name, 5, (strlen($Name) - 5));
				$get = mysqli_query($GLOBALS['connection'], 'SELECT productID, name, price FROM products WHERE productID=' . mysql_real_escape_string((int)$ID));
				//echo $get;
				while ($get_row = mysqli_fetch_assoc($get)) {
					//echo "AAA";
					$sub = $get_row['price'] * $value;
					echo $get_row['name'] . ' x ' . $value . ' @ &pound;' . number_format($get_row['price'], 2) . ' = &pound;' . number_format($sub, 2) . '<a href="cart.php?remove=' . $ID . '">[remove]</a><a href="cart.php?add=' . $ID . '">[add] </a><a href="cart.php?delete=' . $ID . '">[Delete]</a><br />';
				}

				$total = @$total + $sub;

			}
			
		}

	}
	if (!isset($total)) {
		echo 'Your cart is empty!';
	} else {
		echo '<p>The total is &pound;' . number_format($total, 2).'</p>';

?>
<p>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" Name="cmd" value="_cart">
		<input type="hidden" Name="upload" value="1">
		<input type="hidden" Name="business" value="omobo@yahoo.com">
		<?php paypal_items(); ?>
		<input type="hidden" Name="currency_code" value="GBP">
		<input type="hidden" Name="amount" value="<?php echo $value; ?>">
		<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but03.gif" Name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	</form>
</p>
<?php
}
}
?>