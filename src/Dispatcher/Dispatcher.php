<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_ks_contacts_birthday
 *
 * @copyright   (C) 2024 Sergey Kuznetsov
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Module\KsContactsBirthday\Site\Dispatcher;

use Joomla\CMS\Application\CMSApplicationInterface;
use Joomla\CMS\Dispatcher\AbstractModuleDispatcher;
use Joomla\CMS\Extension\ModuleInterface;
use Joomla\Input\Input;
use Joomla\Registry\Registry;
use Joomla\Module\KsContactsBirthday\Site\Helper\KsContactsBirthdayHelper;

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * Dispatcher class for mod_ks_contacts_birthday
 *
 * @since  1.0.1
 */
class Dispatcher extends AbstractModuleDispatcher
{
    /**
     * Returns the layout data.
     *
     * @return  array
     *
     * @since   1.0.1
     */
    private $moduleExtension;

    public function __construct(\stdClass $module, CMSApplicationInterface $app, Input $input)
    {
        parent::__construct($module, $app, $input);
    }

    protected function getLayoutData()
    {
        $data = parent::getLayoutData();
        $helper = $this->app->bootModule('mod_ks_contacts_birthday', 'Site')->getHelper('KsContactsBirthdayHelper');
        $data['contacts'] = $helper->getContacts($data['params'], $this->getApplication());
        return $data;
    }
}
