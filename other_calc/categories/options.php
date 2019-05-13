<?php
function length_options(){
    $selected = 'selected';
    $length_options = array(
      "inches" => 0.0254,
      "feet" => 0.3048,
      "yards" => 0.9144,
      "miles" => 1609.344,
      "millimeters" => 0.001,
      "centimeters" => 0.01,
      "meters" => 1,
      "kilometers" => 1000,
      "acres" => 63.614907234075,
      "hectares" => 100);
    $choice = '';
    while(list($k,$v)=each($length_options))
    {
      $choice.='<option value = "'.$k.'">'.$k.'</option>';
    }

    return $choice;

  }
?>