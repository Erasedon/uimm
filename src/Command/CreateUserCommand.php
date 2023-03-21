<?php
// src/Command/CreateUserCommand.php

namespace App\Command;

use App\Entity\User;
use App\Service\UserService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:create-user',
    description: 'Creates a new user.',
    hidden: false,
    aliases: ['app:add-user']
)]
class CreateUserCommand extends Command
{
    protected static $defaultDescription = 'Creates a new user.';
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Create a new user')
             ->addArgument('email', InputArgument::REQUIRED, 'User email')
             ->addArgument('password', InputArgument::REQUIRED, 'User password')
             ->addArgument('roles', InputArgument::REQUIRED, 'User roles');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $email = $input->getArgument('email');
        $password = $input->getArgument('password');
        $roles = $input->getArgument('roles');

        $this->userService->createUser($email, $password, $roles);

        $output->writeln('User created successfully!');

        return Command::SUCCESS;
    }
}
