<?php

namespace Quizz\QuizzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    public function indexAction()
    {

        if ($this->get('security.context')->isGranted('ROLE_ADMIN'))
        {
            return $this->redirect($this->generateUrl('admin_home') , 301 );
        }
        elseif($this->get('security.context')->isGranted('ROLE_TEACHER'))
        {
            return $this->redirect($this->generateUrl('teacher_home'),301);
        }
        elseif($this->get('security.context')->isGranted('ROLE_STUDENT'))
        {
            return $this->redirect($this->generateUrl('student_home'),301);
        }
        else
        {
            return $this->render('QuizzQuizzBundle:Login:login.html.twig');
        }


    }
}
