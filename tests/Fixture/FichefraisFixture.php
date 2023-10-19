<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FichefraisFixture
 */
class FichefraisFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'annee' => 1,
                'mois' => 1,
                'montantvalide' => 1,
                'user_id' => 'bde1c7c7-c04e-4aab-811a-623f74383bde',
                'etat_id' => 1,
            ],
        ];
        parent::init();
    }
}
