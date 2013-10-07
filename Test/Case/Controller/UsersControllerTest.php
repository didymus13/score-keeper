<?php
App::uses('UsersController', 'Controller', 'Session');

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
            $view = $this->testAction('/users/login', array('return' => 'view'));
            $this->assertTextContains('name="data[User][username]"', $view);
            $this->assertTextContains('name="data[User][password]"', $view);
            $this->assertTextContains('Login', $view);
            
            $data = array('User' => array(
                'username' => 'mrtester', 
                'password' => '12345678'
            ));
            $result = $this->testAction('/users/login', array('data' => $data, 'method' => 'post', 'return' => 'vars'));
            $this->assertTextNotContains('Username or password is incorrect', print_r($result, true));
            debug($result);
	}

/**
 * testLogout method
 *
 * @return void
 */
	public function testLogout() {
            $result = $this->testAction('/users/logout', array('return' => 'view'));
            debug($result);
	}
        

}
