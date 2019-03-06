<div class="panel panel-default">
  <div class="panel-heading"><?php echo $title ?>
  <?php 
      echo $this->Html->link(
        "< Back",
        "/book",
        [
          "class"=>"btn btn-info pull-right",
          "style"=>"margin-top:-6px;"
        ]
      );

    ?>
  
  </div>
  <div class="panel-body">
 


<?php
    echo $this->Form->create(null,[
        "url"=>["action"=>"save"],
        "type"=>"file"
        
    ]);

    echo $this->Form->control('_id', ['type' => 'hidden', 'value' => 101]);
     ?>
 
    
    
    <div class="col-sm-10">
  <?php  echo $this->Form->control('name',[
        "class"=>"form-control"
    ]); ?>
    </div>

   
  <div class="form-group">
    
    <div class="col-sm-10">
    <?php  echo $this->Form->control('author',[
       "class"=>"form-control"
   ]); ?>
    </div>
  </div>
  
  <div class="form-group">
 
    <div class="col-sm-10">
    <?php  echo $this->Form->control('email', [
       'label' => 'Email ID',
       "class"=>"form-control"
       ]); ?>
    </div>
  </div>
  <div class="form-group">
    
    <div class="col-sm-10">
    <?php  echo $this->Form->control('description', [
       'type' => 'textarea',
       "class"=>"form-control"
   ]); ?>
    </div>
  </div>

  <div class="form-group">
    
    <div class="col-sm-10">
    <?php  echo $this->Form->control('file', [
            'type' => 'file',
            "class"=>"form-control"
            ]);   ?>
    </div>
  </div>

  

   <div class="form-group"> 
    <div class="col-sm-10">
    <?php echo "<br>";
        echo $this->Form->submit('Submit', ['class' => 'btn btn-success']);  ?>
    </div>
  </div>
   <?= $this->Form->end(); ?>
  </div>
</div>