<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Session', 'DebugKit.Toolbar', 'RequestHandler', 
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => array(
                        'className' => 'Simple',
                        'hashType' => 'sha256'
                    )
                )
            )
        )
    );
    
    public function beforeFilter() {
        $this->Auth->authenticate = array('Form');
        $this->Auth->allow(array('view', 'index')); // set as array('view', 'index') when ready to lock down
        parent::beforeFilter();
    }
    
    public function index() {
        ${Inflector::pluralize($this->modelClass)} = $this->{$this->modelClass}->find('all');
        $this->set(array(
        Inflector::pluralize($this->modelClass) => ${Inflector::pluralize($this->modelClass)},
            '_serialize' => array(Inflector::pluralize($this->modelClass))
        ));
    }
    
    public function view($id) {
        ${$this->modelClass} = $this->{$this->modelClass}->findById($id);
        $this->set(array(
            $this->modelClass => ${$this->modelClass},
            '_serialize' => array($this->modelClass)
        ));
    }
    
    public function edit($id=null) {
        $this->{$this->modelClass}->id = $id;
        $message = ($this->{$this->modelClass}->save($this->request->data)) ? 'Saved' : 'Error';
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
    
    public function delete($id) {
        $message = ($this->{$this->modelClass}->delete($id)) ? 'Deleted' : 'Error';
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
    
    public function add() {
        $message = ($this->{$this->modelClass}->save($this->request->data)) ? 'Saved' : 'Error';
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
}
