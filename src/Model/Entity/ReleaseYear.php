<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReleaseYear Entity
 *
 * @property int $id
 * @property string $year
 * @property string $date_en
 * @property string $date_uz
 *
 * @property \App\Model\Entity\YearFaculty[] $year_faculties
 */
class ReleaseYear extends Entity
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
        'year' => true,
        'date_en' => true,
        'date_uz' => true,
        'year_faculties' => true,
    ];
}
