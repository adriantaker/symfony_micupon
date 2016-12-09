<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Usuario;
use Proxies\__CG__\AppBundle\Entity\Ciudad;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route ("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }

    /**
     * @Route("/fija/", name="fija")
     */
    public function fijaAction()
    {
        // replace this example code with whatever you need
       return new Response('Este es el contenido de la url /fija');
    }

    /**
     * @Route("/fijatwig/", name="fijaTwig")
     */
    public function fijaTwigAction()
    {
        // replace this example code with whatever you need
        return $this->render('misVistas/miVista1.html.twig');
    }

    /**
     * @Route ("/{miVariable}/",
     * requirements = {"miVariable" = "test|prod|dev"},
     * name="variable")
     */
    public function miRutaVariableAction($miVariable = 'variableFija'){
        return new Response('Este es el contenido de la url /variable, has usado la ruta: '.$miVariable);
    }

    /**
     * Aqui no se usan anotaciones en su lugar se ha usado el fichero config/routing.yml
     * para definir la configuracion de la accion "miRutaVariableConYaml"
     *
     */
    public function miRutaVariableConYamlAction($miVariable = 'variableFija'){
        return new Response('Este es el contenido de la url /variable, has usado la ruta: '.$miVariable);
    }

    /**
     * @Route ("/todo/{id}/",
     * requirements = {"id" = "\d+"},
     * name="todo")
     */
    public function todoAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $arr = array(
            'Ciudad'    => is_object( $c = $em->find('AppBundle:Ciudad',$id)  ) ? $c->__toString():null,
            'Oferta'    => is_object( $o = $em->find('AppBundle:Oferta',$id)  ) ? $o->__toString():null,
            'Usuario'   => is_object( $u = $em->find('AppBundle:Usuario',$id) ) ? $u->__toString():null,
            'Tienda'    => is_object( $t = $em->find('AppBundle:Tienda',$id)  ) ? $t->__toString():null
        );
        $arr['findAllUsuario']='';
        if( is_array($u = $em->getRepository('AppBundle:Usuario')->findAll()) ) {
            foreach ($u as $k => $v) {
                $arr['findAllUsuario'] = 'nom_apell: '. $v->__toString().' | email: '.$v->getEmail()
                . ' | ciudadUsuario: '.$v->getCiudad(). ' | idCiudadUsuario: '.$v->getCiudad()->getId() ;
            }
        }

        return new Response( var_dump($arr));
    }

    /**
     * @Route ("/ciudad/{ciudad_id}/",
     * requirements = {"ciudad_id" = "\d+"},
     * name="ciudad")
     */
    public function ciudadAction($ciudad_id)
    {
        $em = $this->getDoctrine()->getManager();

        $valor =  is_object( $c = $em->find('AppBundle:Ciudad',$ciudad_id)  ) ? $c->__toString():null;

        return new Response($valor);
    }
}
