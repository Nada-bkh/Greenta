<?php

namespace ContainerYDlDDKA;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Upn6fXRService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.upn6fXR' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.upn6fXR'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'quiz' => ['privates', '.errored..service_locator.upn6fXR.App\\Entity\\Quiz', NULL, 'Cannot autowire service ".service_locator.upn6fXR": it references class "App\\Entity\\Quiz" but no such service exists.'],
        ], [
            'entityManager' => '?',
            'quiz' => 'App\\Entity\\Quiz',
        ]);
    }
}