<?php
/**
 * Created by PhpStorm.
 * User: Nizar
 * Date: 14/06/2015
 * Time: 00:57
 */

namespace pfe\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use pfe\FrontBundle\Filter\KosuItemFilterType;

class KosuController extends Controller{


    public function indexAction(Request $request){

        $form = $this->get('form.factory')->create(new KosuItemFilterType());

        if ($request->query->has($form->getName())) {
            // manually bind values from the request
            $form->submit($request->query->get($form->getName()));

            // initialize a query builder
            $filterBuilder = $this->get('doctrine.orm.entity_manager')
                ->getRepository('pfeFrontBundle:Donnees')
                ->createQueryBuilder('e');
            var_dump($filterBuilder->getDql());
            die();
            exit;
            // build the query from the given form object
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);

            // now look at the DQL =)

        }

        return $this->render('pfeFrontBundle:Kosu:index.html.twig', array(
            'form' => $form->createView(),
        ));

       /* $repository  = $this->getDoctrine()
            ->getRepository('pfeFrontBundle:Donnees');
        $query = $repository->createQueryBuilder('K')
            ->getQuery();
        $products = $query->getResult();

        var_dump($products); die();exit;*/

    }
}