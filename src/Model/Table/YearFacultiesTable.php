<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * YearFaculties Model
 *
 * @property \App\Model\Table\FacultiesTable&\Cake\ORM\Association\BelongsTo $Faculties
 * @property \App\Model\Table\ReleaseYearsTable&\Cake\ORM\Association\BelongsTo $ReleaseYears
 *
 * @method \App\Model\Entity\YearFaculty newEmptyEntity()
 * @method \App\Model\Entity\YearFaculty newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\YearFaculty[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\YearFaculty get($primaryKey, $options = [])
 * @method \App\Model\Entity\YearFaculty findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\YearFaculty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\YearFaculty[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\YearFaculty|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YearFaculty saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YearFaculty[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\YearFaculty[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\YearFaculty[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\YearFaculty[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class YearFacultiesTable extends Table
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

        $this->setTable('year_faculties');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Faculties', [
            'foreignKey' => 'faculty_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ReleaseYears', [
            'foreignKey' => 'release_year_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('StudyGroups', [
            'foreignKey' => 'year_faculty_id',
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
            ->nonNegativeInteger('faculty_id')
            ->notEmptyString('faculty_id');

        $validator
            ->nonNegativeInteger('release_year_id')
            ->notEmptyString('release_year_id');

        $validator
            ->scalar('faculty_title_en')
            ->allowEmptyString('faculty_title_en');

        $validator
            ->scalar('faculty_title_uz')
            ->allowEmptyString('faculty_title_uz');

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
        $rules->add($rules->existsIn('faculty_id', 'Faculties'), ['errorField' => 'faculty_id']);
        $rules->add($rules->existsIn('release_year_id', 'ReleaseYears'), ['errorField' => 'release_year_id']);

        return $rules;
    }
}
