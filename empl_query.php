<?php
function empl_query()
{
	
	if(! array_key_exists('username', $_SESSION))
	{
		destroy_and_exit("NO USERNAME FOUND");
	}
	else 
    {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $conn = hsu_conn_sess($username, $password);
		
		
        $empl_query_str = 'select empl_id, empl_lname, empl_fname, wage_hr
			    from staff
				order by empl_id';
	
        $empl_query_stmt = oci_parse($conn, $empl_query_str);
        oci_execute($empl_query_stmt, OCI_DEFAULT);
        ?>
		<form method="post" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>"> 
		<fieldset>
        <table>
            <legend> Employee Info </legend>
			<tr> 
                <th scope="col"> Emp_ID </th>
                <th scope="col"> Emp_Last_Name </th>
				<th scope="col"> Emp_First_Name </th>
				<th scope="col"> Wage_HR </th>
            </tr>

        <?php
        while (oci_fetch($empl_query_stmt))
        {
            
            $curr_empl_id = oci_result($empl_query_stmt, 'EMPL_ID');
			$curr_empl_lname = oci_result($empl_query_stmt, 'EMPL_LNAME');
            $curr_empl_fname = oci_result($empl_query_stmt, 'EMPL_FNAME');
			$curr_wage_hr = oci_result($empl_query_stmt, 'WAGE_HR');
                 
         ?>
		
            <tr> 
                <td> <?= $curr_empl_id ?> </td>
				<td> <?= $curr_empl_lname ?> </td>
				<td> <?= $curr_empl_fname ?> </td>
				<td> $<?= $curr_wage_hr ?> </td>
            </tr>
            <?php
        }
        ?>
			</table>
			<input type="submit" name="back_option" value="Back to Options" />
			<input type="submit" name="done" value="done" />
			</fieldset>
	</form>
	
        <?php
     

    oci_free_statement($empl_query_stmt);
    oci_close($conn);
    }
}	
?>  