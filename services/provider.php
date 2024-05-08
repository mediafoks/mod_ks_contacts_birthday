<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_ks_contacts_birthday
 *
 * @copyright   (C) 2024 Sergey Kuznetsov
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Extension\Service\Provider\HelperFactory;
use Joomla\CMS\Extension\Service\Provider\Module;
use Joomla\CMS\Extension\Service\Provider\ModuleDispatcherFactory;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

/**
 * The Ks contacts birthday module service provider.
 *
 * @since  1.0.1
 */
return new class() implements ServiceProviderInterface
{
    /**
     * Registers the service provider with a DI container.
     *
     * @param   Container  $container  The DI container.
     *
     * @return  void
     *
     * @since   1.0.1
     */
    public function register(Container $container)
    {
        $container->registerServiceProvider(new ModuleDispatcherFactory('\\Joomla\\Module\\KsContactsBirthday'));
        $container->registerServiceProvider(new HelperFactory('\\Joomla\\Module\\KsContactsBirthday\\Site\\Helper'));

        $container->registerServiceProvider(new Module());
    }
};
