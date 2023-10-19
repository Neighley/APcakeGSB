<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EtatTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EtatTable Test Case
 */
class EtatTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EtatTable
     */
    protected $Etat;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Etat',
        'app.Fichefrais',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Etat') ? [] : ['className' => EtatTable::class];
        $this->Etat = $this->getTableLocator()->get('Etat', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Etat);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EtatTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
