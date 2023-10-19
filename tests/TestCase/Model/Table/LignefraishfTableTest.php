<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LignefraishfTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LignefraishfTable Test Case
 */
class LignefraishfTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LignefraishfTable
     */
    protected $Lignefraishf;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Lignefraishf',
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
        $config = $this->getTableLocator()->exists('Lignefraishf') ? [] : ['className' => LignefraishfTable::class];
        $this->Lignefraishf = $this->getTableLocator()->get('Lignefraishf', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Lignefraishf);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LignefraishfTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
