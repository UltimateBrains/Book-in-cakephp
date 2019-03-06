<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class BooksTable extends Table{
	
	public function validationDefault(Validator $validator)
	{

		$validator
		->requirePresence("name",addbook,"Name is Required")
		->add("name",[
			"length"=>[
				"rule"=>["minLength",6],
				"message"=>"Book name should be more than 5"
			]
		])
	    ->requirePresence("email",addbook,"Email is Required")
	    ->add("email",[
	    	"valid_email"=>[
	    		"rule"=>["email"],
	    		"message"=>"Invalid Email Address"
	    	]
	    ])
	    ->add("email",[
	    	"unique_email"=>[
	    		"rule"=>["validateUnique"],
	    		"provider"=>"table",
	    		"message"=>"Already email exists"
	    	]
	    ])
        ->requirePresence("author",addbook,"Author is Required");
     return $validator;
	}
}


?>