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
   
//    public function index() {
//        $users = $this->User->find('all');
//        $this->set(array(
//            'users' => $users,
//            '_serialize' => array('users')
//        ));
//    }
    
//    public function view($id) {
//        $user = $this->User->findById($id);
//        $this->set(array(
//            'user' => $user,
//            '_serialize' => array('user')
//        ));
//    }
    
//    public function edit($id=null) {
//        $this->User->id = $id;
//        $message = ($this->User->save($this->request->data)) ? 'Saved' : 'Error';
//        $this->set(array(
//            'message' => $message,
//            '_serialize' => array('message')
//        ));
//    }
//    
//    public function delete($id) {
//        $message = ($this->User->delete($id)) ? 'Deleted' : 'Error';
//        $this->set(array(
//            'message' => $message,
//            '_serialize' => array('message')
//        ));
//    }
}
?>
