<?php
/**
 * User: Nizar
 * Date: 20/05/2015
 * Time: 22:38
 */

namespace pfe\FrontBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SheetController  extends  Controller{
    public function sheetListAction(){
      //  return new Response("ok",200);
        return $this->render("pfeFrontBundle:Sheet:sheetList.html.twig");
    }
    public function sheetAction($id){
        return $this->render("pfeFrontBundle:Sheet:sheet.html.twig");
    }
}