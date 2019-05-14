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

  function area_options()
  {
      $area_options = array(
          "square_inches" => 0.0254,
          "square_feet" => 0.3048,
          "square_yards" => 0.9144,
          "square_miles" => 1609.344,
          "square_millimeters" => 0.001,
          "square_centimeters" => 0.01,
          "square_meters" => 1,
          "square_kilometers" => 1000,
          "acres" => 63.614907234075,
          "hectares" => 100
      );
      $choice = '';
      while (list($k, $v) = each($area_options)) {
          $choice .= '<option value = "' . $k . '">' . $k . '</option>';
      }
      return $choice;
  }
?>