<?php

namespace CookieSecurityBundle\Security;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Firewall\AbstractPreAuthenticatedListener;
use Symfony\Component\HttpFoundation\Request;

/**
 * Facebook authentication listener.
 */
class CookieListener extends AbstractPreAuthenticatedListener
{
    protected function getPreAuthenticatedData(Request $request)
    {
        return array('klaas','password');
    }

}

