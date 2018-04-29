<table class="table table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Street</th>
        <th>ZipCode</th>
          <th></th>
      </tr>
    </thead>
    <tbody>
        
        <?php
          foreach($address_book as $address)
          {
              
              ?>
                 <tr>
                <td><?php echo $address["first_name"];  ?></td>
                <td><?php echo $address["last_name"];   ?></td>
                <td><?php echo $address["street_name"];   ?></td>
                <td><?php
              
                  echo $address["zip_code"];
              
              
                ?></td>
                <td><a href="<?php  echo GlobalVariables::$configArr["mainpath"];   ?>/?controller=addressbook&method=update&id=<?php  echo  $address["id"];   ?>"><i class="glyphicon glyphicon-edit"></i></a>
                   <a href="<?php  echo GlobalVariables::$configArr["mainpath"];   ?>/?controller=addressbook&method=delete&id=<?php  echo  $address["id"];   ?>"><i class="glyphicon glyphicon-remove"></i></a>  
                     </td>
              </tr>
              
              <?php
          }
        
        ?>
        
    </tbody>
  </table>

<button type="button" onclick="create()" class="btn btn-primary">New</button>
<button type="button" onclick="exp()" class="btn btn-primary">Export</button>

<script type="text/javascript">

    function create()
    {
        window.location = "<?php  echo GlobalVariables::$configArr["mainpath"];   ?>/?controller=addressbook&method=create"
    }
     function exp()
    {
        window.location = "<?php  echo GlobalVariables::$configArr["mainpath"];   ?>/?controller=addressbook&method=export"
    }
    


</script>


