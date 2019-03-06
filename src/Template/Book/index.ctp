<div class="row">
<div class="panel panel-primary">
  <div class="panel-heading"><?php echo $title; ?>
    <?php
    echo $this->Html->link(
      "+ Add Book",
      "/book/addbook",
      [
        "class"=>"btn btn-success pull-right", 
        "style"=>"margin-top:-6px;"
      ]
    );
 ?>


  </div>
  <div class="panel-body">
  <table class="table">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Book Name</th>
        <th>Author</th>
        <th>Author Email</th>
        <th>Book Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
 <?php 
    $count = 1;
    foreach ($books as $key => $book) { ?>
       <tr>
        <td><?= $count++; ?></td>
        <td><?= $book->name; ?></td>
        <td><?= $book->author; ?></td>
        <td><?= $book->email; ?></td>
        <td><?php
          if(empty($book->img)){
            echo "N/A";
          } else { ?>
            <img src="<?php echo $this->Url->image($book->img); ?>" style="height:50px; width:50px;"/>
      <?php    }  ?> 
       </td>
        <td>
          <?php
        echo $this->Html->link(
            "Edit",
            "/book/edit/".$book->id,
            [
              "class"=>"btn btn-info"
            ]
         );
         echo $this->Html->link(
            "delete",
            "/book/delete/".$book->id,
            [
              "class"=>"btn btn-danger",
              "style"=>"margin-left:5px;"
            ]
         );


          ?>
        </td>
      </tr> 
   


<?php    } ?>


         
     
    </tbody>
  </table>
  </div>
</div>
</div>