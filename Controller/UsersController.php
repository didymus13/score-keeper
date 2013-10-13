<?php

App::uses('AppController', 'Controller');
class UsersController extends AppController {
    
    public function beforeFilter() {
        $this->Auth->allow(array('add'));
        parent::beforeFilter();
    }
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
    
    public function add() {
        if ($this->request->is('post')) {
            if (!$this->User->save($this->request->data))
                throw new CakeException('User creation failed');
            
            // Log user In
            $this->request->data['User'] = array_merge(
                    $this->request->data['User'], 
                    array('id' => $this->User->id)
            );
            $this->Auth->login($this->request->data['User']);
            
            if ($this->request->is('ajax')) {
                return $this->redirect(array('action' => 'view', 'ext' => 'json', $this->User->id));
            }
            return $this->redirect(array('action' => 'profile'));
        }
    }
    
    public function view($id) {
        if (!$this->data = $this->User->findById($id)) 
                throw new CakeException('User not found');
    }
    
}
?>
