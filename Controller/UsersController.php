<?php

App::uses('AppController', 'Controller');
class UsersController extends AppController {
    public $scaffold;
    
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
            }
        }
        $this->set('title_for_layout', 'Please log in:');
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }
}
?>
