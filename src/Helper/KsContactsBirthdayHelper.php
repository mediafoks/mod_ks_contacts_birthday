<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_ks_contacts_birthday
 *
 * @copyright   (C) 2024 Sergey Kuznetsov
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Module\KsContactsBirthday\Site\Helper;

use Joomla\CMS\Factory;

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * Helper for mod_ks_contacts_birthday
 *
 * @since  1.0.1
 */
class KsContactsBirthdayHelper
{
    public function getContacts($params): array
    {
        $db = Factory::getContainer()->get('DatabaseDriver');

        $catId = join(',', $params->get('catid'));

        // Retrieve the shout
        $query = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('#__contact_details'))
            ->where("published='1'")
            ->where("catid IN (" . $catId . ")");
        // Prepare the query

        $db->setQuery($query);
        // Load the row.
        $result = $db->loadObjectList();
        // Return the result
        return $result;
    }
}
