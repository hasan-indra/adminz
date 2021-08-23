<?php

return [
    "administrator" => [
        "title" => "Administrator",
        "route" => ['index'],
        "icon" => "fas fa-users-cog",
        "view" => "",
        "children" => [
            "role" => [
                "title" => "Role",
                "route" => ["index", "create", "update", "delete", "permission"],
                "icon" => "fas fa-unlock-alt",
                "view" => "admin",
            ],
            "user" => [
                "title" => "User",
                "route" => ["index", "create", "update", "delete", "activated"],
                "icon" => "fas fa-users",
                "view" => "admin",
            ],
        ],
    ],
];
