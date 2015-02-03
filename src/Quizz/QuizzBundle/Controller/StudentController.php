<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 04/02/15
 * Time: 00:05
 */

namespace Quizz\QuizzBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StudentController extends Controller {

    public function indexAction()
    {

        $current_user = $this->get('security.context')->getToken()->getUser();

        return $this->render('QuizzQuizzBundle:Front:TestHome.html.twig', array('user'=>$current_user));
    }

} 