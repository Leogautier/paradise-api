 <?php namespace Schemas;

class Account {const COLUMNS = [ 'Id_account'=> ['type' => 'int(11)', 'nullable'=> 'NO', 'default'=>''],
'login'=> ['type' => 'varchar(255)', 'nullable'=> 'YES', 'default'=>''],
'password'=> ['type' => 'varchar(255)', 'nullable'=> 'YES', 'default'=>''],
'is_deleted'=> ['type' => 'tinyint(1)', 'nullable'=> 'YES', 'default'=>''],
];

}