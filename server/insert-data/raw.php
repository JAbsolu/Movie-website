<?php

$raw_file = " <form id='addressForm' method='post' action='../insert-data/insert_address.php'>
                <div class='form-group'>
                    <label for='addressNumber'>Address Number</label>
                    <input type='text' class='form-control' id='addressNumber' name='addressNumber' placeholder='Enter address number' required>
                </div>
                <div class='form-group'>
                    <label for='address'>Address</label>
                    <input type='text' class='form-control' id='address' name='address' placeholder='Enter address' required>
                </div>
                <div class='form-group'>
                    <label for='city'>City</label>
                    <input type='text' class='form-control' id='city' name='city' placeholder='Enter city' required>
                </div>
                <div class='form-group'>
                    <label for='zipCode'>Zip Code</label>
                    <input type='text' class='form-control' id='zipCode' name='zipCode' placeholder='Enter zip code' required>
                </div>
                <button type='submit' class='mt-2 btn btn-primary'>Add Address</button>
              </form>";

// echo htmlspecialchars($raw_file);

$chars = str_split($raw_file);
$line = "";

foreach ($chars as $char) {
  $line .= $char;
  if ($char == ">") {
    // echo htmlspecialchars($line) . "<br>";
    if (strpos($line, "<input") || strpos($line, "<textarea") ) {
    echo htmlspecialchars($line) . "<br>";
    }
    $line = "";
  }
}

?>