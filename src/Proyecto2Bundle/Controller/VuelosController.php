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
        dump($p);
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
        
        } else if($type == 'Vuelo') {
          $ens = $em->getRepository('Proyecto2Bundle:Disponibles')->findBy(array(
              'iddisponibles'=>$p->getIddisponibles()));
          foreach ($ens as $city) { 
            $origen = $city->getIdorigen()->getNombre()." - ".$city->getIddestino()->getNombre(); 
          }
          
          $ens = $em->getRepository('Proyecto2Bundle:Cliente')->findBy(array(
              'idcliente'=>$p->getIdcliente()));
          foreach ($ens as $city) { 
            $cliente = $city->getNombres()." - ".$city->getApellidos(); 
          }
          
          $temp = array(
            'idvuelo'=>$p->getIdvuelo(),    'idcliente'=>$cliente,
            'iddisponibles'=>$origen,       'cupon'=>$p->getCupon(),
            'total'=>$p->getTotal()
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
    
    public function registrar_clienteAction(Request $request) {
      $cliente = new Cliente();
      $form = $this->createForm(ClienteType::class, $cliente);
    
      $form->handleRequest($request); 
      if($form->isValid()){
        $em = $this->getDoctrine()->getEntityManager(); 
        $em->persist($cliente); 
        $em->flush(); 
        return $this->redirect($this->generateUrl('proyecto2_cupon')); 
      }
      return $this->render('Proyecto2Bundle:Vuelos:registrar_cliente.html.twig', 
                            array('formulario'=>$form->createView()));
    }
    
    public function cuponAction(Request $request) {
        $vuelo = new Vuelo();
        $form = $this->createForm(VueloType::class, $vuelo);
      
        $form->handleRequest($request); 
        if($form->isValid()){
          $em = $this->getDoctrine()->getEntityManager(); 
          $em->persist($vuelo); 
          $em->flush(); 
          return $this->redirect($this->generateUrl('proyecto2_reservar_vuelo')); 
        }
        
        return $this->render('Proyecto2Bundle:Vuelos:cupon.html.twig', 
                            array('formulario'=>$form->createView()));
    }
    
    public function reservar_vueloAction() {
      //Se obtienen datos del cliente
      $em = $this->getDoctrine()->getManager();
      $clientes = $em->getRepository('Proyecto2Bundle:Cliente')
          ->findAllClientsOrderedByName();
      $clientes = $clientes[0];
      // dump($clientes);

      // Se obtienen los vuelos disponibles
      $datos = $this->fileData("datos.txt"); //se obtienen los datos del archivo datos.txt
      $disponibles = $this->getDoctrine()
          ->getRepository('Proyecto2Bundle:Disponibles')
          ->find(1);   
      // dump($disponibles);
      // die();
      $tarifa = $disponibles->getIdtarifa();
      $tarifa = $tarifa->getPrecio(); 
        
      //Se obtiene el cupon
      $cupon = $em->getRepository('Proyecto2Bundle:Vuelo')
          ->findAllOrderedById();
      // dump($cupon);
      
      $em = $this->getDoctrine()->getEntityManager();
      $em->remove($cupon[0]);
      $flush=$em->flush();
      
      $cupon = $cupon[0]->getCupon();
      
      $total = $tarifa;
      if($cupon != 0) {
        $cupon/= 100;
        // echo $tarifa."<br>";
        // echo $cupon;
        $total = $tarifa * $cupon;
      }

      // dump($clientes);
      // dump($disponibles);
      // dump($cupon);
      // die();
      
      $vuelo = new Vuelo();
      $vuelo->setCupon($cupon);
      $vuelo->setTotal($total);
      $vuelo->setIddisponibles($disponibles);
      $vuelo->setIdcliente($clientes);
      
      $em = $this->getDoctrine()->getEntityManager(); 
      $em->persist($vuelo); 
      $em->flush();
      
      return $this->redirect($this->generateUrl('proyecto2_lista_reservados')); 
    }
    
    public function fileData($filename) {
      $file = fopen($filename, "r");
        $element = $this->multiexplode(array("=>",";"), fgets($file));
        for ($i=0; $i < count($element); $i+=2) {
          $temp = array($element[$i]=>$element[$i+1]);
          $datos[] = $temp;
        }
        fclose($file);
        return $datos;
    }
    
    public function lista_hotelesAction() {
       return $this->render('Proyecto2Bundle:Vuelos:lista_hoteles.html.twig');      
    }
    
    public function lista_hoteles_dataAction() {
      $em = $this->getDoctrine()->getManager();
      $ens = $em->getRepository('Proyecto2Bundle:Hotel')->findAll();
  
      $arrays = $this->createArray($ens, 'Hotel');
      dump($arrays);
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
      $data = array('data'=>$arrays);
  
      $json_string = json_encode($data);
  
      return new Response ($json_string);
    }
    
    public function lista_clientesAction() {
      return $this->render('Proyecto2Bundle:Vuelos:lista_clientes.html.twig');      
    }
    
    public function lista_reservados_dataAction(){
      $em = $this->getDoctrine()->getManager();
      $ens = $em->getRepository('Proyecto2Bundle:Vuelo')->findAll();
  
      $arrays = $this->createArray($ens, 'Vuelo');
      // die();
      $data = array('data'=>$arrays);
  
      $json_string = json_encode($data);
  
      return new Response ($json_string);
    }
    
    public function lista_reservadosAction(){
      return $this->render('Proyecto2Bundle:Vuelos:lista_reservados.html.twig');      
    }
    
}
