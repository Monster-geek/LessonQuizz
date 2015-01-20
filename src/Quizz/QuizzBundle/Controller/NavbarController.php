<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 19/01/15
 * Time: 14:04
 */

namespace Quizz\QuizzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NavbarController extends Controller {

    public function navBarAction()
    {
        return $this->render('QuizzQuizzBundle:Front:NavBar.html.twig');
    }

} 