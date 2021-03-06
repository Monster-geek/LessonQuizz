<?php

namespace Quizz\QuizzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller{

    public function indexAction()
    {

        $current_user = $this->get('security.context')->getToken()->getUser();

        return $this->render('QuizzQuizzBundle:Front:TestHome.html.twig', array('user'=>$current_user));
    }

    public function teacherAction()
    {
        return $this->render('QuizzQuizzBundle:Front:tpl_home.html.twig');
    }

}