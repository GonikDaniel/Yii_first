<?php

return array(
    'GUEST' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null
    ),
    'USER' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'User',
        'children' => array(
            'GUEST',        // унаследуемся от гостя
        ),
        'bizRule' => null,
        'data' => null
    ),
    'ADMIN' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Admin',
        'children' => array(
            'USER',          // позволим модератору всё, что позволено пользователю
        ),
        'bizRule' => null,
        'data' => null
    ),
);