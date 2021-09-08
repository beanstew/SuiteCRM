<?php
$module_name = 'thp1_Purchases';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'productpurchased',
            'label' => 'LBL_PRODUCTPURCHASED',
          ),
          1 => 
          array (
            'name' => 'datepurchased',
            'label' => 'LBL_DATEPURCHASED',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'pricegbp',
            'label' => 'LBL_PRICEGBP',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>
