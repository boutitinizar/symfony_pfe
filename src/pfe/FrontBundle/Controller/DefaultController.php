<?php

namespace pfe\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('pfeFrontBundle:Default:index.html.twig');
    }
}
