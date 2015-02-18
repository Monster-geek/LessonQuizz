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

            // First : let's generate the new password for the student.d
            $password = uniqid();
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($student);
            $encodedPassword = $encoder->encodePassword($password, $student->getSalt());
            $student->setPassword($encodedPassword);

            // Then the username (it must be Unique !)
            $lastname = $student->getLastname();
            $lastname = substr(strtolower(rtrim($lastname)), 0 , 1);
            $username = $lastname.strtolower(rtrim($student->getName()));

            // Here doctrine will check if it's ok but will see this later...
            $db_student = $this->getDoctrine()->getRepository('QuizzQuizzBundle:Users');
            $check = $db_student->findBy(array('username'=>$username));

            //
            if(!$check)
            {
                $student->setUsername($username);
                // Doctrine section. Will persist the user in the database.
                $em = $this->getDoctrine()->getManager();
                $em->persist($student);
                $em->flush();

            }
            else
            {
                $username = $check[0]->getUsername();
                preg_match('/(\d*)$/' , $username , $matches);
                $username .= $matches[1]+1;

                $student->setUsername($username);
                // Doctrine section. Will persist the user in the database.
                $em = $this->getDoctrine()->getManager();
                $em->persist($student);
                $em->flush();

            }

            // Will redirect on the sucess page and display some usefull params like the passwords and the final username.
            $param = array('password'=>$password , 'username' => $username , 'db_student' => $db_student);
            return $this->redirect($this->generateUrl('teacher_home',$param));
        }

        $current_user = $this->get('security.context')->getToken()->getUser();

        return $this->render('QuizzQuizzBundle:Teacher:AddStudent.html.twig', array('user'=>$current_user, 'form' => $form->createView()));

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