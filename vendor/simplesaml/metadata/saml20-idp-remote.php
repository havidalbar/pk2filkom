<?php
$metadata['ub-idp'] = array (
  'metadata-set' => 'saml20-idp-remote',
  'entityid' => 'ub-idp',
  'SingleSignOnService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://auth.ub.ac.id/saml2/idp/SSOService.php',
    ),
  ),
  'SingleLogoutService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://auth.ub.ac.id/saml2/idp/SingleLogoutService.php',
    ),
  ),
  'certData' => 'MIIEEzCCAvugAwIBAgIJANaDXmacL80FMA0GCSqGSIb3DQEBCwUAMIGfMQswCQYDVQQGEwJJRDETMBEGA1UECAwKSmF3YSBUaW11cjEPMA0GA1UEBwwGTWFsYW5nMR4wHAYDVQQKDBVVbml2ZXJzaXRhcyBCcmF3aWpheWExDDAKBgNVBAsMA1RJSzEaMBgGA1UEAwwRZGV2LWF1dGgudWIuYWMuaWQxIDAeBgkqhkiG9w0BCQEWEW5ldGFkbWluQHViLmFjLmlkMB4XDTE3MDUxNzEwMjM0MFoXDTI3MDUxNzEwMjM0MFowgZ8xCzAJBgNVBAYTAklEMRMwEQYDVQQIDApKYXdhIFRpbXVyMQ8wDQYDVQQHDAZNYWxhbmcxHjAcBgNVBAoMFVVuaXZlcnNpdGFzIEJyYXdpamF5YTEMMAoGA1UECwwDVElLMRowGAYDVQQDDBFkZXYtYXV0aC51Yi5hYy5pZDEgMB4GCSqGSIb3DQEJARYRbmV0YWRtaW5AdWIuYWMuaWQwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC/pE0Dj7cE0aAPomp6YzqB7GKMz5pgIFuK7vibK4wElOx4usgC4OovF7iGYyrzYh28XDEla1oeGks9QVrPNO3vQfRR2jivT1+Xz3hNIomWwggJNx1FmMJzCLonBQQqvVJ7YkxFjjCoW0Xnkb4cHb8BY5wOooAP0vfQ5dPgLBr8Jb07+yTbfuDiYOUjYqtEYQ8nuQQWJgire00UmsmaMpPL+BmwZSu3qPTnzRX/re1MJSBQUK2EPBKhGLaUQ1PKEWHeSa5mBlim4SEUhzddpFyV9MNraK1r5C82ZN+Pq7sMLZ9S9kf2pCZP2tIXQr1shCnVgjTtWQT51FVw8LslrgIDAgMBAAGjUDBOMB0GA1UdDgQWBBSSygFy3DJ4iAk7yTdVjGWrOmKmJzAfBgNVHSMEGDAWgBSSygFy3DJ4iAk7yTdVjGWrOmKmJzAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBAQAKNtdFCf1UpaqcFTZBMMlDAhp23+UzrEvDXR9VjRgE7JXv+uVRpzYXOGYtsJTL/CNaTYJ8ATWXqTF/K/RsAC0bw5AwPD7yRH/hI9hei7nyUUWJKBIC4rHilvBpSGLDKLGI3sh9sQf33DexvYnA7q7wano5gjwldDHi9ZpZ5Zsx04DiXIDJjv7sZ5j6lG8ocGm9os3WV5+faMeORkQRfQsgkLIIKPAAZQqJXxPNTt4xCxaNc+kFMpJBLpVEX+JIaeBDFqYBAAy93cQlxz00+FAYmBk7LOxbFK9D8cct6O7R9fUP9c98Hb3iBCEv6tRcCwqZQXphIhSnkOCPRivlAMzl',
  'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:transient',
  'contacts' => 
  array (
    0 => 
    array (
      'emailAddress' => 'netadmin@ub.ac.id',
      'contactType' => 'technical',
      'givenName' => 'Administrator',
    ),
  ),
);