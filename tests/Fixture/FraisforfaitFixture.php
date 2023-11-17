<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FraisforfaitFixture
 */
class FraisforfaitFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'fraisforfait';
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
                'montant' => 1,
                'label' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
