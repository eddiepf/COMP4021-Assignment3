<?php

// load the session information
require("session.php");

// Maximum number of suggestions to return
$SUGGESTION_MAX = 10;

// get data source from memory of session
$current_data_array = $_SESSION['autocomplete_data'];

// query term
$term = $_POST['name'];

// construct JSON array, format is [ "xx", "yy", "zz" ]
?>

<?php

$count = 0;

foreach ($current_data_array as $key => $val) {
  // Write code to match term to suggestions using case-insensitive matching
  // Retrieve a maximum of 10 suggestions and create JSON

	$temp_arr = str_split($term);
	$match_count = 0;
	$temp_arr2 = strtolower($val);
	for ($i = 0; $i < count($temp_arr); $i++) {
		$check = substr_count($temp_arr2, $temp_arr[$i]);
		if ($check >= 1)
			$match_count++;
		if ($match_count == count($temp_arr)){
			$new_data_array[] = $val;
			$count++;
		}
	}
	if ($count>=10){
		break;
	}
}
//var_dump($new_data_array);
echo json_encode($new_data_array);
?>


