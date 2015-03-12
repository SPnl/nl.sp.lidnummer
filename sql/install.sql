create temporary table `civisplidnummer` (
  id int not null auto_increment,
  primary key (id)
);

INSERT INTO `civisplidnummer` select id from civicrm_contact;
delete from `civicrm_value_lidnummer`;
INSERT INTO `civicrm_value_lidnummer` (`entity_id`, `lidnummer`) SELECT `id` as `entity_id`, `id` as `lidnummer` from `civisplidnummer`;
drop table `civisplidnummer`;