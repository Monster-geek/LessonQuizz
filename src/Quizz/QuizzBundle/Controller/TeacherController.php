<?php

namespace Quizz\QuizzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Quizz\QuizzBundle\Entity\Classroom;
use Quizz\QuizzBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Request;

class TeacherController extends Controller {

    public function indexAction()
    {

        $current_user = $this->get('security.context')->getToken()->getUser();

        return $this->render('QuizzQuizzBundle:Front:TestHome.html.twig', array('user'=>$current_user));

    }

    public function addStudentAction(Request $request)
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
        $student = new Users();

        // Set his role
        $student->setRoles('ROLE_STUDENT');

        // Building the form
        $form = $this->createFormBuilder($student)
            ->setAction($this->generateUrl('teacher_addstudent'))
            ->setMethod('POST')
            ->add('name', 'text', array('attr' => array('class' => 'form-control' , 'placeholder' => 'Nom de l\'étudiant')))
            ->add('lastname' , 'text' ,array('attr' => array('class' => 'form-control' , 'placeholder' => 'Prenom de l\'étudiant')))
            ->add('email' , 'text' , array('attr' => array('class' => 'form-control' , 'placeholder' => 'Adresse email')))
            ->add('Ajout' , 'submit' , array('attr'=>array('class'=> 'btn btn-default')))
            ->getForm();

        //Catch the subit of the form
        $form->handleRequest($request);

        if ($form->isValid()) {

            // Time to do some custom operation :)

            // First : let's generate the new password for the student.
            // Warn : It's not a safe password. It must be change a the first login.
            $password = uniqid();
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($student);
            $encodedPassword = $encoder->encodePassword($password, $student->getSalt());
            $student->setPassword($encodedPassword);

            // Then the username
            $lastname = $student->getLastname();
            $lastname = substr(strtolower(rtrim($lastname)), 0 , 1);
            $username = $lastname.strtolower(rtrim($student->getName()));

            // Here doctrine will check if it's ok
            $db_student = $this->getDoctrine()->getRepository('QuizzQuizzBundle:Users');
            $check = $db_student->findBy(array('username'=>$username));

            // This huge block will check in the database if the username is available.
            // if not it will add a digit at the end of the username like this : 'example1'
            if(!$check)
            {
                // If the username is free, let's go !
                $student->setUsername($username);
                // Doctrine section. Will persist the user in the database.
                $em = $this->getDoctrine()->getManager();
                $em->persist($student);
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
                $student->setUsername($username);
                // Doctrine section. Will persist the user in the database.
                $em = $this->getDoctrine()->getManager();
                $em->persist($student);
                $em->flush();
            }

            // Will redirect on the sucess page and display some usefull params like the passwords and the final username.
            $param = array('password'=>$password , 'username' => $username , 'Sucess' => 'OK');
            return $this->redirect($this->generateUrl('teacher_addstudent',$param));
        }

        $current_user = $this->get('security.context')->getToken()->getUser();

        return $this->render('QuizzQuizzBundle:Teacher:AddStudent.html.twig', array('user'=>$current_user, 'form' => $form->createView() , 'add_box' =>$allow_box , 'login_info' => $login_info));

    }

    public function addClassroomAction(Request $request)
    {

        $classroom = new Classroom();

        $classroom->setName('');

        $form = $this->createFormBuilder($classroom)
            ->setAction($this->generateUrl('teacher_addclassroom'))
            ->setMethod('POST')
            ->add('name', 'text', array('attr' => array('class' => 'form-control' , 'placeholder' => 'Libéllé de la classe')))
            ->add('Ajout' , 'submit' , array('attr'=>array('class'=> 'btn btn-default')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($classroom);
            $em->flush();


            return $this->redirect($this->generateUrl('teacher_addstudent'));
        }

        $current_user = $this->get('security.context')->getToken()->getUser();

        return $this->render('QuizzQuizzBundle:Teacher:AddClassroom.html.twig',array('user'=>$current_user , 'form' => $form->createView()));
    }

} 