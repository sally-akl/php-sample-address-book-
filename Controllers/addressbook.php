<?php

require_once dirname(__FILE__)."/../models/AddressModel.php";
require_once dirname(__FILE__)."/../models/ZipModel.php";
 class addressbook extends MainController
{
    
   
    public function index()
    {
        
        $address_book_list =  AddressModel::Instance("case_addressbook")->findByJoin('case_addressbook.id,case_addressbook.first_name , case_addressbook.last_name , case_addressbook.street_name , case_addressbook.zip_city_id , case_zips.zip_code , case_zips.city_id' ,'case_zips' ,' case_addressbook.zip_city_id =case_zips.id ');
        
        $this->View->render(dirname(__FILE__)."/../Views/addressbook/index.php", array("address_book"=>$address_book_list));
        
    }
    public function create()
    {
        $errors = array();
        if(isset($_POST["addressbook"]))
        {
            $this->_prepare();
            
            
            $validator = Validator::create();
            $validator->setFormField($this->submit_fields)->addRule( array(array('f_name','lname','l_street','l_zip'),'isrequired' , array("Please Enter First Name","Please Enter Last Name","Please Enter Street","Please Enter Zipcode")))
                ->addRule(array(array('l_zip'),'pattern',"/\b[A-Z]{2}\s+\d{5}(-\d{4})?\b/",array("Wrong zip code"))) 
                ->addRule(array(array('f_name'),'length',array(
            "condition"=>"lseq",
            "value"=>"35"
          ),array("Number of  Characters of First Name Not More than 35"))) 
                 ->addRule(array(array('lname'),'length',array(
            "condition"=>"lseq",
            "value"=>"35"
          ),array("Number of  Characters of Last Name Not More than 35"))) 
                 ->addRule(array(array('l_street'),'length',array(
            "condition"=>"lseq",
            "value"=>"50"
          ),array("Number of  Characters of Street Not More than 35"))) 
                ->validate();
                
               
            $errors = $validator->getErrors();
            if(!empty($this->submit_fields["l_zip"]))
            {
                
               $zip_r =  ZipModel::Instance("case_zips")->findbycondition(array( "and"=>array("eq"=>array(
                                                     "zip_code"=>$this->submit_fields["l_zip"] ,
                                                      "city_id"=> $this->submit_fields["l_city"]
                                                       ))));
               
                if(count($zip_r) == 0)
                {
                    $errors[] = "ZipCode not belong to city";
                }
                
            }
            
            
            if(count($errors) == 0)
            {
                
                
                // save data
                Connection::Instance()->newcommend()->Insert("case_addressbook" , array("first_name"=>$this->submit_fields["f_name"] , "last_name"=>$this->submit_fields["lname"] , "street_name"=>$this->submit_fields["l_street"] , "zip_city_id"=>$zip_r[0]["id"]));
                $redirect = GlobalVariables::$configArr["mainpath"] ."/?controller=addressbook&method=index";
                header('Location: '.$redirect);
                
            
                
            }
            
        }
        
          
     
         $this->View->render(dirname(__FILE__)."/../Views/addressbook/create.php", array("errors"=>$errors));
    }
    public function update()
    {
        $errors = array();
        $nmargs = func_num_args();
        if($nmargs == 3)
        {
            if(func_get_arg($nmargs-1) != null)
            {
                
                $id = func_get_arg($nmargs-1);
                $adress_book_details = AddressModel::Instance("`case_addressbook`")->findByJoin('case_addressbook.`id`,case_addressbook.`first_name` , case_addressbook.`last_name` , case_addressbook.`street_name` , case_addressbook.`zip_city_id` , case_zips.`zip_code` , case_zips.`city_id`' ,'`case_zips`' ,' case_addressbook.zip_city_id =case_zips.id ',array( ""=>array("eq"=>array(
                                                     "case_addressbook.`id`"=>func_get_arg($nmargs-1) )
                                                       )));
                    
                    
                    
                $adress_book_details = $adress_book_details[0];
               
                
                if(isset($_POST["addressbook"]))
                {
                    
                    $this->_prepare();
            
            
                    $validator = Validator::create();
                    $validator->setFormField($this->submit_fields)->addRule( array(array('f_name','lname','l_street','l_zip'),'isrequired' , array("Please Enter First Name","Please Enter Last Name","Please Enter Street","Please Enter Zipcode")))
                        ->addRule(array(array('l_zip'),'pattern',"/\b[A-Z]{2}\s+\d{5}(-\d{4})?\b/",array("Wrong zip code"))) 
                        ->addRule(array(array('f_name'),'length',array(
                    "condition"=>"lseq",
                    "value"=>"35"
                  ),array("Number of  Characters of First Name Not More than 35"))) 
                         ->addRule(array(array('lname'),'length',array(
                    "condition"=>"lseq",
                    "value"=>"35"
                  ),array("Number of  Characters of Last Name Not More than 35"))) 
                         ->addRule(array(array('l_street'),'length',array(
                    "condition"=>"lseq",
                    "value"=>"50"
                  ),array("Number of  Characters of Street Not More than 35"))) 
                        ->validate();


                    $errors = $validator->getErrors();
                    if(!empty($this->submit_fields["l_zip"]))
                    {

                       $zip_r =  ZipModel::Instance("case_zips")->findbycondition(array( "and"=>array("eq"=>array(
                                                             "zip_code"=>$this->submit_fields["l_zip"] ,
                                                              "city_id"=> $this->submit_fields["l_city"]
                                                               ))));

                        if(count($zip_r) == 0)
                        {
                            $errors[] = "ZipCode not belong to city";
                        }

                    }


                    if(count($errors) == 0)
                    {


                        // save data
                        Connection::Instance()->newcommend()->Update("case_addressbook" , array("first_name"=>$this->submit_fields["f_name"] , "last_name"=>$this->submit_fields["lname"] , "street_name"=>$this->submit_fields["l_street"] , "zip_city_id"=>$zip_r[0]["id"]) , array( ""=>array("eq"=>array(
                                                     "id"=>func_get_arg($nmargs-1) )
                                                       )));
                        $redirect = GlobalVariables::$configArr["mainpath"] ."/?controller=addressbook&method=index";
                        header('Location: '.$redirect);



                    }
                    
                    
                    
                }
                
                
               
                
                 $this->View->render(dirname(__FILE__)."/../Views/addressbook/update.php",array("errors"=>$errors , "adress_book_details"=>$adress_book_details));
                
            }
        }
        
        
        
        
    }
    public function delete()
    {
        $nmargs = func_num_args();
        if($nmargs == 3)
        {
            if(func_get_arg($nmargs-1) != null)
            {
                $condition =array( ""=>array("eq"=>array(
                                                     "id"=>func_get_arg($nmargs-1) )
                                                       ));
                AddressModel::Instance("case_addressbook")->delete($condition);   
                $redirect = GlobalVariables::$configArr["mainpath"] ."/?controller=addressbook&method=index";
                header('Location: '.$redirect);
            } 
        }
        
   
    }
     
