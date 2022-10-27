 <?php namespace Schemas;

class Article {const COLUMNS = [ 'Id_article'=> ['type' => 'int(11)', 'nullable'=> 'NO', 'default'=>''],
'tilte'=> ['type' => 'varchar(255)', 'nullable'=> 'YES', 'default'=>''],
'content'=> ['type' => 'text', 'nullable'=> 'YES', 'default'=>''],
'created_at'=> ['type' => 'datetime', 'nullable'=> 'YES', 'default'=>''],
'updated_at'=> ['type' => 'datetime', 'nullable'=> 'YES', 'default'=>''],
'is_deleted'=> ['type' => 'tinyint(1)', 'nullable'=> 'YES', 'default'=>''],
'Id_appUser'=> ['type' => 'int(11)', 'nullable'=> 'YES', 'default'=>''],
'Id_theme'=> ['type' => 'int(11)', 'nullable'=> 'YES', 'default'=>''],
];

}