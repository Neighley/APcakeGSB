<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Fraisforfait Controller
 *
 * @property \App\Model\Table\FraisforfaitTable $Fraisforfait
 * @method \App\Model\Entity\Fraisforfait[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FraisforfaitController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $fraisforfait = $this->paginate($this->Fraisforfait);

        $this->set(compact('fraisforfait'));
    }

    /**
     * View method
     *
     * @param string|null $id Fraisforfait id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fraisforfait = $this->Fraisforfait->get($id, [
            'contain' => ['Lignefraisforfait'],
        ]);

        $this->set(compact('fraisforfait'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fraisforfait = $this->Fraisforfait->newEmptyEntity();
        if ($this->request->is('post')) {
            $fraisforfait = $this->Fraisforfait->patchEntity($fraisforfait, $this->request->getData());
            if ($this->Fraisforfait->save($fraisforfait)) {
                $this->Flash->success(__('The fraisforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fraisforfait could not be saved. Please, try again.'));
        }
        $this->set(compact('fraisforfait'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fraisforfait id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fraisforfait = $this->Fraisforfait->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fraisforfait = $this->Fraisforfait->patchEntity($fraisforfait, $this->request->getData());
            if ($this->Fraisforfait->save($fraisforfait)) {
                $this->Flash->success(__('The fraisforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fraisforfait could not be saved. Please, try again.'));
        }
        $this->set(compact('fraisforfait'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fraisforfait id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fraisforfait = $this->Fraisforfait->get($id);
        if ($this->Fraisforfait->delete($fraisforfait)) {
            $this->Flash->success(__('The fraisforfait has been deleted.'));
        } else {
            $this->Flash->error(__('The fraisforfait could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
