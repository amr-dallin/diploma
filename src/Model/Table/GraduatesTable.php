<?php
declare(strict_types=1);

namespace App\Model\Table;

use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Graduates Model
 *
 * @method \App\Model\Entity\Graduate newEmptyEntity()
 * @method \App\Model\Entity\Graduate newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Graduate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Graduate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Graduate findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Graduate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Graduate[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Graduate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Graduate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Graduate[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Graduate[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Graduate[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Graduate[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class GraduatesTable extends Table
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

        $this->setTable('graduates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('StudyGroups', [
            'foreignKey' => 'study_group_id',
            'joinType' => 'INNER',
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
            ->nonNegativeInteger('study_group_id')
            ->notEmptyString('study_group_id');

        $validator
            ->scalar('last_name_en')
            ->maxLength('last_name_en', 45)
            ->requirePresence('last_name_en', 'create')
            ->notEmptyString('last_name_en');

        $validator
            ->scalar('first_name_en')
            ->maxLength('first_name_en', 45)
            ->requirePresence('first_name_en', 'create')
            ->notEmptyString('first_name_en');

        $validator
            ->scalar('last_name_uz')
            ->maxLength('last_name_uz', 45)
            ->requirePresence('last_name_uz', 'create')
            ->notEmptyString('last_name_uz');

        $validator
            ->scalar('first_name_uz')
            ->maxLength('first_name_uz', 45)
            ->requirePresence('first_name_uz', 'create')
            ->notEmptyString('first_name_uz');

        $validator
            ->scalar('second_name_uz')
            ->maxLength('second_name_uz', 45)
            ->requirePresence('second_name_uz', 'create')
            ->notEmptyString('second_name_uz');

        $validator
            ->boolean('excellent')
            ->notEmptyString('excellent');

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
        $rules->add($rules->existsIn('study_group_id', 'StudyGroups'), ['errorField' => 'study_group_id']);

        return $rules;
    }

    public function beforeSave(EventInterface $event, EntityInterface $entity, ArrayObject $options): void
    {

    }
}
