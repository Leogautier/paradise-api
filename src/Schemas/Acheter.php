 <?php namespace Schemas;

class Acheter {const COLUMNS = [ 'Id_article'=> ['type' => 'int(11)', 'nullable'=> 'NO', 'default'=>''],
'Id_commande'=> ['type' => 'int(11)', 'nullable'=> 'NO', 'default'=>''],
'prix'=> ['type' => 'decimal(15,2)', 'nullable'=> 'YES', 'default'=>''],
'quantité'=> ['type' => 'int(11)', 'nullable'=> 'YES', 'default'=>''],
];

}