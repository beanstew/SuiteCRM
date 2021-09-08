<?php
$module_name = 'thp1_Purchases';
$listViewDefs [$module_name] = 
array (
  'PRODUCTPURCHASED' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PRODUCTPURCHASED',
    'width' => '10%',
    'default' => true,
  ),
  'DATEPURCHASED' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATEPURCHASED',
    'width' => '10%',
    'default' => true,
  ),
  'PRICEGBP' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_PRICEGBP',
    'width' => '10%',
    'default' => true,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'PRICENZD' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_PRICENZD',
    'width' => '10%',
    'default' => false,
  ),
  'PRICEAUD' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_PRICEAUD',
    'width' => '10%',
    'default' => false,
  ),
  'PRICEEUR' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_PRICEEUR',
    'width' => '10%',
    'default' => false,
  ),
  'PRICEUSD' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_PRICEUSD',
    'width' => '10%',
    'default' => false,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_MODIFIED_NAME',
    'id' => 'MODIFIED_USER_ID',
    'width' => '10%',
    'default' => false,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => false,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => false,
  ),
);
;
?>
