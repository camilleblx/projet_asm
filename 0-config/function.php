<?php 

function GetPage(){
    $tab = $_SERVER["PHP_SELF"];
    $tab = explode("/", $tab);
    $tab = array_reverse($tab);
    return $tab[0];
}

function Notify($type,$text){
    switch ($type) {
        case 'success':
            echo "<script type='text/javascript'>Notify('success','".$text."')</script>";
            break;        

        case 'danger':
            echo "<script type='text/javascript'>Notify('danger','".$text."')</script>";
            break;        

        case 'info':
            echo "<script type='text/javascript'>Notify('info','".$text."')</script>";
            break;
    }
}
