<?php

namespace CookieSecurityBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;

class CookieSecurityExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
		$loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
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
        return 'http://www.symfony.org/schema/dic/cookiesecurity';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getAlias()
    {
        return 'cookie_security';
    }

}
