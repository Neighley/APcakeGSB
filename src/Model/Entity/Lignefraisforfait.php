<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lignefraisforfait Entity
 *
 * @property int $id
 * @property int $quantite
 * @property int $fraisforfait_id
 *
 * @property \App\Model\Entity\Fichefrai[] $fichefrais
 * @property \App\Model\Entity\Fraisforfait $fraisforfait
 */
class Lignefraisforfait extends Entity
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
        'quantite' => true,
        'fraisforfait_id' => true,
        'fichefrais' => true,
        'fraisforfait' => true,
    ];
}
