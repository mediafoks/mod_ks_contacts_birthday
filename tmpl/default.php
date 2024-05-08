<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_ks_contacts_birthday
 *
 * @copyright   (C) 2024 Sergey Kuznetsov
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

//$contacts - массив всех контактов.

$today = date("Y-m-d"); //Текущая дата
$arr_contacts_name = []; //Массив с именами контактов

foreach ($contacts as $key => $contact) {
    $name = $contact->name; //Имя контакта
    $birthday = date_format(date_create($contact->created), 'Y-m-d'); //Дата создания контакта
    if ($today == $birthday) array_push($arr_contacts_name, $name); //Если дата создания контакта (ДР) равна текущей дате, то добавляем имя контакта в массив
}
?>

<?php if (!empty($arr_contacts_name)) : ?>
    <div class="contacts-birthday">Сегодня <span class="contacts-birthday__name"><?= implode(', ', $arr_contacts_name); ?></span> отмеча<?= count($arr_contacts_name) > 1 ? 'ют' : 'ет'; ?> День рождения</div>
<?php endif; ?>