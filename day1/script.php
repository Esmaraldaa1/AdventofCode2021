<?php // $ = variable

$myfile = fopen("data", "r");  // r stands for read, hier open ik het bestand
$data =  fread($myfile,filesize("data")); //lees van een open bestand - fread = file read
fclose($myfile); //sluit data bestand - file close

$numbers = explode(PHP_EOL, $data); //EOL = End Of Line - numbers = array van strings (getallen)
// var_dump($numbers); // laat alle datastructuur zien

$previous_number = null; //zet de waarde van het nummer ervoor op een beginwaarde
$sum = 0; //tellen bijhouden

foreach ($numbers as $number) //voor elk item uit numbers krijg je 1 number
{
    if ($previous_number != null && $number > $previous_number) //!= betekent niet gelijk aan - && betekent EN
    {
        $sum ++; //telt op, sum+1
    }
    $previous_number = $number; //previous number = waarde van number
}
echo $sum;
?>