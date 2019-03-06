<?php

namespace App\Controller;
use App\Controller\AppController;


class BookController  extends AppController{

    public function initialize(){
       parent :: initialize();

       $this->loadModel("Books");
       $this->viewBuilder()->setlayout("booklayout");
    }
    public function index(){
        // book list
        $books = $this->Books->find("all");
        $this->set("title","Book List");
        $this->set("books",$books);
    }
    
    public function save(){
         $this->autoRender= false;
         //print_r($this->request->getData());
         $book = $this->Books->newEntity($this->request->getData());
         $validation = $book->errors();

        if (!empty($validation)) {
             //  print_r($validation);
             $this->Flash->set($validation,[
                 "element"=>"book_error"
            ]);
        } else {
            $form_data = $this->request->data;
            
            // print_r($this->request->data);
            // die; 
            $uploaded_path = "/img/uploads/";
            $tmp_name = $this->request->data['file']['tmp_name'];
            // Validating image file
            $validImage = getimagesize($tmp_name);
            if ($validImage) {
                $this->Flash->set("Image file is not valid",[
                    "element"=>"book_error"
                    ]); 
            } else{
                $image_name = $this->request->data['file']['name'];
             
                // print_r($uploaded_path."".$image_name);
                // die;
                if (move_uploaded_file($tmp_name, WWW_ROOT.$uploaded_path."".$image_name)) {
                    $book->name = $form_data['name'];
                    $book->email = $form_data['email'];
                    $book->author = $form_data['author'];
                    $book->description = $form_data['description'];
                    $book->img = $uploaded_path."".$image_name;
                  
                    $this->Books->save($book);
                    $this->Flash->set("Book has been added successfully",[
                        "element"=>"book_success"
                    ]);
                } else{
                    $this->Flash->set("Image has been not uploaded successfully",[
                        "element"=>"book_error"
                    ]);
                }
            }

           
            
        }      
         $this->redirect(["action" => "addbook"]);
    }
    public function edit($id){
        // Book edit
        $book = $this->Books->get($id);
        $this->set("title","Book Edit");
        $this->set("book",$book);

    }
    public function update(){
        // Book update
        $this->autoRender= false;
        $formdata = $this->request->data;
        $book = $this->Books->get($formdata['bookID']);
        $book->name = $formdata['name'];
        $book->author = $formdata['author'];
        $book->email = $formdata['email'];        
        $book->description = $formdata['description'];

        $this->Books->save($book);
        $this->Flash->set("Book has been successfully Updated",[
            "element"=>"book_success"
        ]);
        $this->redirect(["action"=>"edit/".$formdata['bookID']]);
    }
    public function delete($id){
        // Book delete
        $this->autoRender= false;
        $book = $this->Books->get($id);
        $this->Books->delete($book);
        $this->Flash->set("Book has been Deleted Successfully",[
            "element"=>"book_success"
        ]);
        $this->redirect(["action"=>"index"]);
    }

    public function addbook(){
        $this->set("title","Add Book");
    }
}




?>