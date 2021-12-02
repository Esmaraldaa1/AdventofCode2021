<?php
$myfile = fopen("data", "r");  // r stands for read, hier open ik het bestand
$data =  fread($myfile,filesize("data")); //lees van een open bestand - fread = file read
fclose($myfile); //sluit data bestand - file close

$course = explode(PHP_EOL, $data); //end of line

$forward = 0;
$depth = 0;

foreach($course as $command) //loopt over array heen
{
    $stripped = explode(" ", $command);

    if ($stripped[0] == 'forward')
    {
        echo "vooruit\n";
        $forward += $stripped [1];  // +- telt op
    }

    if ($stripped[0] == 'up')
    {
        echo "omhoog\n";
        $depth -= $stripped [1];  // -= is eraf halen
    }

    if ($stripped[0] == 'down')
    {
        echo "naar beneden\n";
        $depth += $stripped [1];
    }
}
echo "$forward\n";
echo "$depth\n";

echo $forward * $depth;