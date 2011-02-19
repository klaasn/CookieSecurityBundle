<?php

namespace Sensio\CookieSecurityBundle\Security;


use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\AbstractFactory;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class CookieFactory extends AbstractFactory
{
    public function __construct()
    {
    }

    public function getPosition()
    {
        return 'pre_auth';
    }

    public function getKey()
    {
        return 'cookie';
    }

    protected function getListenerId()
    {
        return 'security.authentication.cookie.listener';
    }

    protected function createAuthProvider(ContainerBuilder $container, $id, $config, $userProviderId)
    {
        $provider = 'security.authentication.cookie.provider.'.$id;

        $container
            ->setDefinition($authProviderId, new DefinitionDecorator('security.authentication.cookie.provider'))
            ->addArgument(new Reference($userProviderId))
            ->addArgument(new Reference('security.account_checker'))

        return $provider;
    }

}
