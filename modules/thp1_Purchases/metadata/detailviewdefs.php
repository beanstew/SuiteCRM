<?php
$module_name = 'thp1_Purchases';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
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
        'LBL_DETAILVIEW_PANEL1' => 
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
        ),
        1 => 
        array (
          0 => 'description',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'pricegbp',
            'label' => 'LBL_PRICEGBP',
          ),
          1 => 
          array (
            'name' => 'datepurchased',
            'label' => 'LBL_DATEPURCHASED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'created_by_name',
            'label' => 'LBL_CREATED',
          ),
          1 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'priceusd',
            'label' => 'LBL_PRICEUSD',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'priceeur',
            'label' => 'LBL_PRICEEUR',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'priceaud',
            'label' => 'LBL_PRICEAUD',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'pricenzd',
            'label' => 'LBL_PRICENZD',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>
