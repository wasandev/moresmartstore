<?php

return [
    /*
    |--------------------------------------------------------------------------
    | User model class
    |--------------------------------------------------------------------------
    */

    'user_model' => 'App\User',

    /*
    |--------------------------------------------------------------------------
    | Nova User resource tool class
    |--------------------------------------------------------------------------
    */

    'user_resource' => 'App\Nova\User',

    /*
    |--------------------------------------------------------------------------
    | The group associated with the resource
    |--------------------------------------------------------------------------
    */

    'role_resource_group' => 'Admin',

    /*
    |--------------------------------------------------------------------------
    | Database table names
    |--------------------------------------------------------------------------
    | When using the "HasRoles" trait from this package, we need to know which
    | table should be used to retrieve your roles. We have chosen a basic
    | default value but you may easily change it to any table you like.
    */

    'table_names' => [
        'roles' => 'roles',

        'role_permission' => 'role_permission',

        'role_user' => 'role_user',

        'users' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Permissions
    |--------------------------------------------------------------------------
    */
    //ผู้ใช้
    'permissions' => [
        'view users' => [
            'display_name' => 'ดู',
            'description'  => 'Can view users',
            'group'        => 'ผู้ใช้',
        ],

        'create users' => [
            'display_name' => 'สร้าง',
            'description'  => 'Can create users',
            'group'        => 'ผู้ใช้',
        ],

        'edit users' => [
            'display_name' => 'แก้ไข',
            'description'  => 'Can edit users',
            'group'        => 'ผู้ใช้',
        ],

        'delete users' => [
            'display_name' => 'ลบ',
            'description'  => 'Can delete users',
            'group'        => 'ผู้ใช้',
        ],

        'view roles' => [
            'display_name' => 'ดู',
            'description'  => 'Can view roles',
            'group'        => 'กำหนดสิทธิ์',
        ],

        'create roles' => [
            'display_name' => 'สร้าง',
            'description'  => 'Can create roles',
            'group'        => 'กำหนดสิทธิ์',
        ],

        'edit roles' => [
            'display_name' => 'แก้ไข',
            'description'  => 'Can edit roles',
            'group'        => 'กำหนดสิทธิ์',
        ],

        'delete roles' => [
            'display_name' => 'ลบ',
            'description'  => 'Can delete roles',
            'group'        => 'กำหนดสิทธิ์',
        ],
        //ประเภทธุรกิจ
        'view businesstypes' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ประเภทธุรกิจ',
        ],

        'create businesstypes' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ประเภทธุรกิจ',
        ],

        'edit businesstypes' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ประเภทธุรกิจ',
        ],

        'delete businesstypes' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ประเภทธุรกิจ',
        ],
        //หมวดสินค้า
        'view categories' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ประเภทสินค้า',
        ],

        'create categories' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ประเภทสินค้า',
        ],

        'edit categories' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ประเภทสินค้า',
        ],

        'delete categories' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ประเภทสินค้า',
        ],
        //เว็บเพจ
        'view pages' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'เว็บเพจ',
        ],

        'create pages' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'เว็บเพจ',
        ],

        'edit pages' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'เว็บเพจ',
        ],

        'delete pages' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'เว็บเพจ',
        ],
        //หมวดเนื้อหา
        'view blog_cats' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'หมวดเนื้อหา',
        ],

        'create blog_cats' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'หมวดเนื้อหา',
        ],

        'edit blog_cats' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'หมวดเนื้อหา',
        ],

        'delete blog_cats' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'หมวดเนื้อหา',
        ],
        //เนื้อหาเว็บ
        'view blogs' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'เนื้อหาเว็บ',
        ],

        'create blogs' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'เนื้อหาเว็บ',
        ],

        'edit blogs' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'เนื้อหาเว็บ',
        ],

        'delete blogs' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'เนื้อหาเว็บ',
        ],
        //ข้อมูลร้านค้า
        'view vendors' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ข้อมูลร้านค้า',
        ],

        'create vendors' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ข้อมูลร้านค้า',
        ],

        'edit vendors' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ข้อมูลร้านค้า',
        ],

        'delete vendors' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ข้อมูลร้านค้า',
        ],
        //ข้อมูลสินค้า
        'view products' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ข้อมูลสินค้า',
        ],

        'create products' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ข้อมูลสินค้า',
        ],

        'edit products' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ข้อมูลสินค้า',
        ],

        'delete products' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ข้อมูลสินค้า',
        ],
        //โพสโฆษณา
        'view posts' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'โพสโฆษณา',
        ],

        'create posts' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'โพสโฆษณา',
        ],

        'edit posts' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'โพสโฆษณา',
        ],

        'delete posts' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'โพสโฆษณา',
        ],
        //แสดงความเห็น
        'view comments' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'แสดงความเห็น',
        ],

        'create comments' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'แสดงความเห็น',
        ],

        'edit comments' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'แสดงความเห็น',
        ],

        'delete comments' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'แสดงความเห็น',
        ],
    ],
];
