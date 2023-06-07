<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GraduatesFixture
 */
class GraduatesFixture extends TestFixture
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
                'study_group_id' => 1,
                'number' => 1,
                'last_name_en' => 'Lorem ipsum dolor sit amet',
                'first_name_en' => 'Lorem ipsum dolor sit amet',
                'last_name_uz' => 'Lorem ipsum dolor sit amet',
                'first_name_uz' => 'Lorem ipsum dolor sit amet',
                'second_name_uz' => 'Lorem ipsum dolor sit amet',
                'excellent' => 1,
                'verified' => 1,
            ],
        ];
        parent::init();
    }
}
