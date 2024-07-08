<?php

namespace FusionAuthIntegrationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('fusion_auth_integration');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
            ->scalarNode('api_key')
            ->info('Api key')
            ->defaultValue('your_api_key')
            ->end()
            ->arrayNode('server')
            ->info('Array for server')
            ->children()
            ->scalarNode('url')
            ->defaultValue('')
            ->end()
            ->scalarNode('username')
            ->defaultValue('')
            ->end()
            ->scalarNode('password')
            ->defaultValue('')
            ->end()
            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
