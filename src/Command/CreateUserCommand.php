<?php

// src/Command/CreateUserCommand.php

namespace App\Command;

use App\Service\UserService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Notifier\Recipient\Recipient;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\SecurityBundle\Security\FirewallAwareTrait;
use Symfony\Component\Security\Http\LoginLink\LoginLinkNotification;
use Symfony\Component\Security\Http\LoginLink\LoginLinkHandlerInterface;

#[AsCommand(
    name: 'app:create-user',
    description: 'Creates a new user.',
    hidden: false,
    aliases: ['app:add-user']
)]
class CreateUserCommand extends Command
{
    use FirewallAwareTrait;
    protected static $defaultName = 'app:create-user';
    protected static $defaultDescription = 'Creates a new user.';

    private $userService;
    private $loginLinkHandler;
    private $notifier;

    public function __construct(UserService $userService, LoginLinkHandlerInterface $loginLinkHandler, NotifierInterface $notifier)
    {
        
        $this->userService = $userService;
        $this->loginLinkHandler = $loginLinkHandler;
        $this->notifier = $notifier;
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

        $user = $this->userService->createUser($email, $password, $roles);

        $loginLinkDetails = $this->loginLinkHandler->createLoginLink($user);

        // create a notification based on the login link details
        $notification = new LoginLinkNotification($loginLinkDetails,'Bienvenue aux centres de l\'UIMM!');
        
        // create a recipient for this user
        $recipient = new Recipient($user->getEmail());

        // send the notification to the user
        $this->notifier->send($notification, $recipient);

        $output->writeln('User created successfully and login link sent!');

        return Command::SUCCESS;
    }
}
