<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblGroupsTable Test Case
 */
class TblGroupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TblGroupsTable
     */
    public $TblGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TblGroups',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TblGroups') ? [] : ['className' => TblGroupsTable::class];
        $this->TblGroups = TableRegistry::getTableLocator()->get('TblGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TblGroups);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
