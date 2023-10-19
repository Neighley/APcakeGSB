<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EtatFixture
 */
class EtatFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'etat';
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
                'etat' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