    private function _prepare()
    {
         $this->submit_fields["f_name"] = $_POST["addressbook"]["f_name"];
         $this->submit_fields["lname"] = $_POST["addressbook"]["lname"];
         $this->submit_fields["l_street"] = $_POST["addressbook"]["l_street"];
         $this->submit_fields["l_zip"] = $_POST["addressbook"]["l_zip"];
         $this->submit_fields["l_city"] = $_POST["addressbook"]["l_city"];
        
    }
    public function export()
    {
        header('Content-type: text/xml');
        header('Content-Disposition: attachment; filename="addressbook.xml"');
        $address_book_list =  AddressModel::Instance("case_addressbook")->findByJoin('case_addressbook.id,case_addressbook.first_name , case_addressbook.last_name , case_addressbook.street_name , case_addressbook.zip_city_id , case_zips.zip_code , case_zips.city_id' ,'case_zips' ,' case_addressbook.zip_city_id =case_zips.id ');
        
       
        $xml="<?xml version=\"1.0\" ?>\n";
        $xml .= "<addressbooks>"; 
        foreach($address_book_list as $address)
        {
           $xml .='<adressbook>';
           $xml .='<f_name>'.$address["first_name"].'</f_name>';
           $xml .='<l_name>'.$address["last_name"].'</l_name>';
           $xml .='<str>'.$address["street_name"].'</str>';
           $xml .='<zip>'.$address["zip_code"].'</zip>';
            
           $xml .='</adressbook>';
            
        }
         $xml .= "</addressbooks>"; 
       echo $xml;
    }
    
    
    
}


?>