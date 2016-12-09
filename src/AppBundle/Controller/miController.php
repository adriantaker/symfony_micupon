<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 8/12/16
 * Time: 8:43
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class miController extends Controller
{

    /**
     * @Route ("/{variable}/mipagina/", name="mipagina")
     */
    public function variableAction(Request $r, $variable){

        return new Response('Este es el contenido de la url /{variable}/mipagina, has usado la ruta: '.$variable.'/mipagina/ <br> IP Visita:    '. $r->getClientIp());
    }
}