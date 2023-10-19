<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fichefrai Entity
 *
 * @property int $id
 * @property int $annee
 * @property int $mois
 * @property int $montantvalide
 * @property string $user_id
 * @property int $etat_id
 *
 * @property \CakeDC\Users\Model\Entity\User $user
 * @property \App\Model\Entity\Lignefraisforfait[] $lignefraisforfait
 * @property \App\Model\Entity\Lignefraishf[] $lignefraishf
 */
class Fichefrai extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'annee' => true,
        'mois' => true,
        'montantvalide' => true,
        'user_id' => true,
        'etat_id' => true,
        'user' => true,
        'lignefraisforfait' => true,
        'lignefraishf' => true,
    ];
}
