<?php

namespace App\Infrastructure\Security;

use App\Domain\Entity\Usuario;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * @method UserInterface loadUserByIdentifier(string $identifier)
 */
class UserProvider implements UserProviderInterface
{

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof Usuario) {
            throw new UnsupportedUserException(sprintf('Invalid user class "%s".', get_class($user)));
        }

        return $user;
    }

    public function supportsClass(string $class)
    {
        return Usuario::class === $class || is_subclass_of($class, \Zuske\AuthClient\Security\Usuario::class);
    }

    public function loadUserByUsername(string $username)
    {
        dump($username);
        exit();
    }

    public function __call(string $name, array $arguments)
    {
        // TODO: Implement @method UserInterface loadUserByIdentifier(string $identifier)
    }
}