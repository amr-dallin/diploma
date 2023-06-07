<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReleaseYears Model
 *
 * @property \App\Model\Table\YearFacultiesTable&\Cake\ORM\Association\HasMany $YearFaculties
 *
 * @method \App\Model\Entity\ReleaseYear newEmptyEntity()
 * @method \App\Model\Entity\ReleaseYear newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ReleaseYear[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReleaseYear get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReleaseYear findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ReleaseYear patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReleaseYear[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReleaseYear|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReleaseYear saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReleaseYear[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ReleaseYear[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ReleaseYear[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ReleaseYear[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ReleaseYearsTable extends Table
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

        $this->setTable('release_years');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('YearFaculties', [
            'foreignKey' => 'release_year_id',
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
            ->scalar('year')
            ->requirePresence('year', 'create')
            ->notEmptyString('year')
            ->add('year', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('date_en')
            ->requirePresence('date_en', 'create')
            ->notEmptyString('date_en');

        $validator
            ->scalar('date_uz')
            ->requirePresence('date_uz', 'create')
            ->notEmptyString('date_uz');

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
        $rules->add($rules->isUnique(['year']), ['errorField' => 'year']);

        return $rules;
    }
}
