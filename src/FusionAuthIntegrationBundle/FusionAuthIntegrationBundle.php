<?php
// src/FusionAuthIntegrationBundle/FusionAuthIntegrationBundle.php

namespace FusionAuthIntegrationBundle;

use FusionAuthIntegrationBundle\DependencyInjection\FusionAuthIntegrationExtension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class FusionAuthIntegrationBundle extends Bundle
{
    public function getPath(): string
    {
        return dirname(__DIR__);
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new FusionAuthIntegrationExtension();
        }

        return $this->extension;
    }

    public function build(ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/Resources/config'));
        $loader->load('fusion_auth_integration.yaml');
        parent::build($container);
    }

}



