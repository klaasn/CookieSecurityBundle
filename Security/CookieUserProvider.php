<?php

namespace CookieSecurityBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManager;

class CookieUserProvider implements UserProviderInterface
{
    private $_em;

    public function __construct($em)
    {
        $this->_em = $em;
    }

    public function loadUserByUsername($userName) {

        if ($userName instanceOf UserInterface) {
            $userName = $userName->getUserName();
        }

        return $this->_em
            ->getRepository('WSL\BackendBundle\Entity\User')
            ->findOneBy(array('login' => $userName));
    }

    public function loadUser(UserInterface $user) {

        $username = $user->getUserName();
        return $this->loadUserByUsername($username);
    }

    function supportsClass($class) {}

}
