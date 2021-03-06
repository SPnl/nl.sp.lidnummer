<?php

require_once 'lidnummer.civix.php';

function lidnummer_civicrm_pre($op, $objectName, $id, &$params) {
  if ($op == 'create' && $objectName == 'Individual') {
    $config = CRM_Lidnummer_Config::singleton();
    $fid = $config->lidnummerField['id'];
    $field = 'custom_'.$config->lidnummerField['id'];
    if (isset($params[$field]) && !isset($params['id'])) {
      $lidnummer = CRM_Core_DAO::singleValueQuery("SELECT id from civicrm_contact where id = %1", array(1 => array($params[$field], 'Integer')));
      var_dump($lidnummer); exit();
      if ($lidnummer) {
        $params['contact_id'] = $params[$field];
      }
    } elseif (isset($params['custom']) && isset($params['custom'][$fid])) {
      $customData = reset($params['custom'][$fid]);
      $lidnummer = CRM_Core_DAO::singleValueQuery("SELECT id from civicrm_contact where id = %1", array(1 => array($customData['value'], 'Integer')));
      if ($lidnummer) {
        $params['contact_id'] = $lidnummer;
      }
    }
  }
}

/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function lidnummer_civicrm_config(&$config) {
  _lidnummer_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function lidnummer_civicrm_xmlMenu(&$files) {
  _lidnummer_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function lidnummer_civicrm_install() {
  _lidnummer_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function lidnummer_civicrm_uninstall() {
  _lidnummer_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function lidnummer_civicrm_enable() {
  _lidnummer_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function lidnummer_civicrm_disable() {
  _lidnummer_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function lidnummer_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _lidnummer_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function lidnummer_civicrm_managed(&$entities) {
  _lidnummer_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function lidnummer_civicrm_caseTypes(&$caseTypes) {
  _lidnummer_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function lidnummer_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _lidnummer_civix_civicrm_alterSettingsFolders($metaDataFolders);
}
