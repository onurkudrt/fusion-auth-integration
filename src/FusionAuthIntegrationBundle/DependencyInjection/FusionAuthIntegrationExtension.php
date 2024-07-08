<?php
// src/FusionAuthIntegrationBundle/DependencyInjection/FusionAuthIntegrationExtension.php

namespace FusionAuthIntegrationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use FusionAuthIntegrationBundle\DependencyInjection\Configuration;

class FusionAuthIntegrationExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
//

        // Process configuration
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader($container, new FileLocator($container->getParameter('kernel.project_dir')."vendor/onurlib/fusion-auth-integration-bundle/src/FusionAuthIntegrationBundle/Resources/config/"));
        $loader->load('fusion_auth_integration.yaml');

        // Set parameters
        if (isset($config['api_key'])) {
            $container->setParameter('fusion_auth_integration.api_key', $config['api_key']);
        }
        if (isset($config['server']['url'])) {
            $container->setParameter('fusion_auth_integration.server.url', $config['server']['url']);
        }
        if (isset($config['server']['username'])) {
            $container->setParameter('fusion_auth_integration.server.username', $config['server']['username']);
        }
        if (isset($config['server']['password'])) {
            $container->setParameter('fusion_auth_integration.server.password', $config['server']['password']);
        }
    }

    public function getAlias(): string
    {
        return 'fusion_auth_integration';
    }

    public function getConfiguration(array $config, ContainerBuilder $container): ConfigurationInterface
    {
        return new Configuration();
    }

}