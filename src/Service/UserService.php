<?php
// src/Service/UserService.php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createUser(string $email, string $password,string $roles ): void
    {
        // Vérifier si l'utilisateur existe déjà
        $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        if ($existingUser !== null) {
            throw new \InvalidArgumentException(sprintf('User with email "%s" already exists.', $email));
        }

        // Créer un nouvel utilisateur
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setRoles([$roles]);

        // Enregistrer l'utilisateur en base de données
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
