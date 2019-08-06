<?php
$config = array(

    /* This is the name of this authentication source, and will be used to access it later. */
    SIMPLESAML_APP_ID => array(
        'saml:SP',
        'entityID' => SIMPLESAML_APP_ID,
        'privatekey' => 'ubauth.pem',
    	'certificate' => 'ubauth.crt',
    	'idp' => 'ub-idp',
    ),
);