<?php
    // //Guarda los datos del vuelo seleccionado por el usuario
    // var_dump($_POST);
    // die();
    
    if(isset($_POST['iddisponibles'])) {
        $file = fopen("datos.txt", "w");
        fwrite($file, "iddisponibles=>".$_POST['iddisponibles']);
        fclose($file);
    
    } else if(isset($_POST['idhotel'])) {
        $file = fopen("datosHotel.txt", "w");
        fwrite($file, "idhotel=>".$_POST['idhotel'].";");
        fwrite($file, "capacidad=>".$_POST['capacidad'].";");
        fwrite($file, "nombre=>".$_POST['nombre'].";");
        fwrite($file, "direccion=>".$_POST['direccion'].";" );
        fclose($file);
    
    } else if(isset($_POST['cupon'])) {
        $file = fopen("datosVuelo.txt", "w");
        fwrite($file, "cupon=>".$_POST['cupon']);
        fclose($file);
    }
    
    echo "archivo guardado";
?>