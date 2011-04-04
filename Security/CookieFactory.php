<?php

namespace CookieSecurityBundle\Security;

use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\SecurityFactoryInterface;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;

class CookieFactory implements SecurityFactoryInterface
{
    public function getPosition()
    {
        return 'http';
    }

    public function getKey()
    {
        return 'cookie';
    }

    public function create(ContainerBuilder $container, $id, $config, $userProvider, $defaultEntryPoint)
    {
        // with user provider
        if (isset($config['provider'])) {
            $provider = 'security.authentication.cookie.provider.'.$id;
            $container
                ->setDefinition($provider, new DefinitionDecorator('security.authentication.cookie.provider'))
                ->addArgument(new Reference($userProvider))
                ->addArgument(new Reference('security.user_checker'));
        } else {
            $provider = 'security.authentication.cookie.provider';
        }

        // listener
        $listenerId = 'security.authentication.cookie.listener.'.$id;
        $listener = $container->setDefinition($listenerId, new DefinitionDecorator('security.authentication.cookie.listener'));
        //$listener->setArgument(2, $id);

        if (null === $defaultEntryPoint) {
            $defaultEntryPoint = 'security.authentication.myform_entry_point';
        }

        return array($provider, $listenerId, $defaultEntryPoint);
    }


    public function addConfiguration(NodeDefinition $node)
    {
        $node->children()->scalarNode('provider')->end();
    }

}
