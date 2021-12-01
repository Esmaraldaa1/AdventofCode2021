<?php // $ = variable

$myfile = fopen("data", "r");  // r stands for read, hier open ik het bestand
$data =  fread($myfile,filesize("data")); //lees van een open bestand - fread = file read
fclose($myfile); //sluit data bestand - file close

$numbers = explode(PHP_EOL, $data); //EOL = End Of Line - numbers = array van strings (getallen)
// var_dump($numbers); // vardump = laat alle datastructuur zien

$sum = []; //array
$previous_sum = [];
$new_sum = 0;

foreach ($numbers as $number) //voor elk item uit numbers krijg je 1 number
{
    $sum[] = $number; //volgende 3 cijfers
    $sum = array_slice($sum, -3); //altijd de laatste 3 nummers van de data

    if(count($sum) == 3 && count($previous_sum) == 3) //is de huidige EN vorige sum 3 cijfers
    {
        if (array_sum($sum) > array_sum($previous_sum)) //is huidige set van 3 groter dan vorige set van 3
        {
            $new_sum ++;
        }
    }
    $previous_sum = $sum; //sum word bij de volgende loop de nieuwe sum
}
echo $new_sum;
?>