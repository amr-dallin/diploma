<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Graduates Controller
 *
 * @property \App\Model\Table\GraduatesTable $Graduates
 * @method \App\Model\Entity\Graduate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GraduatesController extends AppController
{
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($studyGroupId = null)
    {
        $studyGroup = $this->Graduates->StudyGroups->get($studyGroupId, [
            'contain' => [
                'YearFaculties' => [
                    'Faculties',
                    'ReleaseYears'
                ]
            ]
        ]);

        $graduate = $this->Graduates->newEmptyEntity();
        if ($this->request->is('post')) {
            $graduate = $this->Graduates->patchEntity($graduate, $this->request->getData());
            $graduate->set('study_group_id', $studyGroupId);

            $graduateLast = $this->Graduates->find()
                ->order(['Graduates.number' => 'DESC'])
                ->first();

            $number = 654;
            if (!empty($graduateLast)) {
                $number = $graduateLast->number + 1;
            }

            $graduate->set('number', $number);

            if ($this->Graduates->save($graduate)) {
                $this->Flash->success(__('The graduate has been saved.'));

                return $this->redirect(['controller' => 'StudyGroups', 'action' => 'view', $studyGroupId]);
            }
            $this->Flash->error(__('The graduate could not be saved. Please, try again.'));
        }

        $this->set(compact('graduate', 'studyGroup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Graduate id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $graduate = $this->Graduates->get($id, [
            'contain' => [
                'StudyGroups.YearFaculties' => [
                    'Faculties',
                    'ReleaseYears'
                ]
            ],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $graduate = $this->Graduates->patchEntity($graduate, $this->request->getData());
            if ($this->Graduates->save($graduate)) {
                $this->Flash->success(__('The graduate has been saved.'));

                return $this->redirect(['controller' => 'StudyGroups', 'action' => 'view', $graduate->study_group_id]);
            }
            $this->Flash->error(__('The graduate could not be saved. Please, try again.'));
        }

        $this->set(compact('graduate'));
    }

    public function verified($id = null)
    {
        $this->request->allowMethod(['post']);
        $graduate = $this->Graduates->get($id);
        $graduate->set('verified', ($graduate->verified ? false : true));
        if ($this->Graduates->save($graduate)) {
            $this->Flash->success(__('The graduate has been verified.'));
        } else {
            $this->Flash->error(__('The graduate could not be verified. Please, try again.'));
        }

        return $this->redirect(['controller' => 'StudyGroups', 'action' => 'view', $graduate->study_group_id]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Graduate id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $graduate = $this->Graduates->get($id);
        if ($this->Graduates->delete($graduate)) {
            $this->Flash->success(__('The graduate has been deleted.'));
        } else {
            $this->Flash->error(__('The graduate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'StudyGroups', 'action' => 'view', $graduate->study_group_id]);
    }
}
