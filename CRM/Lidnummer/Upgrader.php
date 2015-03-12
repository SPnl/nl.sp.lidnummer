<?php

/**
 * Collection of upgrade steps
 */
class CRM_Lidnummer_Upgrader extends CRM_Lidnummer_Upgrader_Base {


  public function install() {
    $this->executeCustomDataFile('xml/lidnummer.xml');

    $this->executeSqlFile('sql/install.sql');
  }


}
