<?php
  if(count($errors) > 0)
  {
      ?>
      <div class="alert alert-danger" role="alert">
          <ul>
          <?php
             foreach($errors as $error)
             {
                 ?>
                 <li><?php  echo $error;   ?></li>
                 <?php
             }
      
           ?>
          </ul>
          
      </div>
      <?php
  }

?>




<form action="" method="post">

 <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control" name="addressbook[f_name]"  value="<?php  echo isset($_POST["addressbook"])?$_POST["addressbook"]["f_name"] : '';  ?>" id="f_name" placeholder="First Name">
  </div>
    
  <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" class="form-control" name="addressbook[lname]" value="<?php  echo isset($_POST["addressbook"])?$_POST["addressbook"]["lname"] : '';  ?>"  id="l_name" placeholder="Last Name">
  </div>
    
  <div class="form-group">
    <label for="exampleInputEmail1">Street</label>
    <input type="text" class="form-control" name="addressbook[l_street]" value="<?php  echo isset($_POST["addressbook"])?$_POST["addressbook"]["l_street"] : '';  ?>" id="l_street" placeholder="Street">
  </div> 
    
  <div class="form-group">
    <label for="exampleInputEmail1">Zip Code</label>
    <input type="text" class="form-control" name="addressbook[l_zip]" value="<?php  echo isset($_POST["addressbook"])?$_POST["addressbook"]["l_zip"] : '';  ?>" id="l_zip" placeholder="Zip Code">
  </div>   
    
  
  <div class="form-group">
    <label for="exampleInputEmail1">City</label>
    <select class="form-control" name="addressbook[l_city]" id="l_city">
        <?php
           $cities = Connection::Instance()->newcommend()->Select("id,title")->From("case_cities")->Build()->Query(true,"")->GetResult();
           
           foreach($cities as $city)
           {
               ?>
        
        <option value="<?php  echo $city["id"];   ?>"><?php    echo $city["title"];    ?></option>
        
              <?php
           }
        
           
         ?>
        
        

    </select>
      
      
  </div>   
    
    
    <button type="submit" class="btn btn-default">Save</button>

</form>