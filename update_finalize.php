<?php
function update_call()
{
    
	if(! array_key_exists("stockItem", $_POST))
	{
		destroy_and_exit("MISSING STOCK INFO");
	}

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $conn = hsu_conn_sess($username, $password);
	
	$stockItem = strip_tags($_POST["stockItem"]);
	$product_new_quant = strip_tags($_POST["new_quant"]);
	$update_call_str = "update stock
						set qty_in_stock = :product_new_quant
					    where stock_item = :stockItem";
					   
	$update_call_stmt = oci_parse($conn, $update_call_str);
	
    oci_bind_by_name($update_call_stmt, ":product_new_quant", $product_new_quant);
	oci_bind_by_name($update_call_stmt, ":stockItem", $stockItem);
	?> 
	
	<form method="post" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
		<fieldset>
		<?php
		$num_updated = oci_execute($update_call_stmt, OCI_DEFAULT);
		if ($num_updated == 0)
		{
			?> 
			<p> 0 Rows Updated </p>
			<?php
		}
		else
		{
			?>
			<p> Success! 1 Row Updated </p>
			<?php
			oci_commit($conn);
		}
		?>
		<br>
		<input type="submit" name="back_option" value="Back to Option" />
		<input type="submit" name="done" value="Logout" />
		</fieldset>
	</form>	
    
    <?php

        // free and close!

        oci_free_statement($update_call_stmt);
        oci_close($conn);
	
}