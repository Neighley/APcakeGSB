<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FraisforfaitTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FraisforfaitTable Test Case
 */
class FraisforfaitTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FraisforfaitTable
     */
    protected $Fraisforfait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Fraisforfait',
        'app.Lignefraisforfait',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Fraisforfait') ? [] : ['className' => FraisforfaitTable::class];
        $this->Fraisforfait = $this->getTableLocator()->get('Fraisforfait', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Fraisforfait);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FraisforfaitTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
