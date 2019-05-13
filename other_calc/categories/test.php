<?php
 
(isset($_POST["company"])) ? $company = $_POST["company"] : $company=1;
 
?>
 
<form>
<select id="company" name="company">
<option <?php if ($company == 1 ) echo 'selected' ; ?> value="1">Apple</option>
<option <?php if ($company == 2 ) echo 'selected' ; ?> value="2">Samsung</option>
<option <?php if ($company == 3 ) echo 'selected' ; ?> value="3">HTC</option>
</select>
</form>