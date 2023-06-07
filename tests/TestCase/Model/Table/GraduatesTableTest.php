<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GraduatesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GraduatesTable Test Case
 */
class GraduatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GraduatesTable
     */
    protected $Graduates;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Graduates',
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
        $config = $this->getTableLocator()->exists('Graduates') ? [] : ['className' => GraduatesTable::class];
        $this->Graduates = $this->getTableLocator()->get('Graduates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Graduates);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\GraduatesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\GraduatesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
