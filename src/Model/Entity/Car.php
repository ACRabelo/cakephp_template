<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Car Entity
 *
 * @property string $id
 * @property string $name
 * @property bool|null $active
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $modified_at
 *
 * @property \App\Model\Entity\User[] $users
 */
class Car extends Entity
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
        'id' => false,
        'name' => true,
        'year' => true,
        'year_model' => true,
        'description' => true,
        'chassi' => true,
        'identifier' => true,
        'model' => true,
        'color' => true,
        'client_id' => true,
        'company_id' => true,
        'vendor_id' => true,
        'created_at' => true,
        'modified_at' => true,
    ];
}
