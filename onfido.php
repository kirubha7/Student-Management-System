<?php

    print_r(phpinfo());
    // require_once '/api-php-client/lib';
    
    // $config = \apiphpclient\lib\Configuration::getDefaultConfiguration();
    // $config->setApiKey('Authorization', 'token=api_sandbox.j-qDo_YCcLe.Y9ByZhMo51ixLi1i0YplnhzhQIcJ-Bv9');
    // $config->setApiKeyPrefix('Authorization', 'Token');

    // // // Limit the at-rest region, if needed (optional, see https://documentation.onfido.com/#regions)
    // // // $config->setHost($config->getHostFromSettings(1, array("region" => "us")));

    // $apiInstance = new \apiphpclient\lib\Api\DefaultApi(null, $config);

    // $webhook = new \apiphpclient\lib\Model\Webhook();
    // $webhook->setUrl('https://www.unicoindcx.com/test/onfido.php');
    // $webhook->setEvents(['report.completed', 'check.completed']);

    // $apiInstance->createWebhook($webhook);

    // error_log(PHP_EOL.$apiInstance->createWebhook($webhook),3,"https://www.unicoindcx.com/test");

    // echo "testing onfido response";
?>