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
            $this->assertTextContains('Please log in', $result);
            
            $data = array('User' => array(
                'email' => 'test@example.com',
                'password' => '12345678'
            ));
            $result = $this->testAction('users/login', array('data' => $data, 'method' => 'post', 'return' => 'view'));
            $this->assertTextNotContains('Please log in', $result);
	}

/**
 * testLogout method
 *
 * @return void
 */
	public function testLogout() {
            $result = $this->testAction('/users/logout', array('return' => 'view'));
            $this->assertTextContains('Please log in', $result);
	}

}
