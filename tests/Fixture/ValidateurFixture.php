<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ValidateurFixture
 */
class ValidateurFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'validateur';
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
                'nom_validateur' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
