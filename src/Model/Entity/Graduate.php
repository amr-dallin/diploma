<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Graduate Entity
 *
 * @property int $id
 * @property int $study_group_id
 * @property int $number
 * @property string $last_name_en
 * @property string $first_name_en
 * @property string $last_name_uz
 * @property string $first_name_uz
 * @property string $second_name_uz
 * @property bool $excellent
 * @property bool $verified
 *
 * @property \App\Model\Entity\Group $group
 */
class Graduate extends Entity
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
        'study_group_id' => true,
        'number' => true,
        'last_name_en' => true,
        'first_name_en' => true,
        'last_name_uz' => true,
        'first_name_uz' => true,
        'second_name_uz' => true,
        'excellent' => true,
        'verified' => true,
        'group' => true,
    ];

    protected $_virtual = ['full_name_en', 'full_name_uz'];

    protected function _getFullNameEn()
    {
        return "{$this->first_name_en} {$this->last_name_en}";
    }

    protected function _getFullNameUz()
    {
        return "{$this->last_name_uz} {$this->first_name_uz} {$this->second_name_uz}";
    }
}
