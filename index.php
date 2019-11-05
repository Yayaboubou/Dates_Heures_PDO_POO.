<?php
require_once 'TimeTravel.php';

$start = new DateTime('31-12-1985');
$end = new DateTime();
//$end->sub(new DateInterval('PT1000000000S'));

echo $start->format('Y-m-d') . '<br>';
echo $end->format('Y-m-d') . '<br>';

$travel = new TimeTravel($start, $end);
echo $travel->getTravelInfo();

echo $travel->findDate(-1000000000);

$step = 'P1M1W1D';
var_dump($travel->backToFutureStepByStep(new DateInterval($step)));




