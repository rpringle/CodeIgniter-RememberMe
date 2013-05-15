<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * Session Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Sessions
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/sessions.html
 */

class Extend_Session extends CI_Session {

	// Set new custom var to declare
	// max expire on remember me = 30 days
	var $sess_remember_expiration		= 2592000; 

	// --------------------------------------------------------------------

	/**
	 * Write the session cookie
	 * this code is modified to enable "remember me" option on login page
	 *
	 * @access	public
	 * @return	void
	 */
	function _set_cookie($cookie_data = NULL)
	{
		if (is_null($cookie_data))
		{
			$cookie_data = $this->userdata;
		}

		$remember = $this->userdata('remember_me');

		if ($remember === TRUE)
		{

			$expire = $this->sess_remember_expiration + time();
		}
		else
		{
			$expire = ($this->sess_expire_on_close === TRUE) ? 0 : $this->sess_expiration + time();
		}

		// Serialize the userdata for the cookie
		$cookie_data = $this->_serialize($cookie_data);

		if ($this->sess_encrypt_cookie == TRUE)
		{
			$cookie_data = $this->CI->encrypt->encode($cookie_data);
		}
		else
		{
			// if encryption is not used, we provide an md5 hash to prevent userside tampering
			$cookie_data = $cookie_data.md5($cookie_data.$this->encryption_key);
		}

		// Set the cookie
		setcookie(
					$this->sess_cookie_name,
					$cookie_data,
					$expire,
					$this->cookie_path,
					$this->cookie_domain,
					$this->cookie_secure
				);
	}

}
// END Session Class

/* End of file Session.php */
/* Location: ./system/libraries/Session.php */