<?php

class CRM_Lidnummer_Config {

  protected static $singleton;

  public $customGroup;

  public $lidnummerField;

  protected function __construct() {
    $this->customGroup = civicrm_api3('CustomGroup', 'getsingle', array('name' => 'lidnummer'));
    $this->lidnummerField = civicrm_api3('CustomField', 'getsingle', array('name' => 'lidnummer', 'custom_group_id' => $this->customGroup['id']));
  }

  /**
   * @return CRM_Lidnummer_Config
   */
  public static function singleton() {
    if (!self::$singleton) {
      self::$singleton = new CRM_Lidnummer_Config();
    }
    return self::$singleton;
  }

}