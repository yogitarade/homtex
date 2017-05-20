<?php

if($_REQUEST)
{
	$id 	= $_REQUEST['ads_category_id'];
	
	$query  = "select * from ht_ads_sub_category where ads_category_id = ".$id;
	$results  = @mysql_query( $query);
	$num_rows = @mysql_num_rows($results);
	if($num_rows > 0)
	{?>
		<select name="ads_sub_category_id" class="parent" style="padding:8px;">
		<option value="" selected="selected">-- Sub Category --</option>
		<?php
		while ($rows = mysql_fetch_assoc(@$results))
		{?>
			<option value="<?php echo $rows['ads_sub_category_id'];?>"><?php echo $rows['ads_sub_category_name'];?></option>
		<?php
		}?>
		</select>	
	<?php	
	}
	else{}
}
?>
