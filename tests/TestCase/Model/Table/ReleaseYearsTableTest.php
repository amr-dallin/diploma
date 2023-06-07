<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReleaseYearsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReleaseYearsTable Test Case
 */
class ReleaseYearsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReleaseYearsTable
     */
    protected $ReleaseYears;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ReleaseYears',
        'app.YearFaculties',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ReleaseYears') ? [] : ['className' => ReleaseYearsTable::class];
        $this->ReleaseYears = $this->getTableLocator()->get('ReleaseYears', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ReleaseYears);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ReleaseYearsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ReleaseYearsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
