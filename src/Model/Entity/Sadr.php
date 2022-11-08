<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sadr Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $user_id
 * @property string $date_reported
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Sadr extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'description' => true,
        'user_id' => true,
        'date_reported' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
