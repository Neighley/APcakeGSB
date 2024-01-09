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
                $this->Flash->success(__('Le frais forfaitaire a bie été ajouté.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Le frais forfaitaire n'a pas pu être ajouté. Veuillez réessayer."));
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
                $this->Flash->success(__('Le frais forfaitaire a bien été modifié.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Le frais forfaitaire n'a pas pu être modifié. Veuillez réessayer."));
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
            $this->Flash->success(__('Le frais forfaitaire a bien été supprimé.'));
        } else {
            $this->Flash->error(__("Le frais forfaitaire n'a pas pu être ajouté. Veuillez réessayer."));
        }

        return $this->redirect(['action' => 'index']);
    }
}
