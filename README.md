CodeIgniter-RememberMe
======================

Easily enable "remember me" on login using native CodeIgniter Session Library. Tested on CodeIgniter 2.1.3

How does it work?
======================

This library is using CodeIgniter native Session Library (only extending), when you set remember_me on session, the cookies will expire after 30 days, 
you can change it to whenever you like, just edit this:

	var $sess_remember_expiration = 2592000

in library file to whatever value you choose

Usage
======================

Just add this line if user checked on 'remember me'
	
	$this->session->set_userdata('remember_me', TRUE);