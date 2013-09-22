<?php
App::uses('UsersController', 'Controller');

/**
 * UsersController Test Case
 *
 */
class UsersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user'
	);

/**
 * testLogin method
 *
 * @return void
 */
	public function testLogin() {
            $result = $this->testAction('/users/login', array('return' => 'view'));
            $this->assertTextContains('email', $result);
            $this->assertTextContains('password', $result);
            $this->assertTextContains('Please login', $result);
            
            $data = array('User' => array(
                'email' => 'test@example.com',
                'password' => '12345678'
            ));
            $result = $this->testAction('users/login', array('data' => $data, 'method' => 'post', 'return' => 'view'));
            debug($result);
	}

/**
 * testLogout method
 *
 * @return void
 */
	public function testLogout() {
            $result = $this->testAction('/users/login');
            debug($result);
	}

}
