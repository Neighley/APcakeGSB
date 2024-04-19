<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ValidateurTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ValidateurTable Test Case
 */
class ValidateurTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ValidateurTable
     */
    protected $Validateur;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Validateur',
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
        $config = $this->getTableLocator()->exists('Validateur') ? [] : ['className' => ValidateurTable::class];
        $this->Validateur = $this->getTableLocator()->get('Validateur', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Validateur);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ValidateurTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
