<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'city-list',
            'city-create',
            'city-edit',
            'city-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'activity-list',
            'activity-create',
            'activity-edit',
            'activity-delete',

            'cancelReason-list',
            'cancelReason-create',
            'cancelReason-edit',
            'cancelReason-delete',

            'coupon-list',
            'coupon-create',
            'coupon-edit',
            'coupon-delete',

            'faq-list',
            'faq-create',
            'faq-edit',
            'faq-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'complain-list',
            'complain-delete',

            'store-list',
            'store-create',
            'store-edit',
            'store-delete',

            'delivery-list',
            'delivery-create',
            'delivery-edit',
            'delivery-delete',

            'shipment-list',
            'shipment-create',
            'shipment-edit',
            'shipment-delete',
            'shipment-show',

            'setting-list',
            'setting-create',

        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission] ,
            );
        }
    }
}
