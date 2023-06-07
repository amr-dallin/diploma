<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudyGroupsFixture
 */
class StudyGroupsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'year_faculty_id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'verified' => 1,
            ],
        ];
        parent::init();
    }
}
