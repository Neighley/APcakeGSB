<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\LignefraisforfaitController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\LignefraisforfaitController Test Case
 *
 * @uses \App\Controller\LignefraisforfaitController
 */
class LignefraisforfaitControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Lignefraisforfait',
        'app.Fichefrais',
        'app.FichefraisLignefraisforfait',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\LignefraisforfaitController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\LignefraisforfaitController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\LignefraisforfaitController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\LignefraisforfaitController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\LignefraisforfaitController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
