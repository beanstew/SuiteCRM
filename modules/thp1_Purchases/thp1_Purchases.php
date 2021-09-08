<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */


class thp1_Purchases extends Basic
{
    public $new_schema = true;
    public $module_dir = 'thp1_Purchases';
    public $object_name = 'thp1_Purchases';
    public $table_name = 'thp1_purchases';
    public $importable = false;

    public $id;
    public $name;
    public $date_entered;
    public $date_modified;
    public $modified_user_id;
    public $modified_by_name;
    public $created_by;
    public $created_by_name;
    public $description;
    public $deleted;
    public $created_by_link;
    public $modified_user_link;
    public $assigned_user_id;
    public $assigned_user_name;
    public $assigned_user_link;
    public $SecurityGroups;
    public $productpurchased;
    public $datepurchased;
    public $pricegbp;
    public $priceusd;
    public $priceeur;
    public $priceaud;
    public $pricenzd;
	
    public function bean_implements($interface)
    {
        switch($interface)
        {
            case 'ACL':
                return true;
        }

        return false;
    }
	
	/*
	*  Purchases Module
	   On save custom logic hook 
	*  Save purchase price at the alternative currencies using exchange rate 
	*  on day of purchase 	
	*/
	function save($check_notify = FALSE)
	{
		// today
		$date_now = date("Y-m-d"); 
			
		// Purchase date - formatted e.g. 2013-12-24
		$datePurchased = new DateTime($this->datepurchased);
		$datePurchasedYmd = $datePurchased->format('Y-m-d');
		
		// Default to today if the Purchase date is in the future
		if ($datePurchasedYmd > $date_now) 
		{
			$datePurchasedYmd = $date_now;
		}

		// Get historical exchange rates for given date and base currency GBP, 
		//  access key is supplied by Exchange Rates API https://exchangeratesapi.io/documentation/
		$exchangeRates = $this->getExchangeRates($datePurchasedYmd, 'GBP', '654acc157a624bf1799d89cb75afddee');
		
		//save purchase price in alternative currencies 	
		$this->priceusd = $this->pricegbp * $exchangeRates['USD'];
		$this->priceeur = $this->pricegbp * $exchangeRates['EUR'];
		$this->priceaud = $this->pricegbp * $exchangeRates['AUD'];
		$this->pricenzd = $this->pricegbp * $exchangeRates['NZD'];
		
		parent::save($check_notify);
	}
	
    /*
	* Return exchanges rates for a given base currency - base currency defaults to GBP
	* Defaults to latest rate
	* Supply date in $endpoint to retrieve historic rate for given date
	*/
	function getExchangeRates($endpoint = 'latest', $base = 'GBP', $access_key)
	{
		// Initialize CURL:
		$ch = curl_init('http://api.exchangeratesapi.io/v1/'.$endpoint.'?access_key='.$access_key.'&base='.$base.'');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Store the data:
		$json = curl_exec($ch);
		curl_close($ch);

		// Decode JSON response:
		$exchangeRates = json_decode($json, true);

		// Access the exchange rate values, e.g. GBP:
		return $exchangeRates['rates'];
	}
}