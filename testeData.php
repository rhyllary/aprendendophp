<?php
$raw ='22.11.1968';
$start = DateTime::createFromFormat('d.m.Y', $raw);
echo "data de inicio:" .$start->format('Y-m-d'). "<br>";

$end = clone $start;
$end->add(new dateinterval('P1M6D'));
echo "<br>";
$diff = $end->diff($start);
echo "diferença:" .$diff->format('%m mes,%d dias(total: %a dias)') . "<br>";
 
if($start < $end){
    
    echo "começa antes do fim!<br>";
 }
  
 $periodinterval = dateinterval::createfromdatestring('first thursday');
 $perioditerator = new dateperiod($start,$periodinterval, $end, dateperiod::EXCLUDE_START_DATE);

  foreach($perioditerator as $date) { 
    //mostra cada data no período 
    echo $date->format('d-m-Y')." ";
  }
?>