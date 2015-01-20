<?php

namespace Quizz\QuizzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller{

    public function indexAction()
    {
        return $this->render('QuizzQuizzBundle:Front:TestHome.html.twig');
    }
}