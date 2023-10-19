<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Lignefraisforfait Controller
 *
 * @property \App\Model\Table\LignefraisforfaitTable $Lignefraisforfait
 * @method \App\Model\Entity\Lignefraisforfait[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LignefraisforfaitController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $lignefraisforfait = $this->paginate($this->Lignefraisforfait);

        $this->set(compact('lignefraisforfait'));
    }

    /**
     * View method
     *
     * @param string|null $id Lignefraisforfait id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lignefraisforfait = $this->Lignefraisforfait->get($id, [
            'contain' => ['Fichefrais'],
        ]);

        $this->set(compact('lignefraisforfait'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lignefraisforfait = $this->Lignefraisforfait->newEmptyEntity();
        if ($this->request->is('post')) {
            $lignefraisforfait = $this->Lignefraisforfait->patchEntity($lignefraisforfait, $this->request->getData());
            if ($this->Lignefraisforfait->save($lignefraisforfait)) {
                $this->Flash->success(__('The lignefraisforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lignefraisforfait could not be saved. Please, try again.'));
        }
        $fichefrais = $this->Lignefraisforfait->Fichefrais->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraisforfait', 'fichefrais'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lignefraisforfait id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lignefraisforfait = $this->Lignefraisforfait->get($id, [
            'contain' => ['Fichefrais'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lignefraisforfait = $this->Lignefraisforfait->patchEntity($lignefraisforfait, $this->request->getData());
            if ($this->Lignefraisforfait->save($lignefraisforfait)) {
                $this->Flash->success(__('The lignefraisforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lignefraisforfait could not be saved. Please, try again.'));
        }
        $fichefrais = $this->Lignefraisforfait->Fichefrais->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraisforfait', 'fichefrais'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lignefraisforfait id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lignefraisforfait = $this->Lignefraisforfait->get($id);
        if ($this->Lignefraisforfait->delete($lignefraisforfait)) {
            $this->Flash->success(__('The lignefraisforfait has been deleted.'));
        } else {
            $this->Flash->error(__('The lignefraisforfait could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
