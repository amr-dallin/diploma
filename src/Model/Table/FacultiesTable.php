<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Faculties Model
 *
 * @property \App\Model\Table\YearFacultiesTable&\Cake\ORM\Association\HasMany $YearFaculties
 *
 * @method \App\Model\Entity\Faculty newEmptyEntity()
 * @method \App\Model\Entity\Faculty newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Faculty[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Faculty get($primaryKey, $options = [])
 * @method \App\Model\Entity\Faculty findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Faculty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Faculty[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Faculty|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Faculty saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Faculty[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Faculty[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Faculty[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Faculty[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FacultiesTable extends Table
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

        $this->setTable('faculties');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('YearFaculties', [
            'foreignKey' => 'faculty_id',
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
            ->scalar('title')
            ->maxLength('title', 128)
            ->requirePresence('title', 'create')
            ->notEmptyString('title')
            ->add('title', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('title_print_en')
            ->requirePresence('title_print_en', 'create')
            ->notEmptyString('title_print_en');

        $validator
            ->scalar('title_print_uz')
            ->requirePresence('title_print_uz', 'create')
            ->notEmptyString('title_print_uz');

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
        $rules->add($rules->isUnique(['title']), ['errorField' => 'title']);

        return $rules;
    }
}
