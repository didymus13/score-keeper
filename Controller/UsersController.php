<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users_controller
 *
 * @author maddox
 */
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
