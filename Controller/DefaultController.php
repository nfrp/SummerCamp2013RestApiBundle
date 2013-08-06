<?php

namespace EzSystems\SummerCamp2013RestApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EzSystemsSummerCamp2013RestApiBundle:Default:index.html.twig', array('name' => $name));
    }
}
