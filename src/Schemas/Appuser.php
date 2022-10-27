 <?php namespace Schemas;

class Appuser {const COLUMNS = [ 'Id_appUser'=> ['type' => 'int(11)', 'nullable'=> 'NO', 'default'=>''],
'pseudo'=> ['type' => 'varchar(255)', 'nullable'=> 'YES', 'default'=>''],
'is_deleted'=> ['type' => 'tinyint(1)', 'nullable'=> 'YES', 'default'=>''],
'Id_account'=> ['type' => 'int(11)', 'nullable'=> 'YES', 'default'=>''],
'Id_role'=> ['type' => 'int(11)', 'nullable'=> 'YES', 'default'=>''],
];

}