<?php
/**
 * Default controller class.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController.
 *
 * @package AppBundle\Controller
 * @link http://epi.uj.edu.pl
 * @author EPI UJ <epi@uj.edu.pl>
 * @copyright (c) 2016
 */
class DefaultController extends Controller
{
    /**
     * Index action.
     *
     * @Route("/hello/{name}")
     *
     * @param string $name Name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($name)
    {
        return $this->render(
            '@App/Default/index.html.twig',
            ['name' => $name]
        );
    }

}