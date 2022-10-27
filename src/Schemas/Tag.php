 <?php namespace Schemas;

class Tag {const COLUMNS = [ 'Id_tag'=> ['type' => 'int(11)', 'nullable'=> 'NO', 'default'=>''],
'title'=> ['type' => 'varchar(255)', 'nullable'=> 'YES', 'default'=>''],
'is_deleted'=> ['type' => 'tinyint(1)', 'nullable'=> 'YES', 'default'=>''],
];

}