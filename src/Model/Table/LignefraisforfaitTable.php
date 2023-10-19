<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lignefraisforfait Model
 *
 * @property \App\Model\Table\FichefraisTable&\Cake\ORM\Association\BelongsToMany $Fichefrais
 *
 * @method \App\Model\Entity\Lignefraisforfait newEmptyEntity()
 * @method \App\Model\Entity\Lignefraisforfait newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraisforfait[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraisforfait get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lignefraisforfait findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Lignefraisforfait patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraisforfait[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraisforfait|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lignefraisforfait saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lignefraisforfait[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignefraisforfait[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignefraisforfait[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignefraisforfait[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LignefraisforfaitTable extends Table
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

        $this->setTable('lignefraisforfait');
        $this->setDisplayField('label');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Fichefrais', [
            'foreignKey' => 'lignefraisforfait_id',
            'targetForeignKey' => 'fichefrai_id',
            'joinTable' => 'fichefrais_lignefraisforfait',
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
            ->integer('label')
            ->requirePresence('label', 'create')
            ->notEmptyString('label');

        $validator
            ->integer('quantite')
            ->requirePresence('quantite', 'create')
            ->notEmptyString('quantite');

        $validator
            ->integer('fraisforfait_id')
            ->requirePresence('fraisforfait_id', 'create')
            ->notEmptyString('fraisforfait_id')
            ->add('fraisforfait_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['fraisforfait_id']), ['errorField' => 'fraisforfait_id']);

        return $rules;
    }
}
