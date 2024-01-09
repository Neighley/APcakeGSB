<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Etat Controller
 *
 * @property \App\Model\Table\EtatTable $Etat
 * @method \App\Model\Entity\Etat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EtatController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $etat = $this->paginate($this->Etat);

        $this->set(compact('etat'));
    }

    /**
     * View method
     *
     * @param string|null $id Etat id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $etat = $this->Etat->get($id, [
            'contain' => ['Fichefrais'],
        ]);

        $this->set(compact('etat'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $etat = $this->Etat->newEmptyEntity();
        if ($this->request->is('post')) {
            $etat = $this->Etat->patchEntity($etat, $this->request->getData());
            if ($this->Etat->save($etat)) {
                $this->Flash->success(__("L'état a bien été sauvegardé."));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("L'état n'a pas pu être sauvegardé. Veuillez réessayer"));
        }
        $this->set(compact('etat'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Etat id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $etat = $this->Etat->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etat = $this->Etat->patchEntity($etat, $this->request->getData());
            if ($this->Etat->save($etat)) {
                $this->Flash->success(__("L'état a bien été sauvegardé."));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("L'état n'a pas pu être sauvegardé. Veuillez réessayer"));
        }
        $this->set(compact('etat'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Etat id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $etat = $this->Etat->get($id);
        if ($this->Etat->delete($etat)) {
            $this->Flash->success(__("L'état a bien été supprimé."));
        } else {
            $this->Flash->error(__("L'état n'a pas pu être supprimé. Veuillez réessayer"));
        }

        return $this->redirect(['action' => 'index']);
    }
}
