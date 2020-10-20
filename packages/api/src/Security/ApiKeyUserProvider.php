<?php

namespace App\Security;

use App\Entity\User as EntityUser;
use App\Services\UserService;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class ApiKeyUserProvider implements UserProviderInterface
{
    /**
     * @var UserService
     */
    protected $userService;

    public function __construct(
        UserService $userService
    )
    {
        $this->userService = $userService;
    }

    public function loadUserByApiKey($apiKey)
    {
        // Look up the username based on the token in the database, via
        // an API call, or do something entirely different
        return $this->userService->findOneByApiKey($apiKey);
    }

    /**
     * @param string $username
     * @return mixed|UserInterface
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function loadUserByUsername($username)
    {
        return $this->userService->findOneByEmailOrUsername($username);
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof EntityUser) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        $username = $user->getEmail();

        return $this->loadUserByUsername($username);
    }

    public function supportsClass($class)
    {
        return EntityUser::class === $class;
    }
}
