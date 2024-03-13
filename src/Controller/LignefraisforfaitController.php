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
        $this->paginate = [
            'contain' => ['Fraisforfait'],
        ];
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
            'contain' => ['Fraisforfait', 'Fichefrais'],
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
                $this->Flash->success(__('La ligne de frais forfait a bien été ajoutée.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("La ligne de frais forfait n'a pas pu être ajoutée. Veuillez réessayer."));
        }
        $fraisforfait = $this->Lignefraisforfait->Fraisforfait->find('list', ['limit' => 200])->all();
        $fichefrais = $this->Lignefraisforfait->Fichefrais->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraisforfait', 'fraisforfait', 'fichefrais'));
    }

    public function create()
    {
        $lignefraisforfait = $this->Lignefraisforfait->newEmptyEntity();
        if ($this->request->is('post')) {
            $lignefraisforfait = $this->Lignefraisforfait->patchEntity($lignefraisforfait, $this->request->getData());
            if ($this->Lignefraisforfait->save($lignefraisforfait)) {
                $this->Flash->success(__('La ligne de frais forfait a bien été créée.'));

                return $this->redirect(['action' => 'display']);
            }
            $this->Flash->error(__("La ligne de frais forfait n'a pas pu être créée. Veuillez réessayer."));
        }
        debug($lignefraisforfait);
        $fraisforfait = $this->Lignefraisforfait->Fraisforfait->find('list', ['limit' => 200])->all();
        $fichefrais = $this->Lignefraisforfait->Fichefrais->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraisforfait', 'fraisforfait', 'fichefrais'));
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
                $this->Flash->success(__('La ligne de frais forfait a bien été modifiée.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("La ligne de frais forfait n'a pas pu être modifiée. Veuillez réessayer."));
        }
        $fraisforfait = $this->Lignefraisforfait->Fraisforfait->find('list', ['limit' => 200])->all();
        $fichefrais = $this->Lignefraisforfait->Fichefrais->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraisforfait', 'fraisforfait', 'fichefrais'));
    }

    public function modify($id = null)
    {
        $lignefraisforfait = $this->Lignefraisforfait->get($id, [
            'contain' => ['Fichefrais'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lignefraisforfait = $this->Lignefraisforfait->patchEntity($lignefraisforfait, $this->request->getData());
            if ($this->Lignefraisforfait->save($lignefraisforfait)) {
                $this->Flash->success(__('La ligne frais forfait a bien été modifiée.'));
                $idfiche = $lignefraisforfait->fichefrais[0]->id;
                return $this->redirect(['controller' => 'fichefrais', 'action' => 'display', $idfiche]);
            }
            $this->Flash->error(__("La ligne de frais forfait n'a pas pu être modifiée. Veuillez réessayer."));
        }
        $fraisforfait = $this->Lignefraisforfait->Fraisforfait->find('list', ['limit' => 200])->all();
        $fichefrais = $this->Lignefraisforfait->Fichefrais->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraisforfait', 'fraisforfait', 'fichefrais'));
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
            $this->Flash->success(__('La ligne de frais forfait a bien été supprimée.'));
        } else {
            $this->Flash->error(__("La ligne de frais forfait n'a pas pu être supprimée. Veuillez réessayer."));
        }

        return $this->redirect(['action' => 'index']);
    }
}
