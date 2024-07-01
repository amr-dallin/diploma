<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * YearFaculties Controller
 *
 * @property \App\Model\Table\YearFacultiesTable $YearFaculties
 * @method \App\Model\Entity\YearFaculty[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class YearFacultiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Faculties', 'ReleaseYears'],
        ];
        $yearFaculties = $this->paginate($this->YearFaculties);

        $this->set(compact('yearFaculties'));
    }

    /**
     * View method
     *
     * @param string|null $id Year Faculty id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $yearFaculty = $this->YearFaculties->get($id, [
            'contain' => ['Faculties', 'ReleaseYears', 'Groups'],
        ]);

        $this->set(compact('yearFaculty'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($releaseYearId = null)
    {
        $releaseYear = $this->YearFaculties->ReleaseYears->get($releaseYearId);

        $yearFaculty = $this->YearFaculties->newEmptyEntity();
        if ($this->request->is('post')) {
            $yearFaculty = $this->YearFaculties->patchEntity($yearFaculty, $this->request->getData());
            $yearFaculty->set('release_year_id', $releaseYearId);
            if ($this->YearFaculties->save($yearFaculty)) {
                $this->Flash->success(__('The year faculty has been saved.'));
                return $this->redirect(['controller' => 'ReleaseYears', 'action' => 'view', $releaseYearId]);
            }
            $this->Flash->error(__('The year faculty could not be saved. Please, try again.'));
        }

        $yearFaculties = $this->YearFaculties->find()
            ->select(['faculty_id'])
            ->where(['YearFaculties.release_year_id' => $releaseYearId]);

        $faculties = $this->YearFaculties->Faculties->find('list')
            ->where([
                'Faculties.id NOT IN' => $yearFaculties
            ]);

        $this->set(compact('faculties', 'releaseYear', 'yearFaculty'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Year Faculty id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $yearFaculty = $this->YearFaculties->get($id, [
            'contain' => ['Faculties', 'ReleaseYears'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $yearFaculty = $this->YearFaculties->patchEntity($yearFaculty, $this->request->getData());
            if ($this->YearFaculties->save($yearFaculty)) {
                $this->Flash->success(__('The year faculty has been saved.'));

                return $this->redirect(['controller' => 'ReleaseYears', 'action' => 'view', $yearFaculty->release_year_id]);
            }
            $this->Flash->error(__('The year faculty could not be saved. Please, try again.'));
        }
        $this->set(compact('yearFaculty'));
    }

    public function listGraduates($id)
    {
        $yearFaculty = $this->YearFaculties->findById($id)
            ->contain([
                'Faculties',
                'ReleaseYears',
                'StudyGroups.Graduates'
            ])
            ->firstOrFail();

        $this->set(compact('yearFaculty'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Year Faculty id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $yearFaculty = $this->YearFaculties->get($id);
        if ($this->YearFaculties->delete($yearFaculty)) {
            $this->Flash->success(__('The year faculty has been deleted.'));
        } else {
            $this->Flash->error(__('The year faculty could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
