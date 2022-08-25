<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/insert/user', name: 'app_signup')]
    public function createUser(EntityManagerInterface $doctrine, UserPasswordHasherInterface $hasher):Response
    {
        $user = new User();
        $user->setUsername("jaime");
        $user->setPassword($hasher -> hashPassword($user,"1234"));
        $user->setName("Jaime");

        $user2 = new User();
        $user2->setUsername("admin");
        $user2->setPassword($hasher->hashPassword($user, "admin"));
        $user2->setName("Admin");
        $user2->setRoles(["ROLE_ADMIN"]);

        $doctrine->persist($user);
        $doctrine->persist($user2);
            $doctrine->flush();

        return new Response("Usuario creado correctamente");
    }
}
