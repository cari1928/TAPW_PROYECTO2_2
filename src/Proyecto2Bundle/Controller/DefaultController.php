<?php

namespace Proyecto2Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('Proyecto2Bundle:Default:index.html.twig');
    }

}
