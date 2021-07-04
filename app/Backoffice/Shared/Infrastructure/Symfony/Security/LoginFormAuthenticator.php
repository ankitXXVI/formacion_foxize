<?php


namespace RotateApp\Backoffice\Shared\Infrastructure\Symfony\Security;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    private UserProvider $userProvider;

    // change the 'InMemoryUserProvider' type-hint in the constructor if
    // you are injecting a different type of user provider
    public function __construct(UserProvider $userProvider)
    {
        $this->userProvider = $userProvider;
    }

    protected function getLoginUrl()
    {
        // TODO: Implement getLoginUrl() method.
    }

    public function supports(Request $request)
    {
        // TODO: Implement supports() method.
    }

    public function getCredentials(Request $request)
    {
        // TODO: Implement getCredentials() method.
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        // TODO: Implement getUser() method.
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        // TODO: Implement checkCredentials() method.
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey)
    {
        // TODO: Implement onAuthenticationSuccess() method.
    }
}