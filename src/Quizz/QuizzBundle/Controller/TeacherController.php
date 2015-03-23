<?php

namespace Quizz\QuizzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Quizz\QuizzBundle\Entity\Classroom;
use Quizz\QuizzBundle\Entity\Users;
use Quizz\QuizzBundle\Entity\Themes;
use Symfony\Component\HttpFoundation\Request;

use Quizz\QuizzBundle\Entity\classHasTheme;

class TeacherController extends Controller {

    public function indexAction()
    {
        $current_user = $this->get('security.context')->getToken()->getUser();

        // Count theme
        $db_theme = $this->getDoctrine()->getRepository('QuizzQuizzBundle:Themes');
        $all_theme = $db_theme->findBy(array('fk_autorid'=>$current_user));
        $nb_theme = 0;
        foreach($all_theme as $t)
        {
            $nb_theme++;
        }
        // Count Student
        $db_student = $this->getDoctrine()->getRepository('QuizzQuizzBundle:Users');
        $all_student = $db_student->findBy(array('roles'=>'ROLE_STUDENT'));
        $nb_student = 0;
        foreach($all_student as $s)
        {
            $nb_student++;
        }
        //Count Classroom
        $db_classroom = $this->getDoctrine()->getRepository('QuizzQuizzBundle:Classroom');
        $all_classroom = $db_classroom->findAll();
        $nb_classroom = 0;
        foreach($all_classroom as $c)
        {
            $nb_classroom++;
        }


        return $this->render('QuizzQuizzBundle:Teacher:Home.html.twig', array('user'=>$current_user,
                                                                              'nbtheme'=>$nb_theme,
                                                                              'nbstudent'=>$nb_student ,
                                                                              'nbclassroom'=>$nb_classroom));
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

    public function addClassroomAction(Request $request)
    {
        $classroom = new Classroom();

        $form = $this->createFormBuilder($classroom)
            ->setAction($this->generateUrl('teacher_addclassroom'))
            ->setMethod('POST')
            ->add('name', 'text', array('attr' => array('class' => 'form-control' , 'placeholder' => 'Libéllé de la classe')))
            ->add('Ajout' , 'submit' , array('attr'=>array('class'=> 'btn btn-default')))
            ->getForm();

        $form->handleRequest($request);

        $array_error = false;

        if ($form->isValid()) {

            $name = $classroom->getName();

            // Check the avaibility in the database.
            $db_classroom = $this->getDoctrine()->getRepository('QuizzQuizzBundle:Classroom');
            $check = $db_classroom->findBy(array('name'=>$name));

            // If the check is ok, it's cool . If not we show an error.
            if(!$check)
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($classroom);
                $em->flush();

                // Define the param to tell it's ok.
                $array_error = array('code'=> '0', 'msg'=>'Classe ajouté avec succès.');
            }
            else
            {
                // We have an error. The classroom already exist
                $array_error = array('code'=>'1' , 'msg'=>'Cette classe existe déjà dans la base de données !');
            }
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
                                                                                     'listclass' => $array_class,
                                                                                     'error'=>$array_error));
    }

    public function addThemeAction(Request $request)
    {

        $newtheme = new Themes();

        $form = $this->createFormBuilder($newtheme)
            ->setAction($this->generateUrl('teacher_addtheme'))
            ->setMethod('POST')
            ->add('name', 'text', array('attr' => array('class' => 'form-control' ,
                                                        'placeholder' => 'Nom du thème')))
            ->add('description' , 'textarea' ,array('attr' => array('class' => 'form-control' ,
                                                                    'placeholder' => 'Courte description du thème.')))
            ->add('themes_array','entity' , array('class' => 'QuizzQuizzBundle:Classroom',
                                            'property' => 'name',
                                            'multiple' => true,
                                            'expanded' => true))
            ->add('Ajout' , 'submit' , array('attr'=>array('class'=> 'btn btn-default')))
            ->getForm();

        $array_error = false;

        //Catch the subit of the form
        $form->handleRequest($request);
        if($form->isValid())
        {
            // Check the avaibility in the database.
            $name = $newtheme->getName();
            $db_themes = $this->getDoctrine()->getRepository('QuizzQuizzBundle:Themes');
            $check = $db_themes->findBy(array('name'=>$name));



            // If the check is ok, it's cool . If not we show an error.
            if(!$check)
            {

                $author_id = $current_user = $this->get('security.context')->getToken()->getUser();
                $newtheme->setFkAutorid($author_id);

                $em = $this->getDoctrine()->getManager();
                $em->persist($newtheme);
                $em->flush();

                // Define the param to tell it's ok.
                $array_error = array('code'=> '0', 'msg'=>'Théme ajouté avec succès.');
            }
            else
            {
                // We have an error. The classroom already exist
                $array_error = array('code'=>'1' , 'msg'=>'Ce théme existe déjà dans la base de données !');
            }



        }


        $current_user = $this->get('security.context')->getToken()->getUser();
        return $this->render('QuizzQuizzBundle:Teacher:AddTheme.html.twig',array('user'=>$current_user ,
                                                                                 'error'=>$array_error,
                                                                                 'form'=>$form->createView()
        ));
    }

    public function addLevelsAction(Request $request)
    {

    }

    public function addQuizzAction(Request $request)
    {

    }

    public function themeSummaryAction()
    {
        $current_user = $this->get('security.context')->getToken()->getUser();

        // Here we don't nee to load Theme by classroom. Teacher can see all Themes.
        $db_theme = $this->getDoctrine()->getRepository('QuizzQuizzBundle:Themes');
        $all_theme = $db_theme->findBy(array('fk_autorid'=>$current_user));

        // we'll make it simple for display in template
        $display_array = array();
        foreach($all_theme as $t)
        {
            $display_array[] = array('name'=>$t->getName(),
                                     'description'=>$t->getDescription(),
                                     'levelLink'=>$this->generateUrl('teacher_levelsum',array('theme'=>$t->getName())));
        }


        return $this->render('QuizzQuizzBundle:Teacher:ThemeSum.html.twig', array('user'=>$current_user,
                                                                                'themes'=>$display_array));
    }

    public function showLevelsAction(Request $request)
    {
        // This function must call all the levels for the one theme.
        // For teacher the view must contain one tool to add more level to the thème.
        $current_user = $this->get('security.context')->getToken()->getUser();

        return $this->render('QuizzQuizzBundle:Teacher:LevelSum.html.twig',array('user'=>$current_user));
    }

    public function showQuizzAction(Request $request)
    {
        // This function must call all the quizz for one level of a theme.
        // This feature is only for teacher.
        $current_user = $this->get('security.context')->getToken()->getUser();

        return $this->render('QuizzQuizzBundle:Teacher:QuizzSum.html.twig',array('user'=>$current_user));
    }
}