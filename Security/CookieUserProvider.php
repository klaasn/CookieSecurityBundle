<?php

namespace CookieSecurityBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\AccountInterface;
use Symfony\Component\Security\Core\User\User;

class CookieUserProvider implements UserProviderInterface
{
    function loadUserByUsername($username) {
        return new User($username, '');
    }

    function loadUserByAccount(AccountInterface $account) {
        return new User($account->getUserName(),'');
    }

    function supportsClass($class) {}

}
