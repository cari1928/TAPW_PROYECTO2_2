<?php

namespace Proyecto2Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Proyecto2Bundle\Entity\Disponibles;
use Proyecto2Bundle\Entity\Aeropuerto;
use Proyecto2Bundle\Entity\Cliente;
use Proyecto2Bundle\Entity\Vuelo;
use Proyecto2Bundle\Entity\Avion;
use Proyecto2Bundle\Entity\Asiento;
use Proyecto2Bundle\Form\DisponiblesType;
use Proyecto2Bundle\Form\ClienteType;
use Proyecto2Bundle\Form\AsientoType;
use Proyecto2Bundle\Form\VueloType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Doctrine\Common\Util\Debug;

class VuelosController extends Controller
{
    public function indexAction()
    {
        return $this->render('Proyecto2Bundle:Vuelos:index.html.twig');
    }
    
    public function lista_vuelosAction()
    {
        return $this->render('Proyecto2Bundle:Vuelos:lista_vuelos.html.twig');
    }
    
    public function datos_vueloAction(Request $request) 
    {
        $disponibles = new Disponibles();
        $form = $this->createForm(DisponiblesType::class, $disponibles);

        $form->handleRequest($request); //el formulario administra el request
        if($form->isValid()){
          $em = $this->getDoctrine()->getEntityManager(); //se obtiene el manager
          $var = $request->request->get('proyecto2bundle_disponibles');
          // die(dump($var));
        
        //formato de la fecha pendiente!!!!
        
        $ens = $em->getRepository('Proyecto2Bundle:Disponibles')->findBy(array(
          'idorigen'=>$var['idorigen'],
          'iddestino'=>$var['iddestino'],
          'idtarifa'=>$var['idtarifa'],
          'idavion'=>$var['idavion']
          ));
        
        $arrays = $this->createArray($ens, 'Disponibles');
        $data = array('data'=>$arrays);
        dump($arrays);

        //se guarda un archivo
        $json_string = json_encode($data);
        $file = fopen("datos.json", "w");
        fwrite($file, $json_string);

        return $this->redirect($this->generateUrl('proyecto2_lista_vuelos'));
      }

      return $this->render('Proyecto2Bundle:Vuelos:datos_vuelo.html.twig', 
                            array('formulario'=>$form->createView()));
    }
    
    public function createArray($data, $type){
      $array = array();
      foreach ($data as $p) {
        // dump($p->getIdorigen()->getNombre());
        // dump($p);
        // die();
         $em = $this->getDoctrine()->getManager();
        
        if($type =='Disponibles') {
          $fecha = $p->getFechahora();
          $puertoOrigen = "";
          $puertoDestino = "";
          $tarifa="";
          $avion = "";
          
          $ens = $em->getRepository('Proyecto2Bundle:Aeropuerto')->findBy(array(
            'idaeropuerto'=>$p->getIdorigen()->getIdaeropuerto()));
            
          foreach ($ens as $city) { $puertoOrigen = $city->getNombre(); }
          
          $ens = $em->getRepository('Proyecto2Bundle:Aeropuerto')->findBy(array(
              'idaeropuerto'=>$p->getIddestino()->getIdaeropuerto()));
              
          foreach ($ens as $city) { $puertoDestino = $city->getNombre(); }
          
          $ens = $em->getRepository('Proyecto2Bundle:Tarifa')->findBy(array(
              'idtarifa'=>$p->getIdtarifa()));
              
          foreach ($ens as $city) { $tarifa = $city->getClase(); }
          
          $ens = $em->getRepository('Proyecto2Bundle:Avion')->findBy(array(
              'idavion'=>$p->getIdavion()));
              
          foreach ($ens as $city) { $avion = $city->getMarca(); }
  
          $temp = array(
            'iddisponibles'=>$p->getIddisponibles(),  'fechahora'=>$fecha->format('Y-m-d H:i:s'),
            'idorigen'=>$puertoOrigen,                'iddestino'=>$puertoDestino,
            'idtarifa'=>$tarifa,                      'idavion'=>$avion
          );
          
        } elseif ($type == 'Hotel') {
          $temp = array(
            'idhotel'=>$p->getIdhotel(),    'capacidad'=>$p->getCapacidad(),
            'nombre'=>$p->getNombre(),      'direccion'=>$p->getDireccion()
            );
            
        } else if($type == 'Cliente') {
            $fecha = $p->getNacimiento();
            $temp = array(
            'idcliente'=>$p->getIdcliente(),    'nombres'=>$p->getNombres(),
            'apellidos'=>$p->getApellidos(),    'direccion'=>$p->getDireccion(),
            'direccionFacturacion'=>$p->getDireccionFacturacion(), 
            'modoPago'=>$p->getModoPago(),      'nacimiento'=>$fecha->format('Y-m-d')
            );
        }

        array_push($array, $temp);
      }
      $array = $this->setArrays($array);
      return $array;
    }

