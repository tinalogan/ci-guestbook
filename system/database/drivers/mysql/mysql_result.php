<<<<<<< HEAD
<?php
=======
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
>>>>>>> Kmom03 - Create a codeigniter guestbook
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

// --------------------------------------------------------------------

/**
 * MySQL Result Class
 *
 * This class extends the parent result class: CI_DB_result
 *
 * @category	Database
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_mysql_result extends CI_DB_result {

	/**
<<<<<<< HEAD
	 * Class constructor
	 *
	 * @param	object	&$driver_object
	 * @return	void
	 */
	public function __construct(&$driver_object)
	{
		parent::__construct($driver_object);

		// Required, due to mysql_data_seek() causing nightmares
		// with empty result sets
		$this->num_rows = @mysql_num_rows($this->result_id);
	}

	// --------------------------------------------------------------------

	/**
=======
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * Number of rows in the result set
	 *
	 * @access	public
	 * @return	integer
	 */
	function num_rows()
	{
		return @mysql_num_rows($this->result_id);
	}

	// --------------------------------------------------------------------

	/**
	 * Number of fields in the result set
	 *
	 * @access	public
	 * @return	integer
	 */
	function num_fields()
	{
		return @mysql_num_fields($this->result_id);
	}

	// --------------------------------------------------------------------

	/**
	 * Fetch Field Names
	 *
	 * Generates an array of column names
	 *
	 * @access	public
	 * @return	array
	 */
	function list_fields()
	{
		$field_names = array();
		while ($field = mysql_fetch_field($this->result_id))
		{
			$field_names[] = $field->name;
		}

		return $field_names;
	}

	// --------------------------------------------------------------------

	/**
	 * Field data
	 *
	 * Generates an array of objects containing field meta-data
	 *
	 * @access	public
	 * @return	array
	 */
	function field_data()
	{
		$retval = array();
		while ($field = mysql_fetch_object($this->result_id))
		{
			preg_match('/([a-zA-Z]+)(\(\d+\))?/', $field->Type, $matches);

			$type = (array_key_exists(1, $matches)) ? $matches[1] : NULL;
			$length = (array_key_exists(2, $matches)) ? preg_replace('/[^\d]/', '', $matches[2]) : NULL;

			$F				= new stdClass();
			$F->name		= $field->Field;
			$F->type		= $type;
			$F->default		= $field->Default;
			$F->max_length	= $length;
			$F->primary_key = ( $field->Key == 'PRI' ? 1 : 0 );

			$retval[] = $F;
		}

		return $retval;
	}

	// --------------------------------------------------------------------

	/**
	 * Free the result
	 *
	 * @return	null
	 */
	function free_result()
	{
		if (is_resource($this->result_id))
		{
			mysql_free_result($this->result_id);
			$this->result_id = FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Data Seek
	 *
	 * Moves the internal pointer to the desired offset.  We call
	 * this internally before fetching results to make sure the
	 * result set starts at zero.
	 *
<<<<<<< HEAD
	 * @param	int	$n
	 * @return	bool
=======
	 * @access	private
	 * @return	array
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function _data_seek($n = 0)
	{
		return mysql_data_seek($this->result_id, $n);
	}

	// --------------------------------------------------------------------

	/**
	 * Result - associative array
	 *
	 * Returns the result set as an array
	 *
	 * @access	private
	 * @return	array
	 */
	function _fetch_assoc()
	{
		return mysql_fetch_assoc($this->result_id);
	}

	// --------------------------------------------------------------------

	/**
	 * Result - object
	 *
	 * Returns the result set as an object
	 *
<<<<<<< HEAD
	 * @param	string	$class_name
=======
	 * @access	private
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	object
	 */
	function _fetch_object()
	{
		return mysql_fetch_object($this->result_id);
	}

}


/* End of file mysql_result.php */
/* Location: ./system/database/drivers/mysql/mysql_result.php */