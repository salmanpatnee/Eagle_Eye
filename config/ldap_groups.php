<?php

return [
    // AD Group DN => Eagle Eye role_id
    env('LDAP_GROUP_ADMIN') => 1,
    env('LDAP_GROUP_MANAGER') => 2,
    env('LDAP_GROUP_USER') => 3,
    env('LDAP_GROUP_VIEWER') => 4,
];
