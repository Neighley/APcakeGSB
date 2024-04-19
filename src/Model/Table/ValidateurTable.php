<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Validateur Model
 *
 * @property \App\Model\Table\FichefraisTable&\Cake\ORM\Association\HasMany $Fichefrais
 *
 * @method \App\Model\Entity\Validateur newEmptyEntity()
 * @method \App\Model\Entity\Validateur newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Validateur[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Validateur get($primaryKey, $options = [])
 * @method \App\Model\Entity\Validateur findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Validateur patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Validateur[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Validateur|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Validateur saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Validateur[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Validateur[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Validateur[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Validateur[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ValidateurTable extends Table
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

        $this->setTable('validateur');
        $this->setDisplayField('validateur');
        $this->setPrimaryKey('id');

        $this->hasMany('Fichefrais', [
            'foreignKey' => 'validateur_id',
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
            ->scalar('nom_validateur')
            ->maxLength('nom_validateur', 100)
            ->requirePresence('nom_validateur', 'create')
            ->notEmptyString('nom_validateur');

        return $validator;
    }
}
