<?php

namespace Quizz\QuizzBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Quizz\QuizzBundle\Entity\Users;

class QuizzAdminCommand extends ContainerAwareCommand {

    protected function configure()
    {
        $this
            ->setName('quizz:admin:create')
            ->setDescription('Creer un admin pour le quizz')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = 'admin';
        $password = 'admin';

        $em = $this->getContainer()->get('doctrine')->getEntityManager();

        $user = new Users();
        $user->setUsername($username);
        // encode the password
        $factory = $this->getContainer()->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $encodedPassword = $encoder->encodePassword($password, $user->getSalt());
        $user->setPassword($encodedPassword);
        $user->setRoles('ROLE_ADMIN');
        $user->setName('ADMIN');
        $user->setLastname('Admin');
        $user->setEmail('admin@admin.com');
        $user->setIsActive(true);
        $em->persist($user);
        $em->flush();

        $output->writeln(sprintf('Added %s user with password %s', $username, $password));
    }

} 