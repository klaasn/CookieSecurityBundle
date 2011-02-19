<?php

namespace Sensio\CookieSecurityBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CookieSecurityExtension extends Extension
{

    public function configLoad($config, ContainerBuilder $container)
    {
		$config = array_shift($config);
		$loader = new XmlFileLoader($container, __DIR__.'/../Resources/config');
		$loader->load('security.xml');
	}

    /**
     * @codeCoverageIgnore
     */
    public function getXsdValidationBasePath()
    {
        return __DIR__ . '/../Resources/config/schema';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getNamespace()
    {
        return 'http://www.symfony-project.org/schema/dic/cookiesecurity';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getAlias()
    {
        return 'cookie';

    }

}
