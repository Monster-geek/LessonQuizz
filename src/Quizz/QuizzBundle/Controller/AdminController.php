<?php

namespace Quizz\QuizzBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Quizz\QuizzBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends Controller {

    public function indexAction()
    {
        $current_user = $this->get('security.context')->getToken()->getUser();

        // Count theme
        $db_theme = $this->getDoctrine()->getRepository('QuizzQuizzBundle:Themes');
        $all_theme = $db_theme->findAll();
        $nb_theme = 0;
        foreach($all_theme as $t)
        {
            $nb_theme++;
        }
        // Count Student && teachers
        $db_student = $this->getDoctrine()->getRepository('QuizzQuizzBundle:Users');
        $all_student = $db_student->findAll();
        $nb_student = 0;
        $nb_teacher = 0;
        foreach($all_student as $s)
        {
            if($s->getRoles()[0] == 'ROLE_STUDENT')
            {
                $nb_student++;
            }
            elseif($s->getRoles()[0] == 'ROLE_TEACHER')
            {
                $nb_teacher++;
            }

        }
        //Count Classroom
        $db_classroom = $this->getDoctrine()->getRepository('QuizzQuizzBundle:Classroom');
        $all_classroom = $db_classroom->findAll();
        $nb_classroom = 0;
        foreach($all_classroom as $c)
        {
            $nb_classroom++;
        }

        return $this->render('QuizzQuizzBundle:Admin:Home.html.twig', array('user'=>$current_user,
                                                                                'nbtheme'=>$nb_theme,
                                                                                'nbstudent'=>$nb_student ,
                                                                                'nbclassroom'=>$nb_classroom ,
                                                                                'nbteacher'=>$nb_teacher));
    }

    public function addTeacherAction(Request $request)
    {

        // Display the username and the password added
        // TODO : Implent mail system to send this to the students
        $add_sucess = $request->query->get('Sucess');
        if($add_sucess == 'OK')
        {
            $allow_box = true;
            $login_info = array('username'=>$request->query->get('username') , 'password'=>$request->query->get('password'));
        }
        else
        {
            $allow_box = false;
            $login_info = array();
        }

        // Init a new user object
        $teacher = new Users();

        // Set his role
        $teacher->setRoles('ROLE_TEACHER');

        // Building the form
        $form = $this->createFormBuilder($teacher)
            ->setAction($this->generateUrl('admin_addteacher'))
            ->setMethod('POST')
            ->add('name', 'text', array('attr' => array('class' => 'form-control' , 'placeholder' => 'Nom du professeur')))
            ->add('lastname' , 'text' ,array('attr' => array('class' => 'form-control' , 'placeholder' => 'Prenom du professeur')))
            ->add('email' , 'text' , array('attr' => array('class' => 'form-control' , 'placeholder' => 'Adresse email')))
            ->add('Ajout' , 'submit' , array('attr'=>array('class'=> 'btn btn-default')))
            ->getForm();

        //Catch the subit of the form
        $form->handleRequest($request);

        if ($form->isValid()) {

            // Now let's generate the new password for the teacher.
            // Warn : It's not a safe password. It must be change a the first login.
            $password = uniqid();
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($teacher);
            $encodedPassword = $encoder->encodePassword($password, $teacher->getSalt());
            $teacher->setPassword($encodedPassword);

            // Then the username
            $lastname = $teacher->getLastname();
            $lastname = substr(strtolower(rtrim($lastname)), 0 , 1);
            $username = $lastname.strtolower(rtrim($teacher->getName()));

            // Here doctrine will check if it's ok
            $db_student = $this->getDoctrine()->getRepository('QuizzQuizzBundle:Users');
            $check = $db_student->findBy(array('username'=>$username));


            // This huge block will check in the database if the username is available.
            // if not it will add a digit at the end of the username like this : 'example1'
            if(!$check)
            {
                // If the username is free, let's go !
                $teacher->setUsername($username);
                // Doctrine section. Will persist the user in the database.
                $em = $this->getDoctrine()->getManager();
                $em->persist($teacher);
                $em->flush();
            }
            else
            {
                // If not let's generate a good one.
                while($check)
                {
                    if($check)
                    {
                        $username = $check[0]->getUsername();
                    }
                    preg_match('/(\d*)$/' , $username , $matches);
                    $username = preg_replace('/(\d*)$/', '',$username);
                    $username .= $matches[1]+1;
                    $check = $db_student->findBy(array('username'=>$username));
                }
                $teacher->setUsername($username);
                // Doctrine section. Will persist the user in the database.
                $em = $this->getDoctrine()->getManager();
                $em->persist($teacher);
                $em->flush();
            }

            // Will redirect on the sucess page and display some usefull params like the passwords and the final username.
            $param = array('password'=>$password , 'username' => $username , 'Sucess' => 'OK');
            return $this->redirect($this->generateUrl('admin_addteacher',$param));
        }

        $current_user = $this->get('security.context')->getToken()->getUser();

        return $this->render('QuizzQuizzBundle:Admin:AddTeacher.html.twig', array('user'=>$current_user,
                                                                                    'form' => $form->createView(),
                                                                                    'add_box' =>$allow_box,
                                                                                    'login_info' => $login_info,
                                                                                    'debug'=>$request));

    }

} 