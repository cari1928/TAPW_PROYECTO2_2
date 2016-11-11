<?php
    //Guarda los datos del vuelo seleccionado por el usuario
    // var_dump($_POST);
    
    if(isset($_POST['iddisponibles'])) {
        $file = fopen("datos.txt", "w");
        fwrite($file, "iddisponibles=>".$_POST['iddisponibles']);
        // fwrite($file, "fechahora=>".$_POST['fechahora'].";");
        // fwrite($file, "idorigen=>".$_POST['idorigen'].";");
        // fwrite($file, "iddestino=>".$_POST['iddestino'].";" );
        // fwrite($file, "idtarifa=>".$_POST['idtarifa'].";" );
        // fwrite($file, "idavion=>".$_POST['idavion']);
        fclose($file);
    
    } else if(isset($_POST['idhotel'])) {
        $file = fopen("datosHotel.txt", "w");
        fwrite($file, "idhotel=>".$_POST['idhotel'].";");
        fwrite($file, "capacidad=>".$_POST['capacidad'].";");
        fwrite($file, "nombre=>".$_POST['nombre'].";");
        fwrite($file, "direccion=>".$_POST['direccion'].";" );
        fclose($file);
    }
    
    echo "archivo guardado";
?>