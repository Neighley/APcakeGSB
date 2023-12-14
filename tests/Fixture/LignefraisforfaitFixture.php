<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LignefraisforfaitFixture
 */
class LignefraisforfaitFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'lignefraisforfait';
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
                'quantite' => 1,
                'fraisforfait_id' => 1,
            ],
        ];
        parent::init();
    }
}
