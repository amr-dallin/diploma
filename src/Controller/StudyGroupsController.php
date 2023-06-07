<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * StudyGroups Controller
 *
 * @property \App\Model\Table\StudyGroupsTable $StudyGroups
 * @method \App\Model\Entity\StudyGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudyGroupsController extends AppController
{
    /**
     * View method
     *
     * @param string|null $id Study Group id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studyGroup = $this->StudyGroups->get($id, [
            'contain' => [
                'YearFaculties' => [
                    'Faculties',
                    'ReleaseYears',
                ],
                'Graduates'
            ]
        ]);

        $this->set(compact('studyGroup'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($yearFacultyId = null)
    {
        $yearFaculty = $this->StudyGroups->YearFaculties->get($yearFacultyId, [
            'contain' => [
                'Faculties',
                'ReleaseYears'
            ]
        ]);

        $studyGroup = $this->StudyGroups->newEmptyEntity();
        if ($this->request->is('post')) {
            $studyGroup = $this->StudyGroups->patchEntity($studyGroup, $this->request->getData());
            $studyGroup->set('year_faculty_id', $yearFacultyId);
            if ($this->StudyGroups->save($studyGroup)) {
                $this->Flash->success(__('The study group has been saved.'));

                return $this->redirect(['controller' => 'ReleaseYears', 'action' => 'view', $yearFaculty->release_year_id]);
            }
            $this->Flash->error(__('The study group could not be saved. Please, try again.'));
        }
        $this->set(compact('studyGroup', 'yearFaculty'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Study Group id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studyGroup = $this->StudyGroups->get($id, [
            'contain' => [
                'YearFaculties' => [
                    'Faculties',
                    'ReleaseYears'
                ]
            ],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studyGroup = $this->StudyGroups->patchEntity($studyGroup, $this->request->getData());
            if ($this->StudyGroups->save($studyGroup)) {
                $this->Flash->success(__('The study group has been saved.'));

                return $this->redirect(['controller' => 'ReleaseYears', 'action' => 'view', $studyGroup->year_faculty->release_year_id]);
            }
            $this->Flash->error(__('The study group could not be saved. Please, try again.'));
        }

        $this->set(compact('studyGroup'));
    }

    public function verified($id = null)
    {
        $this->request->allowMethod(['post']);
        $studyGroup = $this->StudyGroups->get($id, [
            'contain' => [
                'Graduates',
                'YearFaculties'
            ]
        ]);

        if (!$studyGroup->verified) {
            if (empty($studyGroup->graduates)) {
                $this->Flash->error(__('The verified could not be verified. No graduates added to this group.'));
                return $this->redirect(['controller' => 'StudyGroups', 'action' => 'view', $studyGroup->id]);
            }
            foreach($studyGroup->graduates as $graduate) {
                if (!$graduate->verified) {
                    $this->Flash->error(__('The verified could not be verified. Not all graduates are verified.'));
                    return $this->redirect(['controller' => 'StudyGroups', 'action' => 'view', $studyGroup->id]);
                }
            }
        }

        $studyGroup->set('verified', ($studyGroup->verified ? false : true));
        if ($this->StudyGroups->save($studyGroup)) {
            $this->Flash->success(__('The study group has been verified.'));
        } else {
            $this->Flash->error(__('The verified could not be verified. Please, try again.'));
        }

        return $this->redirect(['controller' => 'ReleaseYears', 'action' => 'view', $studyGroup->year_faculty->release_year_id]);
    }

    public function generate($id)
    {
        $studyGroup = $this->StudyGroups->findById($id)
            ->contain([
                'Graduates',
                'YearFaculties' => [
                    'Faculties',
                    'ReleaseYears'
                ]
            ])
            ->firstOrFail();

        $this->set('studyGroup', $studyGroup);
    }

    /**
     * Delete method
     *
     * @param string|null $id Study Group id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studyGroup = $this->StudyGroups->get($id, [
            'contain' => [
                'YearFaculties'
            ]
        ]);
        if ($this->StudyGroups->delete($studyGroup)) {
            $this->Flash->success(__('The study group has been deleted.'));
        } else {
            $this->Flash->error(__('The study group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'ReleaseYears', 'action' => 'view', $studyGroup->year_faculty->release_year_id]);
    }
}
