<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Traits\CreateRecordTrait;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cars Model
 *
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class CarsTable extends Table
{
    use CreateRecordTrait;
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('cars');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');

        $this->hasMany('Users', [
            'foreignKey' => 'user_id',
        ]);


        $this->belongsTo('Vendors', [
            'foreignKey' => 'vendor_id',
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
            ->uuid('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('year')
            ->maxLength('year', 4)
            ->requirePresence('year', 'create')
            ->notEmptyString('year');

        $validator
            ->scalar('year_model')
            ->maxLength('year_model', 4)
            ->requirePresence('year_model', 'create')
            ->notEmptyString('year_model');

        $validator
            ->scalar('chassi')
            ->maxLength('chassi', 50)
            ->requirePresence('chassi', 'create')
            ->notEmptyString('chassi');

        $validator
            ->scalar('identifier')
            ->maxLength('identifier', 10)
            ->requirePresence('identifier', 'create')
            ->notEmptyString('identifier');

        $validator
            ->scalar('model')
            ->maxLength('model', 60)
            ->requirePresence('model', 'create')
            ->notEmptyString('model');

        $validator
            ->scalar('color')
            ->maxLength('color', 10)
            ->requirePresence('color', 'create')
            ->notEmptyString('color');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('modified_at')
            ->allowEmptyDateTime('modified_at');


        return $validator;
    }

}
