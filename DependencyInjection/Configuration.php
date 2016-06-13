<?php

namespace Alexo\ContactBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('contact');
        $rootNode->children()
                     ->arrayNode('receiver_emails')
                         ->prototype('scalar')
                            ->validate()
                            ->ifTrue(function($v) {
                                return filter_var($v, FILTER_VALIDATE_EMAIL) === false;
                            })
                            ->thenInvalid('Wrong email address in configuration')
                         ->end()
                     ->end()
                 ->end()
        ;
        return $treeBuilder;
    }
}
