<?php


namespace RotateApp\Backoffice\Users\Domain;


use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{

    private int $id;

    private string $username;

    private string $password;

    /**
     * User constructor.
     * @param string $username
     */
    public function __construct( string $username)
    {
        $this->username = $username;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getSalt()
    {
        return 'ajadaduiaduadsa';
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }


}