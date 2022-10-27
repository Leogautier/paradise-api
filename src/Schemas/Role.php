 <?php namespace Schemas;

class Role {const COLUMNS = [ 'Id_role'=> ['type' => 'int(11)', 'nullable'=> 'NO', 'default'=>''],
'title'=> ['type' => 'varchar(255)', 'nullable'=> 'YES', 'default'=>''],
'is_deleted'=> ['type' => 'tinyint(1)', 'nullable'=> 'YES', 'default'=>''],
];

}