<?php
require_once "Config/Config.php";
$ruta = !empty($_GET['url']) ? $_GET['url'] : "Home/index";
$array = explode("/", $ruta);
$controllers = $array[0];
$metodo = "index";
$parametro = "";
if(!empty($array[1])){
    if(!empty($array[1] != "")){
        $metodo = $array[1];
    }
}
if(!empty($array[2])){
    if(!empty($array[2] != "")){
        for($i=2; $i < count($array); $i++){
           $parametro .= $array[$i]. ","; 
        }
        $parametro = trim($parametro, ",");
    }
}
require_once "Config/App/autoload.php";
$dirControllers = "Controllers/".$controllers.".php";
if(file_exists($dirControllers)){
    require_once $dirControllers;
    $controllers = new $controllers();
    if(method_exists($controllers, $metodo)){
        $controllers->$metodo($parametro);
    }else{
        echo "No extiste el metodo";
    }
}else{
    echo "no existe el controlador";
}

