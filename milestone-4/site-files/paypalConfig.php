<?php
    /*
        * Config for PayPal specific values
    */

    //Whether Sandbox environment is being used, Keep it true for testing
    define("SANDBOX_FLAG", true);

    //PayPal REST API endpoints
    define("SANDBOX_ENDPOINT", "https://api.sandbox.paypal.com");
    define("LIVE_ENDPOINT", "https://api.paypal.com");

    //Merchant ID
    define("MERCHANT_ID","jev4zs-facilitator@virginia.edu");

    //PayPal REST App SANDBOX Client Id and Client Secret
    define("SANDBOX_CLIENT_ID" , "AYqa9YwEWZwtFiLh6pz6q7f7IcgS1DbUdo-BhmEdL5R43e2x9-FoO-OEy0jOT0VNjKboECUgL9wkE1IM");
    define("SANDBOX_CLIENT_SECRET", "EGFcbadSMNeV8VT21KSgJwrQbBREJ_o1QfH1i9za4Svgrw6Y1TgNkWNSyoqNtcwdXUyqQDP_fATw0i96");

    //Environments -Sandbox and Production/Live
    define("SANDBOX_ENV", "sandbox");
    define("LIVE_ENV", "production");

    //PayPal REST App SANDBOX Client Id and Client Secret
    define("LIVE_CLIENT_ID" , "live_Client_Id");
    define("LIVE_CLIENT_SECRET" , "live_Client_Secret");

    //ButtonSource Tracker Code
    define("SBN_CODE","PP-DemoPortal-EC-IC-php-REST");

?>