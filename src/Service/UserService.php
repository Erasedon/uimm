<?php

// src/Service/UserService.php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService
{
    private $entityManager;
    private $passwordEncoder;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordEncoder)
    {
        $this->entityManager = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function createUser(string $email, string $password, string $roles): User
    {
        // Check if user already exists
        $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        if ($existingUser !== null) {
            throw new \InvalidArgumentException(sprintf('User with email "%s" already exists.', $email));
        }

        // Create a new user
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($this->passwordEncoder->hashPassword($user, $password));
        $user->setRoles([$roles]);

        // Save the user to the database
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}
