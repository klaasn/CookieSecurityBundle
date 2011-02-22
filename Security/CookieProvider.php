<?php

namespace CookieSecurityBundle\Security;

use Symfony\Component\Security\Core\Authentication\Provider\PreAuthenticatedAuthenticationProvider;
use Symfony\Component\Security\Core\Authentication\Token\PreAuthenticatedToken;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;


class CookieProvider extends PreAuthenticatedAuthenticationProvider
{

}
