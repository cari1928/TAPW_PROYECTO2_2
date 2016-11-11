<?php

namespace Proyecto2Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Proyecto2Bundle\Entity\Disponibles;
use Proyecto2Bundle\Entity\Aeropuerto;
use Proyecto2Bundle\Entity\Cliente;
use Proyecto2Bundle\Form\DisponiblesType;
use Proyecto2Bundle\Form\ClienteType;
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
          'idtarifa'=>$var['idtarifa']
          ));
        
        $arrays = $this->createArray($ens);
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
    
    public function createArray($data){
      $array = array();
      foreach ($data as $p) {
        // dump($p->getIdorigen()->getNombre());
        // dump($p);
        // die();
        $fecha = $p->getFechahora();
        $puertoOrigen = "";
        $puertoDestino = "";
        $tarifa="";
        $em = $this->getDoctrine()->getManager();

        $ens = $em->getRepository('Proyecto2Bundle:Aeropuerto')->findBy(array(
            'idaeropuerto'=>$p->getIdorigen()->getIdaeropuerto()));
            
        foreach ($ens as $city) { $puertoOrigen = $city->getNombre(); }
        
        $ens = $em->getRepository('Proyecto2Bundle:Aeropuerto')->findBy(array(
            'idaeropuerto'=>$p->getIddestino()->getIdaeropuerto()));
            
        foreach ($ens as $city) { $puertoDestino = $city->getNombre(); }
        
        $ens = $em->getRepository('Proyecto2Bundle:Tarifa')->findBy(array(
            'idtarifa'=>$p->getIdtarifa()));
            
        foreach ($ens as $city) { $tarifa = $city->getClase(); }

        $temp = array(
          'iddisponibles'=>$p->getIddisponibles(),  'fechahora'=>$fecha->format('Y-m-d H:i:s'),
          'idorigen'=>$puertoOrigen,                'iddestino'=>$puertoDestino,
          'idtarifa'=>$tarifa
        );

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
    
    public function registrarAction(Request $request) {
      $cliente = new Cliente();
      $form = $this->createForm(ClienteType::class, $cliente);
    
      $form->handleRequest($request); 
      if($form->isValid()){
        $em = $this->getDoctrine()->getEntityManager(); 
        $em->persist($cliente); 
        $em->flush(); 
        return $this->redirect($this->generateUrl('proyecto2_lista_vuelos')); 
      }
      return $this->render('Proyecto2Bundle:Vuelos:registrar.html.twig', 
                            array('formulario'=>$form->createView()));
    }
    
}
