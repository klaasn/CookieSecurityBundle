<?php

namespace CookieSecurityBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\User;
use WSL\BackendBundle\Model\UserQuery;

class CookieUserProvider implements UserProviderInterface
{
    function loadUserByUsername($username) {

        $user = UserQuery::getUserWithPermissions($username);
        $permissions = array_keys(unserialize($user->getPermission()));

        $upperCasedPerms = array();

        foreach ($permissions as $key) {
            $upperCasedPerms[] = 'ROLE_' . strtoupper($key);
        }

        return new User($username, $user->getPassword(), $upperCasedPerms);
    }

    function loadUser(UserInterface $user) {

        $username = $user->getUserName();

        return $this->loadUserByUsername($username);

    }

    function supportsClass($class) {}

}
