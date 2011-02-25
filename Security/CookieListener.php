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
        $cookies = $request->cookies;
        foreach ($cookies->keys() as $key) {
            if (strpos($key, 'wordpressuser_') === 0) {
                return array($cookies->get($key), '');
            }
        }
    }
}

