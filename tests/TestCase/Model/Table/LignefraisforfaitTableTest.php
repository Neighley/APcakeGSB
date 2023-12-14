<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LignefraisforfaitTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LignefraisforfaitTable Test Case
 */
class LignefraisforfaitTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LignefraisforfaitTable
     */
    protected $Lignefraisforfait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Lignefraisforfait',
        'app.Fichefrais',
        'app.Fraisforfait',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Lignefraisforfait') ? [] : ['className' => LignefraisforfaitTable::class];
        $this->Lignefraisforfait = $this->getTableLocator()->get('Lignefraisforfait', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Lignefraisforfait);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LignefraisforfaitTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LignefraisforfaitTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
