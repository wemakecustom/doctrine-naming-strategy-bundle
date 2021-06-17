<?php

namespace WMC\DoctrineNamingStrategyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('wmc_doctrine_naming_strategy');

        return $treeBuilder;
    }
}