    public function setArrays($data){
      $temp = array();
      for ($i=0; $i < sizeof($data); $i++) {
        array_push($temp, $data[$i]);
      }
      return $temp;
    }
    
    public function lista_vuelos_dataAction() {
      $file = fopen("datos.json", "r");
      $json_string = fgets($file);
      return new Response ($json_string);
    }
    
    public function ini_lista_vuelosAction() {
        $em = $this->getDoctrine()->getManager();
        $ens = $em->getRepository('Proyecto2Bundle:Disponibles')->findAll();
        
        $arrays = $this->createArray($ens, 'Disponibles');
        $data = array('data'=>$arrays);
        dump($arrays);

        //se guarda un archivo
        $json_string = json_encode($data);
        $file = fopen("datos.json", "w");
        fwrite($file, $json_string); 
        return $this->render('Proyecto2Bundle:Vuelos:lista_vuelos.html.twig');      
    }
    
    public function registrarAction(Request $request) {
      $cliente = new Cliente();
      $form = $this->createForm(ClienteType::class, $cliente);
    
      $form->handleRequest($request); 
      if($form->isValid()){
        $em = $this->getDoctrine()->getEntityManager(); 
        $em->persist($cliente); 
        $em->flush(); 
        return $this->redirect($this->generateUrl('proyecto2_reservar')); 
      }
      return $this->render('Proyecto2Bundle:Vuelos:registrar.html.twig', 
                            array('formulario'=>$form->createView()));
    }
    
    public function reservarAction(Request $request) {
      // $asiento = new Asiento();
      // $form = $this->createForm(AsientoType::class, $asiento);
      
      // $form->handleRequest($request); 
      // if($form->isValid()){
        //Lectura de datos desde el archivo
        
        $file = fopen("datos.txt", "r");
        $element = $this->multiexplode(array("=>",";"), fgets($file));
        
        // dump($element);
        // die();
        
        for ($i=0; $i < count($element); $i+=2) {
          $temp = array($element[$i]=>$element[$i+1]);
          $datos[] = $temp;
        }
        fclose($file);
        
        // dump($datos);
        // die();
        
        $cliente = $this->getDoctrine()
          ->getRepository('Proyecto2Bundle:Cliente')
          ->find(11);
          
        $disponibles = $this->getDoctrine()
          ->getRepository('Proyecto2Bundle:Disponibles')
          ->find($datos[0]['iddisponibles']);          
        
        $vuelo = new Vuelo();
        $vuelo->setIdvuelo(2);
        $vuelo->setIdcliente($cliente);
        $vuelo->setIddisponibles($disponibles);
        $vuelo->setMonto(100);
        $vuelo->setCupon(50);
        $vuelo->setTotal(50);
        
        $em = $this->getDoctrine()->getEntityManager(); 
        $em->persist($vuelo); 
        $em->flush(); //!!!!NO SALE DE AQUÍ, ALGO PASA
        return $this->redirect($this->generateUrl('proyecto2_homepage')); 
      // }
      
      // return $this->render('Proyecto2Bundle:Vuelos:reservar.html.twig', 
      //                       array('formulario'=>$form->createView()));
    }
    
    public function lista_hotelesAction() {
       return $this->render('Proyecto2Bundle:Vuelos:lista_hoteles.html.twig');      
    }
    
    public function lista_hoteles_dataAction() {
      $em = $this->getDoctrine()->getManager();
      $ens = $em->getRepository('Proyecto2Bundle:Hotel')->findAll();
  
      $arrays = $this->createArray($ens, 'Hotel');
      dump($arrays);
      // die();
      $data = array('data'=>$arrays);
  
      $json_string = json_encode($data);
  
      return new Response ($json_string);
    }
    
    public function reservar_hotelAction() {
      return $this->render('Proyecto2Bundle:Vuelos:reservar_hotel.html.twig');      
    }
    
    //---------------------------------------------------------------------------------------------
    function multiexplode ($delimiters,$string) {
        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }
    
    function lista_clientes_dataAction() {
      $em = $this->getDoctrine()->getManager();
      $ens = $em->getRepository('Proyecto2Bundle:Cliente')->findAll();
  
      $arrays = $this->createArray($ens, 'Cliente');
      // dump($arrays);
      // die();
      $data = array('data'=>$arrays);
  
      $json_string = json_encode($data);
  
      return new Response ($json_string);
    }
    
    public function lista_clientesAction() {
      return $this->render('Proyecto2Bundle:Vuelos:lista_clientes.html.twig');      
    }
    
}
