<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\YearFacultiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\YearFacultiesTable Test Case
 */
class YearFacultiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\YearFacultiesTable
     */
    protected $YearFaculties;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.YearFaculties',
        'app.Faculties',
        'app.ReleaseYears',
        'app.Groups',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('YearFaculties') ? [] : ['className' => YearFacultiesTable::class];
        $this->YearFaculties = $this->getTableLocator()->get('YearFaculties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->YearFaculties);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\YearFacultiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\YearFacultiesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
