<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FichefraisTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FichefraisTable Test Case
 */
class FichefraisTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FichefraisTable
     */
    protected $Fichefrais;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Fichefrais',
        'app.Users',
        'app.Lignefraisforfait',
        'app.Lignefraishf',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Fichefrais') ? [] : ['className' => FichefraisTable::class];
        $this->Fichefrais = $this->getTableLocator()->get('Fichefrais', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Fichefrais);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FichefraisTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FichefraisTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
