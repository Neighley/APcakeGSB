<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Lignefraishf Controller
 *
 * @property \App\Model\Table\LignefraishfTable $Lignefraishf
 * @method \App\Model\Entity\Lignefraishf[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LignefraishfController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $lignefraishf = $this->paginate($this->Lignefraishf);

        $this->set(compact('lignefraishf'));
    }

    /**
     * View method
     *
     * @param string|null $id Lignefraishf id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lignefraishf = $this->Lignefraishf->get($id, [
            'contain' => ['Fichefrais'],
        ]);

        $this->set(compact('lignefraishf'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lignefraishf = $this->Lignefraishf->newEmptyEntity();
        if ($this->request->is('post')) {
            $lignefraishf = $this->Lignefraishf->patchEntity($lignefraishf, $this->request->getData());
            if ($this->Lignefraishf->save($lignefraishf)) {
                $this->Flash->success(__('La ligne de frais hors forfait a bien été ajoutée.'));

                return $this->redirect(['action' => 'displayall']);
            }
            $this->Flash->error(__("La ligne de frais hors forfait n'a pas pu être ajoutée. Veuillez réessayer"));
        }
        $fichefrais = $this->Lignefraishf->Fichefrais->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraishf', 'fichefrais'));
    }

    public function create($id = null)
    {
        $identity = $this->getRequest()->getAttribute('identity');
        $lignefraishf = $this->Lignefraishf->newEmptyEntity();
        if ($this->request->is('post')) {
            $lignefraishf = $this->Lignefraishf->patchEntity($lignefraishf, $this->request->getData());
            if ($this->Lignefraishf->save($lignefraishf)) {
                $this->Flash->success(__('La ligne de frais hors forfait a bien été créée.'));
                $this->calculmontant($id);

                if($identity['role_id'] == 'superuser' || $identity['role_id'] == 'comptable') {
                    return $this->redirect(['controller'=>'fichefrais','action' => 'displayetat',$id]);
                }
                else {
                    return $this->redirect(['controller'=>'fichefrais','action' => 'display',$id]);
                }
            }
            $this->Flash->error(__("La ligne de frais hors forfait n'a pas pu être créée. Veuillez réessayer"));
        }
        $fichefrais = $this->Lignefraishf->Fichefrais->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraishf', 'fichefrais', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lignefraishf id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lignefraishf = $this->Lignefraishf->get($id, [
            'contain' => ['Fichefrais'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lignefraishf = $this->Lignefraishf->patchEntity($lignefraishf, $this->request->getData());
            if ($this->Lignefraishf->save($lignefraishf)) {
                $this->Flash->success(__('La fiche de frais hors forfait a bien été modifiée.'));

                return $this->redirect(['action' => 'displayall']);
            }
            $this->Flash->error(__("La ligne de frais hors forfait n'a pas pu être modifiée. Veuillez réessayer"));
        }
        $fichefrais = $this->Lignefraishf->Fichefrais->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraishf', 'fichefrais'));
    }

    public function modify($id = null)
    {
        $lignefraishf = $this->Lignefraishf->get($id, [
            'contain' => ['Fichefrais'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lignefraishf = $this->Lignefraishf->patchEntity($lignefraishf, $this->request->getData());
            if ($this->Lignefraishf->save($lignefraishf)) {
                $this->Flash->success(__('La ligne de frais hors forfait a bien été modifiée.'));

                $idfiche = $lignefraishf->fichefrais[0]->id;
                return $this->redirect(['controller' => 'fichefrais', 'action' => 'displayall', $idfiche]);
            }
            $this->Flash->error(__("La ligne de frais hors forfait n'a pas pu être modifiée. Veuillez réessayer"));
        }
        $fichefrais = $this->Lignefraishf->Fichefrais->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraishf', 'fichefrais'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lignefraishf id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lignefraishf = $this->Lignefraishf->get($id);
        if ($this->Lignefraishf->delete($lignefraishf)) {
            $this->Flash->success(__('La fiche de frais hors forfait a bien été supprimée.'));
        } else {
            $this->Flash->error(__("La ligne de frais hors forfait n'a pas pu être supprimée. Veuillez réessayer"));
        }

        return $this->redirect(['controller' => 'fichefrais', 'action' => 'displayall']);
    }

    public function calculmontant($id = null)
    {
        $this->loadModel('FicheFrais');
        $fichefrai = $this->FicheFrais->get($id, [
            'contain' => ['Lignefraisforfait', 'Lignefraishf', 'Lignefraisforfait.Fraisforfait'],
        ]);
        $sommeHF = 0;
        foreach ($fichefrai->lignefraishf as $lignefraishf) {
            $sommeHF += $lignefraishf->montant;
        }

        $somme = 0;
        foreach ($fichefrai->lignefraisforfait as $lignefraisforfait) {
            $somme += $lignefraisforfait->fraisforfait->montant * $lignefraisforfait->quantite;
        }

        $sommeLignes = $somme + $sommeHF;
        $fichefrai->montantvalide = $sommeLignes;

        if ($this->FicheFrais->save($fichefrai)) {
            $this->Flash->success(__('Mise à jour du montant.'));
        }
        else{
            $this->Flash->error(__("Erreur lors de la mise à jour du montant."));
        }

        return $sommeLignes;
    }
}
