<?php
// src/Controller/SecurityController.php
namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\LoginLink\LoginLinkHandlerInterface;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function requestLoginLink(LoginLinkHandlerInterface $loginLinkHandler, UserRepository $userRepository, Request $request)
    {
        // check if login form is submitted
        if ($request->isMethod('POST')) {
            // load the user in some way (e.g. using the form input)
            $email = $request->request->get('email');
            $user = $userRepository->findOneBy(['email' => $email]);
    
            if ($user !== null) {
                // create a login link for $user this returns an instance
                // of LoginLinkDetails
                echo "error users non connu";
    
                // ... send the link and return a response (see next section)
            } else {
                $loginLinkDetails = $loginLinkHandler->createLoginLink($user);
                $loginLink = $loginLinkDetails->getUrl();
    
                // handle case where user is not found
            }
        }
    
        // if it's not submitted, render the "login" form
        return $this->render('security/login.html.twig');
    }
    
    
    #[Route('/login_check', name: 'login_check')]
    public function check()
    {
        throw new \LogicException('This code should never be reached');
    }

    // ...
}