<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Fichefrais Controller
 *
 * @property \App\Model\Table\FichefraisTable $Fichefrais
 * @method \App\Model\Entity\Fichefrai[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FichefraisController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $fichefrais = $this->paginate($this->Fichefrais);

        $this->set(compact('fichefrais'));
    }

    public function list()
    {
        $identity = $this->getRequest()->getAttribute('identity');
        $identity = $identity ?? [];
        $iduser = $identity["id"];

        $fichefrais_req = $this->Fichefrais->find('all', ['conditions'=>['FicheFrais.user_id'=>$iduser]]);
        $fichefrais = $this->paginate($fichefrais_req);
        $this->set(compact('fichefrais'));
    }

    public function listall()
    {
        $identity = $this->getRequest()->getAttribute('identity');
        $identity = $identity ?? [];
        $iduser = $identity["id"];

        $fichefrais_req = $this->Fichefrais->find('all', ['contain' => ['Etats']]);
        $fichefrais = $this->paginate($fichefrais_req);
        $this->set(compact('fichefrais'));
    }

    /**
     * View method
     *
     * @param string|null $id Fichefrai id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fichefrai = $this->Fichefrais->get($id, [
            'contain' => ['Users', 'Lignefraisforfait', 'Lignefraishf'],
        ]);
        $this->set(compact('fichefrai'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fichefrai = $this->Fichefrais->newEmptyEntity();
        if ($this->request->is('post')) {
            $fichefrai = $this->Fichefrais->patchEntity($fichefrai, $this->request->getData());
            if ($this->Fichefrais->save($fichefrai)) {
                $this->Flash->success(__('The fichefrai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fichefrai could not be saved. Please, try again.'));
        }
        $users = $this->Fichefrais->Users->find('list', ['limit' => 200])->all();
        $etats =  $this->Fichefrais->Etats->find('list', ['limit' => 200])->all();
      
       
        $lignefraisforfait = $this->Fichefrais->Lignefraisforfait->find('list', ['limit' => 200])->all();
        $lignefraishf = $this->Fichefrais->Lignefraishf->find('list', ['limit' => 200])->all();
        $this->set(compact('fichefrai', 'users','etats', 'lignefraisforfait', 'lignefraishf'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fichefrai id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fichefrai = $this->Fichefrais->get($id, [
            'contain' => ['Lignefraisforfait', 'Lignefraishf'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fichefrai = $this->Fichefrais->patchEntity($fichefrai, $this->request->getData());
            if ($this->Fichefrais->save($fichefrai)) {
                $this->Flash->success(__('The fichefrai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fichefrai could not be saved. Please, try again.'));
        }
        $users = $this->Fichefrais->Users->find('list', ['limit' => 200])->all();
        $lignefraisforfait = $this->Fichefrais->Lignefraisforfait->find('list', ['limit' => 200])->all();
        $lignefraishf = $this->Fichefrais->Lignefraishf->find('list', ['limit' => 200])->all();
        $this->set(compact('fichefrai', 'users', 'lignefraisforfait', 'lignefraishf'));
    }

    // CC de la fonction edit pour la page fichefrais/display
    public function display($id = null)
    {
        $fichefrai = $this->Fichefrais->get($id, [
            'contain' => ['Lignefraisforfait', 'Lignefraishf','Lignefraisforfait.Fraisforfait'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fichefrai = $this->Fichefrais->patchEntity($fichefrai, $this->request->getData());
            if ($this->Fichefrais->save($fichefrai)) {
                $this->Flash->success(__('The fichefrai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fichefrai could not be saved. Please, try again.'));
        }
        $users = $this->Fichefrais->Users->find('list', ['limit' => 200])->all();
        $lignefraisforfait = $this->Fichefrais->Lignefraisforfait->find('list', ['limit' => 200])->all();
        $lignefraishf = $this->Fichefrais->Lignefraishf->find('list', ['limit' => 200])->all();
        $this->set(compact('fichefrai', 'users', 'lignefraisforfait', 'lignefraishf'));
    }

    public function modify($id = null)
    {
        $fichefrai = $this->Fichefrais->get($id, [
            'contain' => ['Lignefraisforfait', 'Lignefraishf'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fichefrai = $this->Fichefrais->patchEntity($fichefrai, $this->request->getData());
            if ($this->Fichefrais->save($fichefrai)) {
                $this->Flash->success(__('The fichefrai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fichefrai could not be saved. Please, try again.'));
        }
        $users = $this->Fichefrais->Users->find('list', ['limit' => 200])->all();
        $lignefraisforfait = $this->Fichefrais->Lignefraisforfait->find('list', ['limit' => 200])->all();
        $lignefraishf = $this->Fichefrais->Lignefraishf->find('list', ['limit' => 200])->all();
        $this->set(compact('fichefrai', 'users', 'lignefraisforfait', 'lignefraishf'));
    }

    public function displayetat($id = null)
    {
        $fichefrai = $this->Fichefrais->get($id, [
            'contain' => ['Lignefraisforfait', 'Lignefraishf','Lignefraisforfait.Fraisforfait'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fichefrai = $this->Fichefrais->patchEntity($fichefrai, $this->request->getData());
            if ($this->Fichefrais->save($fichefrai)) {
                $this->Flash->success(__('The fichefrai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fichefrai could not be saved. Please, try again.'));
        }
        $users = $this->Fichefrais->Users->find('list', ['limit' => 200])->all();
        $lignefraisforfait = $this->Fichefrais->Lignefraisforfait->find('list', ['limit' => 200])->all();
        $lignefraishf = $this->Fichefrais->Lignefraishf->find('list', ['limit' => 200])->all();
        $this->set(compact('fichefrai', 'users', 'lignefraisforfait', 'lignefraishf'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fichefrai id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fichefrai = $this->Fichefrais->get($id);
        if ($this->Fichefrais->delete($fichefrai)) {
            $this->Flash->success(__('La fiche de frais a été supprimée.'));
        } else {
            $this->Flash->error(__("La fiche de frais n'a pas pu être supprimée. Veuillez réessayer."));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function closeFiche($id = null)
    {
        $fichefrai = $this->Fichefrais->get($id, [
            'contain' => ['Lignefraisforfait', 'Lignefraishf','Lignefraisforfait.Fraisforfait'],
        ]);
       // debug($fichefrai);
        $fichefrai->etat_id = 2;
       

        if ($this->Fichefrais->save($fichefrai)) {
            $this->Flash->success(__('Fiche frais clôturée.'));
            } 
        else {
            $this->Flash->error(__('Erreur lors de la clôture de la fiche. Peut-être que la fiche a déjà été clôturée.'));
            $users = $this->Fichefrais->Users->find('list', ['limit' => 200])->all();
            $lignefraisforfait = $this->Fichefrais->Lignefraisforfait->find('list', ['limit' => 200])->all();
            $lignefraishf = $this->Fichefrais->Lignefraishf->find('list', ['limit' => 200])->all();
            $this->set(compact('fichefrai', 'users', 'lignefraisforfait', 'lignefraishf'));
          //  debug($fichefrai);
            return $this->render("displayetat");
            }

        return $this->redirect(['action' => 'listall']);
    }

    public function validateFiche($id = null)
    {
        $fichefrai = $this->Fichefrais->get($id, [
            'contain' => ['Lignefraisforfait', 'Lignefraishf','Lignefraisforfait.Fraisforfait'],
        ]);
        $fichefrai->etat_id = 3;

        if ($this->Fichefrais->save($fichefrai)) {
            $this->Flash->success(__('Fiche frais validée.'));
            } 
        else {
            $this->Flash->error(__('Erreur lors de la validation de la fiche. Peut-être que la fiche a déjà été validée.'));
            $users = $this->Fichefrais->Users->find('list', ['limit' => 200])->all();
            $lignefraisforfait = $this->Fichefrais->Lignefraisforfait->find('list', ['limit' => 200])->all();
            $lignefraishf = $this->Fichefrais->Lignefraishf->find('list', ['limit' => 200])->all();
            $this->set(compact('fichefrai', 'users', 'lignefraisforfait', 'lignefraishf')); 
            return $this->render("displayetat");
            }

        return $this->redirect(['action' => 'listall']);
    }

}
