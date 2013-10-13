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
     * Test Add via API
     * @return void
     */        
     public function testAdd() {
         $data = array('User' => array(
             'username' => 'addtest',
             'first_name' => 'Add',
             'last_name' => 'Test',
             'email' => 'addtest@example.com',
             'password' => '12345678'
         ));
         
         $result = $this->testAction('/users/add', array('data' => $data, 'method' => 'post', 'return' => 'view'));
         debug($result);
         $this->assertTextNotContains('<form', $result);
         $this->assertEquals('addtest', AuthComponent::user('username'));
     }
     
     public function testView() {
         $result = $this->testAction('/users/view/1', array('return' => 'view'));
         $this->assertTextContains('mrtester', $result, 'username not found');
         $this->assertTextContains('mister', $result, 'first_name not found');
         $this->assertTextContains('tester', $result, 'last_name not found');
         $this->assertTextContains('test@example.com', $result, 'email not found');
         $this->assertTextContains('2013-09-22', $result, 'created date not found');
         $this->assertTextNotContains('assword', $result, 'Password should never be displayed');
     }
     
    /**
    * testLogout method
    * Run this last to clear out auth Session
    * @return void
    */
    public function testLogout() {
        $result = $this->testAction('/users/logout', array('return' => 'view'));
        debug($result);
    }

}
