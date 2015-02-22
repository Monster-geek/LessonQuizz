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


    public function quizzdemoAction()
    {

        $current_user = $this->get('security.context')->getToken()->getUser();

        return $this->render('QuizzQuizzBundle:Student:quizzdemo.html.twig', array('user'=>$current_user));


    }

    public function quizzSumAction()
    {
        $current_user = $this->get('security.context')->getToken()->getUser();

        // Here, we load theme by looking if the classroom of the student can access it.
        // First, we get the id of the classroom of the current user
        $id_class = $current_user->getFkIdclass()->getId();

        //then we need to get the list of the themes who are available for this classroom
        $db_allowedTheme = $this->getDoctrine()->getRepository('QuizzQuizzBundle:classHasTheme');
        $allowed_theme = $db_allowedTheme->findBy(array('class_id'=>$id_class));

        // Now time to get theme from this.
        foreach($allowed_theme as $theme)
        {
            $array_theme[] = $theme->getThemeId();
        }

        //Now we can ask for the themes we need
        foreach($array_theme as $row)
        {

            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery(
                'SELECT t
                FROM QuizzQuizzBundle:Themes t
                WHERE t.id = :id'
            )->setParameter('id', $row);

            $themes[] = $query->getResult()[0];
        }

        // we'll make it simple for display in template
        foreach($themes as $t)
        {
            $display_array[] = array('name'=>$t->getName(), 'description'=>$t->getDescription());
        }


        return $this->render('QuizzQuizzBundle:Student:ThemeSummary.html.twig',array('user'=>$current_user, 'themes'=>$display_array ));
    }
} 