<?php

namespace Passport\Bundle\TreeviewBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PassportTreeviewBundle:Default:index.html.twig', array('name' => $name));
    }
}
