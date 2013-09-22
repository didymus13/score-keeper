<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'User');

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'email' => 'test@example.com',
			'user_name' => 'mrtester',
			'first_name' => 'mister',
			'last_name' => 'tester',
			'password' => '21650e96b17130177b035dd9f4eefef55b73beab',
			'is_verified' => 0,
			'created' => '2013-09-22 02:26:01',
			'modified' => '2013-09-22 02:26:01'
		),
	);

}
