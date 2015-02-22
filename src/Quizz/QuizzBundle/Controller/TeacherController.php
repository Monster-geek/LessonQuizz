<?php

namespace Quizz\QuizzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Quizz\QuizzBundle\Entity\Classroom;
use Quizz\QuizzBundle\Entity\Users;
use Quizz\QuizzBundle\Entity\Themes;
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
            ->add('fk_idclass', 'entity', array('class' => 'QuizzQuizzBundle:Classroom','property' => 'name'))
            ->add('Ajout' , 'submit' , array('attr'=>array('class'=> 'btn btn-default')))
            ->getForm();

        //Catch the subit of the form
        $form->handleRequest($request);

        if ($form->isValid()) {

            // Now let's generate the new password for the student.
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

            // TODO : Why make a redirection ? Just create a parm to display in the template !
            // Will redirect on the sucess page and display some usefull params like the passwords and the final username.
            $param = array('password'=>$password , 'username' => $username , 'Sucess' => 'OK');
            return $this->redirect($this->generateUrl('teacher_addstudent',$param));
        }

        $current_user = $this->get('security.context')->getToken()->getUser();

        return $this->render('QuizzQuizzBundle:Teacher:AddStudent.html.twig', array('user'=>$current_user,
                                                                                    'form' => $form->createView(),
                                                                                    'add_box' =>$allow_box,
                                                                                    'login_info' => $login_info,
                                                                                    'debug'=>$request));

    }

    // TODO : Improve the error display.
    public function addClassroomAction(Request $request)
    {

        // If we have some GET parameters
        $add_sucess = $request->query->get('error');
        if($add_sucess == true)
        {
            $allow_box = true;
            $classroom_info = array('classroom'=>$request->query->get('name'));
        }
        else
        {
            $allow_box = false;
            $classroom_info = array('');
        }

        $classroom = new Classroom();

        $form = $this->createFormBuilder($classroom)
            ->setAction($this->generateUrl('teacher_addclassroom'))
            ->setMethod('POST')
            ->add('name', 'text', array('attr' => array('class' => 'form-control' , 'placeholder' => 'Libéllé de la classe')))
            ->add('Ajout' , 'submit' , array('attr'=>array('class'=> 'btn btn-default')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $name = $classroom->getName();

            // Check the avaibility in the database.
            $db_classroom = $this->getDoctrine()->getRepository('QuizzQuizzBundle:Classroom');
            $check = $db_classroom->findBy(array('name'=>$name));

            // If the check is ok, it's cool . If not we show an error.
            if(!$check)
            {
                $param = array('error' => false, 'name' => $name);
                $em = $this->getDoctrine()->getManager();
                $em->persist($classroom);
                $em->flush();
            }
            else
            {
                $param = array('error'=> true , 'name' => $name);
            }

            return $this->redirect($this->generateUrl('teacher_addclassroom',$param));
        }

        // Will load all the class fo display.
        $db_classroom = $this->getDoctrine()->getRepository('QuizzQuizzBundle:Classroom');
        $all_classroom = $db_classroom->findAll();

        $array_class = array();
        foreach($all_classroom as $tmp)
        {
            $array_class[$tmp->getId()] = $tmp->getName();
        }

        $current_user = $this->get('security.context')->getToken()->getUser();

        return $this->render('QuizzQuizzBundle:Teacher:AddClassroom.html.twig',array('user'=>$current_user,
                                                                                     'form' => $form->createView(),
                                                                                     'add_box' => $allow_box,
                                                                                     'result' => $classroom_info,
                                                                                     'debug' => $array_class));
    }

    public function quizzSummaryAction(Request $request)
    {
        $current_user = $this->get('security.context')->getToken()->getUser();
        return $this->render('QuizzQuizzBundle:Front:QuizzSum.html.twig', array('user'=>$current_user));
    }

    public function addThemeAction(Request $request)
    {

        $newtheme = new Themes();

        $form = $this->createFormBuilder($newtheme)
            ->setAction($this->generateUrl('teacher_addtheme'))
            ->setMethod('POST')
            ->add('name', 'text', array('attr' => array('class' => 'form-control' , 'placeholder' => 'Nom du thème')))
            ->add('description' , 'textarea' ,array('attr' => array('class' => 'form-control' , 'placeholder' => 'Courte description du thème.')))
            ->add('groups','entity' , array('class' => 'QuizzQuizzBundle:Classroom',
                                                   'property' => 'name',
                                                   'multiple' => true,
                                                   'expanded' => true))
            ->add('Ajout' , 'submit' , array('attr'=>array('class'=> 'btn btn-default')))
            ->getForm();

        //Catch the subit of the form
        $form->handleRequest($request);


        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($newtheme);
            $em->flush();
        }


        $current_user = $this->get('security.context')->getToken()->getUser();
        return $this->render('QuizzQuizzBundle:Teacher:AddTheme.html.twig',array('user'=>$current_user ,
                                                                                 'form'=>$form->createView()
                                                                                 ));
    }
}