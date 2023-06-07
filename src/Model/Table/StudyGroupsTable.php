<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudyGroups Model
 *
 * @property \App\Model\Table\YearFacultiesTable&\Cake\ORM\Association\BelongsTo $YearFaculties
 * @property \App\Model\Table\GraduatesTable&\Cake\ORM\Association\HasMany $Graduates
 *
 * @method \App\Model\Entity\StudyGroup newEmptyEntity()
 * @method \App\Model\Entity\StudyGroup newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\StudyGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StudyGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\StudyGroup findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\StudyGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StudyGroup[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\StudyGroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StudyGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StudyGroup[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StudyGroup[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\StudyGroup[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StudyGroup[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StudyGroupsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('study_groups');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('YearFaculties', [
            'foreignKey' => 'year_faculty_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Graduates', [
            'foreignKey' => 'study_group_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('year_faculty_id')
            ->notEmptyString('year_faculty_id');

        $validator
            ->scalar('title')
            ->maxLength('title', 45)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->boolean('verified')
            ->notEmptyString('verified');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('year_faculty_id', 'YearFaculties'), ['errorField' => 'year_faculty_id']);

        return $rules;
    }
}
