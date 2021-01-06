<?php

include 'comanda.php';

$order = new Order(0, "1,3", "Vaslui", 75.6,1, "ionut.vs2000@yahoo.com");

echo $order->getUser();


?>