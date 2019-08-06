<h1>This Is From APP3</h1>
<?php
require_once('../../simplesaml/lib/_autoload.php');
$auth = new SimpleSAML_Auth_Simple('ub-devel-sim');
print $auth->requireAuth();

if(isset($_GET['action'])){
	if($_GET['action'] == 'logout'){
		//print 'require logout action,';
		$auth->logout('http://dev91.ub.ac.id/tarom-devel-sso-sim/modules/simplesaml/test-app/logout.php');
	}
}
print $auth->requireAuth(array('saml:idp' => 'ub-idp',));
$attributes = $auth->getAttributes();
print '<h1>Jika muncul ini berarti anda sudah login.<h1>';
print '<a href="?action=logout">Logout</a>';

print '<h2>Atribut anda adalah : <h2>';
print '<pre>';
print_r($attributes);
print '</pre>';
//$name = $attrs['displayName'][0];
//$auth->logout('url');
?>