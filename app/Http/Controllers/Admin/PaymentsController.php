<?php

namespace App\Http\Controllers\Admin;

use App\YoPayment\YoPaymentAPI;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
{

    //$credentials['sandbox_api_username'] = '90003066053';//Obtain this from your Sandbox account
    //$credentials['sandbox_api_password'] = 'do9t-IqUe-FxJW-IgUI-NV1E-fDee-YhOQ-iikQ';//Obtain this from your Sandbox account
    public $mode = "live"; //Set this to "live" when it comes to pointing to production system.
    public $user_pay1 = true;//Set this to true if your production account is on pay one system.
    public $action;

    function __construct()
    {
        parent::__construct();
        $credentials['api_username'] = '9848899';//Obtain this from your live account
        $credentials['api_password'] = '134b-WiCT-HRvs-l5ZN-1BpX-9DPt-ClBR-jSfG';
        $this->action = new YoPaymentAPI($credentials, $this->mode, true);
    }

    function runDepositFunds()
    {
        /*Depositing funds from a mobile number
        Set NonBlocking to true if you want the server response immediately with PENDING status
        and check for transaction later using follow up transaction API method. Otherwise, leave it blank if
        you want the server to first finish processing (Waiting for the customer to enter PIN) and return the final
        status of the transaction. Setting to TRUE is recommended*/
        $details['NonBlocking'] = 'TRUE';
        $details["Account"] = '256785570221';
        $details["Amount"] = '500';
        $details['Narrative'] = "Test depositing on to Yo! Payments.";
        $details['ExternalReference'] = '121hk12us';
        $details['ProviderReferenceText'] = 'Merchant Message';
        //More other fields if you need to. Refer to API documentation for these fields specifically for acdepositfunds.
        $this->depositFunds($this->action, $details);
    }

    function runWithdraw()
    {
        /*Withdrawing funds from Yo! Payments account to a mobile money number*/
        unset($details);
        $details['NonBlocking'] = 'TRUE'; //Strictly set this field to true.
        $details["Account"] = '256783086794';
        $details["Amount"] = '1000';
        $details['Narrative'] = "Test depositing on to Yo! Payments.";
        $details['ExternalReference'] = '1000110' . rand(10, 1000);
        $details['ProviderReferenceText'] = 'Merchant Message';
        $this->withdrawFunds($this->action, $details);
    }

    function runInternalTransfer()
    {
        /*Internal of funds from Yo! Payments account to another Yo! Payments account*/
        unset($details);
        $details['NonBlocking'] = 'TRUE'; //Strictly set this field to true.
        $details["BeneficiaryEmail"] = 'jtabajjwa@outlook.com';
        $details["Amount"] = '1000';
        $details['CurrencyCode'] = 'UGX-MTNMM';
        $details['BeneficiaryAccount'] = '90008982384';
        $details['Narrative'] = "Test depositing on to Yo! Payments.";
        $details['ExternalReference'] = '1000110' . rand(10, 1000);
        $details['ProviderReferenceText'] = 'Merchant Message';
        $this->internalTransfer($this->action, $details);
    }

    function runSendAirtime()
    {
        /*Sending Airtime funds from Yo! Payments account to a mobile money number*/
        unset($details);
        $details['NonBlocking'] = 'TRUE'; //Strictly set this field to true.
        $details["Account"] = '256785570221';
        $details["Amount"] = '1400';
        $details['Narrative'] = "Sending airtime";
        $details['ExternalReference'] = '10001101121' . rand(10, 1000);
        $details['ProviderReferenceText'] = 'Merchant Message';
        $this->sendAirtime($this->action, $details);
    }

    function runFollowUpTransaction()
    {
        /*Follow up a transaction you submitted earlier.
    * You must provide either or both of the following fields.
    */
        unset($details);
        $details['TransactionReference'] = 'h1c7b7IUMTUPGb79Z8cc7hsHbUcDnXlbzLQ0HGE8ScVTqZnajKM8PBgpGvTwmS6n7145217afe63ddaadba8ca6e15096710';
        $details['PrivateTransactionReference'] = '';
        $this->followUpTransaction($this->action, $details);
    }

    function runCheckAccBalance()
    {
        /*Checking balances on Yo! Payments account*/
        $this->checkAccBalance($this->action);
    }
    //------------------------------------------------------------------------------------------------------------------
    /*
     * Core methods
     *
     * */

    function depositFunds($action, $details)
    {
        $array = $action->depositFunds($details);
        echo "<xmp>";
        print("depositFunds returned array\n--------------------------------------------------------\n");
        print_r($array);

        //Entire Payments Object
        print("The Actual Payments Object After depositFunds call\n--------------------------------------------------------\n");
        print("\n");
        print_r($action);
        print("\n");
        echo "</xmp>";
    }

    //Send Airtime
    function sendAirtime($action, $data)
    {
        $array = $action->sendAirtime($data);
        echo "<xmp>";
        print("sendAirtime returned array\n--------------------------------------------------------\n");
        print_r($array);

        //Entire Payments Object
        print("The Actual Payments Object After sendAirtime call\n--------------------------------------------------------\n");
        print("\n");
        print_r($action);
        print("\n");
        echo "</xmp>";
    }

    //withdrawing funds
    function withdrawFunds($action, $data)
    {
        $array = $action->withdrawFunds($data);
        echo "<xmp>";
        print("withdrawFunds returned array\n--------------------------------------------------------\n");
        print_r($array);

        //Entire Payments Object
        print("The Actual Payments Object After withdrawFunds call\n--------------------------------------------------------\n");
        print("\n");
        print_r($action);
        print("\n");
        echo "</xmp>";
    }

    //internalTransfer
    function internalTransfer($action, $data)
    {
        //Internal Transfer
        $array = $action->internalTransfer($data);
        echo "<xmp>";
        print("internalTransfer returned array\n--------------------------------------------------------\n");
        print_r($array);

        //Entire Payments Object
        print("The Actual Payments Object After internalTransfer call\n--------------------------------------------------------\n");
        print("\n");
        print_r($action);
        print("\n");
        echo "</xmp>";
    }

    //balance request
    function checkAccBalance($action)
    {
        $array = $action->checkAccBalance();
        echo "<xmp>";
        print("CheckBalance returned array\n--------------------------------------------------------\n");
        print_r($array);

        //Entire Payments Object
        print("The Actual Payments Object After checkAccBalance call\n-------------------------------------------\n");
        print("\n");
        print_r($action);
        print("\n");

        /*How to references balances in your code.
        Please! Refere to Yo! Payments API uide for various currency codes.*/
        print("Listing balances you have on your account\n-------------------------------------------\n");
        foreach ($array['balance']->Currency as $key => $val) {
            echo "Currency Code: " . $val->Code . " Currency Balance: " . $val->Balance . "\n";
        }
        echo "</xmp>";
    }

    //Follow up transaction
    function followUpTransaction($action, $data)
    {
        $array = $action->followUpTransaction($data);
        echo "<xmp>";
        print("111111111followUpTransaction returned array\n------------------\n");
        print_r($array);

        //Entire Payments Object
        print("The Actual Payments Object After followUpTransaction call\n---------------------------\n");
        print("\n");
        print_r($action);
        print("\n");
        echo "</xmp>";
    }

}
