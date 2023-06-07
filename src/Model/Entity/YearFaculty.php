<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * YearFaculty Entity
 *
 * @property int $id
 * @property int $faculty_id
 * @property int $release_year_id
 * @property string|null $faculty_title_en
 * @property string|null $faculty_title_uz
 *
 * @property \App\Model\Entity\Faculty $faculty
 * @property \App\Model\Entity\ReleaseYear $release_year
 * @property \App\Model\Entity\Group[] $groups
 */
class YearFaculty extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'faculty_id' => true,
        'release_year_id' => true,
        'faculty_title_en' => true,
        'faculty_title_uz' => true,
        'faculty' => true,
        'release_year' => true,
        'groups' => true,
    ];
}
