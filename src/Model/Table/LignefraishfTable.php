<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lignefraishf Model
 *
 * @property \App\Model\Table\FichefraisTable&\Cake\ORM\Association\BelongsToMany $Fichefrais
 *
 * @method \App\Model\Entity\Lignefraishf newEmptyEntity()
 * @method \App\Model\Entity\Lignefraishf newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraishf[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraishf get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lignefraishf findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Lignefraishf patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraishf[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraishf|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lignefraishf saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lignefraishf[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignefraishf[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignefraishf[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignefraishf[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LignefraishfTable extends Table
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

        $this->setTable('lignefraishf');
        $this->setDisplayField('label');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Fichefrais', [
            'foreignKey' => 'lignefraishf_id',
            'targetForeignKey' => 'fichefrais_id',
            'joinTable' => 'fichefrais_lignefraishf',
        ]);

        $this->belongsToMany('Fichefrais', [
            'foreignKey' => 'lignefraishf_id',
            'targetForeignKey' => 'fichefrais_id',
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
            ->integer('montant')
            ->requirePresence('montant', 'create')
            ->notEmptyString('montant');

        $validator
            ->scalar('label')
            ->maxLength('label', 255)
            ->requirePresence('label', 'create')
            ->notEmptyString('label');

        return $validator;
    }
}
