<?php
require_once("mpower/dependency_check.php");

set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__)));

abstract class MPower {
  const VERSION = "1.2.0";
  const SUCCESS = "success";
  const FAIL = "fail";
  const PENDING = "pending";
}

if (strnatcmp(phpversion(),'5.3.0') >= 0) {
  define('JSON_ENCODE_PARAM_SUPPORT',   true);
}else{
  define('JSON_ENCODE_PARAM_SUPPORT',   false);
}

///define("MPOWER_SUCCESS", "success");
//define("MPOWER_FAIL", "fail");
//define("MPOWER_PENDING", "pending");

require_once("mpower/setup.php");
require_once("mpower/customdata.php");
require_once("mpower/checkout.php");
require_once("mpower/checkout/store.php");
require_once("mpower/checkout/checkout_invoice.php");
require_once("mpower/checkout/onsite_invoice.php");
require_once("mpower/direct_pay.php");
require_once("mpower/direct_card.php");
require_once("mpower/libraries/Requests.php");
require_once("mpower/utilities.php");

## Setup your API Keys

    \MPower_Setup::setMasterKey('871b3cb3-997b-4b22-8a43-a351ada70f67');
    \MPower_Setup::setPublicKey('test_public_aKJAW8EIBtnQhuQw6MloY2xzBOc');
    \MPower_Setup::setPrivateKey('test_private_l74s0Eyp8cTX2AvfES6_uzJ8JPE');
    \MPower_Setup::setMode('test');
    \MPower_Setup::setToken('bcd8271a32982d39d7f3');

## Setup your checkout store information

    MPower_Checkout_Store::setName("Softcube Limited");
    MPower_Checkout_Store::setTagline("Email Services Payment");
    //MPower_Checkout_Store::setPhoneNumber(STORE_PHONENO);
    //MPower_Checkout_Store::setPostalAddress(STORE_ADDRESS);

