<?php
    //Guarda los datos del vuelo seleccionado por el usuario
    // var_dump($_POST);
    
    if(isset($_POST['iddisponibles'])) {
        $file = fopen("datos.txt", "w");
        fwrite($file, "iddisponibles=>".$_POST['iddisponibles'].";");
        fwrite($file, "fechahora=>".$_POST['fechahora'].";");
        fwrite($file, "idorigen=>".$_POST['idorigen'].";");
        fwrite($file, "iddestino=>".$_POST['iddestino'].";" );
        fwrite($file, "idtarifa=>".$_POST['idtarifa']);
        fclose($file);
    }
    
    echo "archivo guardado";
?>