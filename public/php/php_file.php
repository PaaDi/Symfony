<?php

use App\Controller\GestionDevisController;

if(isset($_POST['test'])){
    $gdc=new GestionDevisController();
    var_dump($gdc);
    var_dump($gdc->select_page($_POST['test'].'html.twig'));
}