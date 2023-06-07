<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudyGroupsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudyGroupsTable Test Case
 */
class StudyGroupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StudyGroupsTable
     */
    protected $StudyGroups;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.StudyGroups',
        'app.YearFaculties',
        'app.Graduates',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StudyGroups') ? [] : ['className' => StudyGroupsTable::class];
        $this->StudyGroups = $this->getTableLocator()->get('StudyGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->StudyGroups);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StudyGroupsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StudyGroupsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
