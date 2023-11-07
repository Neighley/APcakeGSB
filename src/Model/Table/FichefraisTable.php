<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fichefrais Model
 *
 * @property \CakeDC\Users\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\LignefraisforfaitTable&\Cake\ORM\Association\BelongsToMany $Lignefraisforfait
 * @property \App\Model\Table\LignefraishfTable&\Cake\ORM\Association\BelongsToMany $Lignefraishf
 *
 * @method \App\Model\Entity\Fichefrai newEmptyEntity()
 * @method \App\Model\Entity\Fichefrai newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Fichefrai[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fichefrai get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fichefrai findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Fichefrai patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fichefrai[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fichefrai|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fichefrai saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fichefrai[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fichefrai[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fichefrai[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fichefrai[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FichefraisTable extends Table
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

        $this->setTable('fichefrais');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'className'=>'CakeDC/Users.Users',
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Lignefraisforfait', [
            'foreignKey' => 'fichefrai_id',
            'targetForeignKey' => 'lignefraisforfait_id',
            'joinTable' => 'fichefrais_lignefraisforfait',
        ]);
        $this->belongsToMany('Lignefraishf', [
            'foreignKey' => 'fichefrai_id',
            'targetForeignKey' => 'lignefraishf_id',
            'joinTable' => 'fichefrais_lignefraishf',
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
            ->integer('annee')
            ->requirePresence('annee', 'create')
            ->notEmptyString('annee');

        $validator
            ->integer('mois')
            ->requirePresence('mois', 'create')
            ->notEmptyString('mois');

        $validator
            ->integer('montantvalide')
            ->requirePresence('montantvalide', 'create')
            ->notEmptyString('montantvalide');

        $validator
            ->uuid('user_id')
            ->notEmptyString('user_id')
            ->add('user_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('etat_id')
            ->requirePresence('etat_id', 'create')
            ->notEmptyString('etat_id')
            ->add('etat_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->isUnique(['etat_id']), ['errorField' => 'etat_id']);

        return $rules;
    }
}
