<?php
/*
 * This file is part of chrisguitarguy/request-id-bundle

 * Copyright (c) Christopher Davis <http://christopherdavis.me>
 *
 * For full copyright information see the LICENSE file distributed
 * with this source code.
 *
 * @license     http://opensource.org/licenses/MIT MIT
 */

namespace Chrisguitarguy\RequestId\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $tree = new TreeBuilder();
        $root = $tree->root('chrisguitarguy_request_id');

        $root
            ->children()
            ->scalarNode('request_header')
                ->cannotBeEmpty()
                ->defaultValue('Request-Id')
                ->info('The header in which the bundle will look for and set request IDs')
            ->end()
            ->scalarNode('response_header')
                ->cannotBeEmpty()
                ->defaultValue('Request-Id')
                ->info('The header the bundle will set the request ID at in the response')
            ->end()
            ->scalarNode('storage_service')
                ->info('The service name for request ID storage. Defaults to `SimpleIdStorage`')
            ->end()
            ->scalarNode('generator_service')
                ->info('The service name for the request ID generator. Defaults to `Uuid4IdGenerator`')
            ->end()
        ;

        return $tree;
    }
}