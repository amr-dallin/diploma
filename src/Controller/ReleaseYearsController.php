<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ReleaseYears Controller
 *
 * @property \App\Model\Table\ReleaseYearsTable $ReleaseYears
 * @method \App\Model\Entity\ReleaseYear[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReleaseYearsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $releaseYears = $this->paginate($this->ReleaseYears);

        $this->set(compact('releaseYears'));
    }

    /**
     * View method
     *
     * @param string|null $id Release Year id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $releaseYear = $this->ReleaseYears->get($id, [
            'contain' => [
                'YearFaculties' => [
                    'Faculties',
                    'StudyGroups.Graduates'
                ]
            ],
        ]);

        $this->set(compact('releaseYear'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $releaseYear = $this->ReleaseYears->newEmptyEntity();
        if ($this->request->is('post')) {
            $releaseYear = $this->ReleaseYears->patchEntity($releaseYear, $this->request->getData());
            if ($this->ReleaseYears->save($releaseYear)) {
                $this->Flash->success(__('The release year has been saved.'));

                return $this->redirect(['action' => 'view', $releaseYear->id]);
            }
            $this->Flash->error(__('The release year could not be saved. Please, try again.'));
        }
        $this->set(compact('releaseYear'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Release Year id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $releaseYear = $this->ReleaseYears->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $releaseYear = $this->ReleaseYears->patchEntity($releaseYear, $this->request->getData());
            if ($this->ReleaseYears->save($releaseYear)) {
                $this->Flash->success(__('The release year has been saved.'));

                return $this->redirect(['action' => 'view', $releaseYear->id]);
            }
            $this->Flash->error(__('The release year could not be saved. Please, try again.'));
        }
        $this->set(compact('releaseYear'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Release Year id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $releaseYear = $this->ReleaseYears->get($id);
        if ($this->ReleaseYears->delete($releaseYear)) {
            $this->Flash->success(__('The release year has been deleted.'));
        } else {
            $this->Flash->error(__('The release year could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
