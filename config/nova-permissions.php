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
            'group'        => 'สิทธิ์การใช้งาน',
        ],

        'create roles' => [
            'display_name' => 'สร้าง',
            'description'  => 'Can create roles',
            'group'        => 'สิทธิ์การใช้งาน',
        ],

        'edit roles' => [
            'display_name' => 'แก้ไข',
            'description'  => 'Can edit roles',
            'group'        => 'สิทธิ์การใช้งาน',
        ],

        'delete roles' => [
            'display_name' => 'ลบ',
            'description'  => 'Can delete roles',
            'group'        => 'สิทธิ์การใช้งาน',
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
        //ข้อมูลธุรกิจ
        'view own vendors' => [
            'display_name' => 'ดูข้อมูลของตัวเอง',
            'description'  => 'ดูข้อมูลของตัวเอง',
            'group'        => 'ข้อมูลธุรกิจ',
        ],
        'view vendors' => [
            'display_name' => 'ดูข้อมูล',
            'description'  => 'ดูข้อมูล',
            'group'        => 'ข้อมูลธุรกิจ',
        ],

        'manage own vendors' => [
            'display_name' => 'จัดการข้อมูลของตัวเอง',
            'description'  => 'จัดการข้อมูลของตัวเอง',
            'group'        => 'ข้อมูลธุรกิจ',
        ],

        'manage vendors' => [
            'display_name' => 'จัดการข้อมูล',
            'description'  => 'จัดการข้อมูล',
            'group'        => 'ข้อมูลธุรกิจ',
        ],


        //หมวดสินค้า
        'view own categories' => [
            'display_name' => 'ดูข้อมูลของตัวเอง',
            'description'  => 'ดูข้อมูลของตัวเอง',
            'group'        => 'ประเภทสินค้า',
        ],
        'view categories' => [
            'display_name' => 'ดูข้อมูล',
            'description'  => 'ดูข้อมูล',
            'group'        => 'ประเภทสินค้า',
        ],

        'manage own categories' => [
            'display_name' => 'จัดการข้อมูลของตัวเอง',
            'description'  => 'จัดการข้อมูลของตัวเอง',
            'group'        => 'ประเภทสินค้า',
        ],
        'manage categories' => [
            'display_name' => 'จัดการข้อมูล',
            'description'  => 'จัดการข้อมูล',
            'group'        => 'ประเภทสินค้า',
        ],
         //หน่วยนับ
        'view own units' => [
            'display_name' => 'ดูข้อมูลของตัวเอง',
            'description'  => 'ดูข้อมูลของตัวเอง',
            'group'        => 'หน่วยนับสินค้า',
        ],
        'view units' => [
            'display_name' => 'ดูข้อมูล',
            'description'  => 'ดูข้อมูล',
            'group'        => 'หน่วยนับสินค้า',
        ],

        'manage own units' => [
            'display_name' => 'จัดการข้อมูลของตัวเอง',
            'description'  => 'จัดการข้อมูลของตัวเอง',
            'group'        => 'หน่วยนับสินค้า',
        ],
        'manage units' => [
            'display_name' => 'จัดการข้อมูล',
            'description'  => 'จัดการข้อมูล',
            'group'        => 'หน่วยนับสินค้า',
        ],
        //ข้อมูลสินค้า
        'view own products' => [
            'display_name' => 'ดูข้อมูลของตัวเอง',
            'description'  => 'ดูข้อมูลของตัวเอง',
            'group'        => 'ข้อมูลสินค้า',
        ],
        'view products' => [
            'display_name' => 'ดูข้อมูล',
            'description'  => 'ดูข้อมูล',
            'group'        => 'ข้อมูลสินค้า',
        ],

        'manage own products' => [
            'display_name' => 'จัดการข้อมูลของตัวเอง',
            'description'  => 'จัดการข้อมูลของตัวเอง',
            'group'        => 'ข้อมูลสินค้า',
        ],

        'manage products' => [
            'display_name' => 'จัดการข้อมูล',
            'description'  => 'จัดการข้อมูล',
            'group'        => 'ข้อมูลสินค้า',
        ],


        //โพสโฆษณา
        'view own posts' => [
            'display_name' => 'ดูข้อมูลของตัวเอง',
            'description'  => 'ดูข้อมูลของตัวเอง',
            'group'        => 'โพสโฆษณา',
        ],
        'view posts' => [
            'display_name' => 'ดูข้อมูล',
            'description'  => 'ดูข้อมูล',
            'group'        => 'โพสโฆษณา',
        ],
        'manage own posts' => [
            'display_name' => 'จัดการข้อมูลของตัวเอง',
            'description'  => 'จัดการข้อมูลของตัวเอง',
            'group'        => 'โพสโฆษณา',
        ],

        'manage posts' => [
            'display_name' => 'จัดการข้อมูล',
            'description'  => 'จัดการข้อมูล',
            'group'        => 'โพสโฆษณา',
        ],


        //แสดงความเห็น
        'view own comments' => [
            'display_name' => 'ดูข้อมูลของตัวเอง',
            'description'  => 'ดูข้อมูลของตัวเอง',
            'group'        => 'แสดงความเห็น',
        ],
        'view comments' => [
            'display_name' => 'ดูข้อมูล',
            'description'  => 'ดูข้อมูล',
            'group'        => 'แสดงความเห็น',
        ],
        'manage own comments' => [
            'display_name' => 'จัดการข้อมูลของตัวเอง',
            'description'  => 'จัดการข้อมูลของตัวเอง',
            'group'        => 'แสดงความเห็น',
        ],

        'manage comments' => [
            'display_name' => 'จัดการข้อมูล',
            'description'  => 'จัดการข้อมูล',
            'group'        => 'แสดงความเห็น',
        ],





    ],
];
