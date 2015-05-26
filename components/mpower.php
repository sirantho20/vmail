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

    MPower_Setup::setMasterKey(YOUR_API_MASTER_KEY);
    MPower_Setup::setPublicKey(YOUR_API_PUBLIC_KEY);
    MPower_Setup::setPrivateKey(YOUR_API_PRIVATE_KEY);
    MPower_Setup::setMode(["test"|"live"]);
    MPower_Setup::setToken(YOUR_API_TOKEN);

## Setup your checkout store information

    MPower_Checkout_Store::setName("My Awesome Online Store");
    MPower_Checkout_Store::setTagline("My awesome store's awesome tagline");
    MPower_Checkout_Store::setPhoneNumber(STORE_PHONENO);
    MPower_Checkout_Store::setPostalAddress(STORE_ADDRESS);

