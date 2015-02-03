<?php

namespace Quizz\QuizzBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller {

    public function indexAction()
    {
        $current_user = $this->get('security.context')->getToken()->getUser();

        return $this->render('QuizzQuizzBundle:Front:TestHome.html.twig', array('user'=>$current_user));
    }

} 