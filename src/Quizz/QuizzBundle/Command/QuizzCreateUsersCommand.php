<?php

namespace Quizz\QuizzBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Quizz\QuizzBundle\Entity\Users;

class QuizzCreateUsersCommand extends ContainerAwareCommand {

    protected function configure()
    {
        $this
            ->setName('quizz:create:user')
            ->setDescription('Creer un user student pour le quizz')
            ->addArgument('username',InputArgument::REQUIRED)
            ->addArgument('name',InputArgument::REQUIRED )
            ->addArgument('lastname',InputArgument::REQUIRED)
            ->addArgument('email',InputArgument::REQUIRED)
            ->addArgument('password',InputArgument::REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');
        $name = $input->getArgument('name');
        $lastname = $input->getArgument('lastname');
        $email= $input->getArgument('email');

        $em = $this->getContainer()->get('doctrine')->getEntityManager();

        $user = new Users();
        $user->setUsername($username);
        // encode the password
        $factory = $this->getContainer()->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $encodedPassword = $encoder->encodePassword($password, $user->getSalt());
        $user->setPassword($encodedPassword);
        $user->setRoles('ROLE_TEACHER');
        $user->setName($name);
        $user->setLastname($lastname);
        $user->setEmail($email);
        $user->setIsActive(true);
        $em->persist($user);
        $em->flush();

        $output->writeln(sprintf('Added %s user with password %s', $username, $password));
    }

} 