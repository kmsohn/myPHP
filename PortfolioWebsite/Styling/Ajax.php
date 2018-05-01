<?php


    $shortBob->description = 'Keep it cropped super short and add some angular bangs';
    $shortBob->price = 72.97;
	$shortBob->image = 'images/shortBob.jpg';

    $myJSON = json_encode($shortBob);
	
	$my_file = "shortBob.json"; 
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = $myJSON;
	fwrite($handle, $data);
    
    $neonHue->description = 'Spike a Vibrant, neon Hair colors';
    $neonHue->price = 55.99;
	$neonHue->image = 'images/neonHue.jpg';

    $myJSON = json_encode($neonHue);
	
	$my_file = "neonHue.json";
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = $myJSON;
	fwrite($handle, $data);

	$pinnedCurls->description = 'Event the most well-behaved of curls will frizz and poff under the heat of a sumemr wedding. Why fight them';
    $pinnedCurls->price = 52.98;
	$pinnedCurls->image = 'images/pinnedCurls.jpg';

    $myJSON = json_encode($pinnedCurls);
	
	$my_file = "pinnedCurls.json";
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = $myJSON;
	fwrite($handle, $data);


$flowerCrowned->description = 'One of our popular Styles for weddings. Flowers on the crown look wonderful with a floral headband.';
    $flowerCrowned->price = 71.58;
	$flowerCrowned->image = 'images/flowerCrowned.jpg';

    $myJSON = json_encode($flowerCrowned);
	
	$my_file = "flowerCrowned.json";
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = $myJSON;
	fwrite($handle, $data);


$fingerwaves->description = 'Soft waves are wonderful for a spring wedding.';
    $fingerwaves->price = 71.58;
	$fingerwaves->image = 'images/fingerwaves.jpg';

    $myJSON = json_encode($fingerwaves);
	
	$my_file = "fingerwaves.json";
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = $myJSON;
	fwrite($handle, $data);
	

	$sideSweep->description = 'Make a deep part with your fingers, the messier the better and let your hair fall softly over your forehead, beautiful!';
    $sideSweep->price = 71.55;
	$sideSweep->image = 'images/sideSweep.jpg';

    $myJSON = json_encode($sideSweep);
	
	$my_file = "sideSweep.json";
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = $myJSON;
	fwrite($handle, $data);


	$permStyle->description = 'Big, Volumnious and glorious shoulder curls!';
    $permStyle->price = 171.55;
	$permStyle->image = 'images/permStyle.jpg';

    $myJSON = json_encode($permStyle);
	
	$my_file = "permStyle.json";
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = $myJSON;
	fwrite($handle, $data);