<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudyGroup Entity
 *
 * @property int $id
 * @property int $year_faculty_id
 * @property string $title
 * @property bool $verified
 *
 * @property \App\Model\Entity\YearFaculty $year_faculty
 * @property \App\Model\Entity\Graduate[] $graduates
 */
class StudyGroup extends Entity
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
        'year_faculty_id' => true,
        'title' => true,
        'verified' => true,
        'year_faculty' => true,
        'graduates' => true,
    ];
}
