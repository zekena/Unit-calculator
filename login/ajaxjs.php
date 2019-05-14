<?php
  $from_value = $_POST['from_value'];
  $from_unit = $_POST['from_unit'];
  $to_unit = $_POST['to_unit'];
  if (is_numeric(($from_unit))){
      echo "Must be a digit";
  };

?>
