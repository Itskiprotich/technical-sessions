<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validation;
use Cake\View\Helper\HtmlHelper;

use function Psy\debug;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

   public  function  initialize() {
        parent::initialize();
        $this->Auth->allow(['register', 'logout']);

   }

  
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));

        // allow register link to show
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    //Login with username or password
    public function login()
    {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }

        if ($this->request->is('post')) {

            if (Validation::email($this->request->data['username'])) {
                $this->Auth->config('authenticate', [
                    'Form' => [
                        'fields' => ['username' => 'email']
                    ]
                ]);
                $this->Auth->constructAuthenticate();
                $this->request->data['email'] = $this->request->data['username'];
                unset($this->request->data['username']);
            }

            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);

                $this->log($user['email'] . ' logged in at ' . date('d-m-Y H:i:s'), 'info', 'dblog');

                //get current date that can be modified
                $date = new \DateTime();

                if ($user['is_active'] == 0) {
                    $this->Flash->error('Your account is not activated! If you have just registered, please click the activation link sent to your email. Remember to check you spam folder too!');
                    $this->redirect($this->Auth->logout());
                } elseif ($user['deactivated'] == 1) {
                    $this->Flash->error('Your account has been deactivated! Please contact MCAZ.');
                    $this->redirect($this->Auth->logout());
                } elseif ($user['last_password'] <= $date->modify('-2 days')) {
                    $this->Flash->error('Your password has expired. Click on forgot password to create new password.');
                    $this->redirect($this->Auth->logout());
                }

                if (strlen($this->Auth->redirectUrl()) > 12) {
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    if ($user['group_id'] == 1) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'admin', 'plugin' => false]);
                    } elseif ($user['group_id'] == 2) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'manager', 'plugin' => false]);
                    } elseif ($user['group_id'] == 4) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'evaluator', 'plugin' => false]);
                    } elseif ($user['group_id'] == 5) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'institution', 'plugin' => false]);
                    }
                }
                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    public function register()
    {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
 
            exit;

            if ($user->errors()) {
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => $user->errors(),
                    'message' => 'Validation errors',
                    '_serialize' => ['errors', 'message']
                ]);
            }

            $user->role_id = 3;
            if ($this->Users->save($user,false)) {
                $this->Flash->success(__('Registration successful.'));

                // $user->activation_key = $this->Util->generateXOR($user->id);
                // $query = $this->Users->query();
                // $query->update()
                //     ->set(['activation_key' => $this->Util->generateXOR($user->id)])
                //     ->where(['id' => $user->id])
                //     ->execute();
 

                $this->Flash->success(__('You have successfully registered. Please click on the link sent to your email address to
                    activate your account. Check your spam folder if you
                    don\'t see it in your inbox.'));


                if ($this->request->is('json')) {
                    $this->set([
                        'message' => 'Registration successfull. Click on link sent on email to complete registration',
                        '_serialize' => ['message']
                    ]);
                    return;
                }

                return $this->redirect(['controller' => 'Users', 'action' => 'login']);

                //return $this->redirect('/');
            } else {
                $this->Flash->error(__('The user could not be registered. Please, try again.'));
                // $user->success = false;
                // $user->message =            
            }
        } 
        // load all roles
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        foreach ($roles as $role) {
           echo $role->name = $role->name;
        }
        // debug();
        // exit;
        $this->set(compact('user','roles'));
        $this->set('_serialize', ['user']);
    }
}
