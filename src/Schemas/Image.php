 <?php namespace Schemas;

class Image {const COLUMNS = [ 'Id_image'=> ['type' => 'int(11)', 'nullable'=> 'NO', 'default'=>''],
'src'=> ['type' => 'varchar(255)', 'nullable'=> 'YES', 'default'=>''],
'alt'=> ['type' => 'varchar(255)', 'nullable'=> 'YES', 'default'=>''],
'is_deleted'=> ['type' => 'tinyint(1)', 'nullable'=> 'YES', 'default'=>''],
'Id_tag'=> ['type' => 'int(11)', 'nullable'=> 'YES', 'default'=>''],
'Id_article'=> ['type' => 'int(11)', 'nullable'=> 'YES', 'default'=>''],
];

}