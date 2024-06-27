<?php

$raw_file = "<form id='merch_form' method='post' action='../insert-data/insert_merch.php' class='d-none'>
                <div class='form-group'>
                    <label for='merchName'>Merch Name</label>
                    <input type='text' class='form-control' id='merchName' name='merchName' placeholder='Enter merch name' required>
                </div>
                <div class='form-group'>
                    <label for='merchPrice'>Merch Price</label>
                    <input type='text' class='form-control' id='merchPrice' name='merchPrice' placeholder='Enter merch price' required>
                </div>
                <div class='form-group'>
                    <label for='merchType'>Merch Type</label>
                    <input type='text' class='form-control' id='merchType' name='merchType' placeholder='Enter merch type' required>
                </div>
                <div class='form-group'>
                    <label for='stock'>Stock</label>
                    <input type='text' class='form-control' id='stock' name='stock' placeholder='Enter stock' required>
                </div>
                <div class='form-group'>
                    <label for='size'>Size</label>
                    <input type='text' class='form-control' id='size' name='size' placeholder='Enter size'>
                </div>
                <div class='form-group'>
                    <label for='color'>Color</label>
                    <input type='text' class='form-control' id='color' name='color' placeholder='Enter color'>
                </div>
                <button type='submit' class='mt-2 btn btn-primary'>Add Merch</button>
            </form>
";

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