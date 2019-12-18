<?php 
$id = (int)$_GET['id'];
      $sql = "select * from products where id='$id'";
      $rows = $conn->query($sql);
      $row = $rows->fetch_assoc();
      $category_id=$row["category_id"];
      $sql2="select * from categorys";
      $rows2 = $conn->query($sql2);

      $bool2=false;
      $bool1=false;
      $bool3=false;
      $bool4=false;
      $bool5=false;
      $bool6=fasle;
      $bool7=fasle;

      if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {

              $cid=$_POST["category_name"];
              if (empty($_POST["product_name"])) 
              {
                $nameError = "Product Name is required";
              }
              else
              {
                  $task = $_POST["product_name"];
                  if (!preg_match("/^[a-zA-Z 0-9]*$/",$task) || strlen($task)>50) 
                  {
                    if(strlen($task)>50)
                    {
                      $nameError = "Name is too Long....";
                    }
                    else
                    {
                      $nameError = "Please Enter Valid Name";
                    }
                  }
                  else
                  {
                    $bool2=true;
                  }
                }

                if(empty($_POST["product_id"]))
                {
                    $idError="The Product Id is Required";
                }
                else
                    {   $p_id=$_POST["product_id"];
                    if (!preg_match('/^[0-9]*$/',$p_id))
                    {
                        $idError="Only Numbers Ate Allowed";
                    }
                    else
                    {
                        $bool1=true;
                    }

                }

              if (empty($_POST["price"])) 
              {
                $priceEr = "Product Price is Required";
              }
             else 
             {
                $price = $_POST["price"];
                if (!preg_match('/^[0-9]*$/',$price)) 
                {
                  $priceErr = "Enter valid Product Price";
                }
                else
                {
                  $priceErr = "";
                  $bool3=true;
                }
            }

            if (empty($_POST["description"])) 
            {
                $descriptionErr = "Product Description is Required";
            } 
            else 
            {
              $description = $_POST["description"];
              if (strlen($description)>250)
              {
                  $descriptionErr = "The Description Should Be Less Then 250 Charecters ";
              }
              else
              {
                  $descriptionErr = "";
                  $bool4=true;
              }

            }
            if(empty($_POST["category_name"]))
            {
                $cnameErr="Please Select The Category";
            }
            else
            {
                $bool5=true;
                $cnameErr="";
            }

                if($bool1&&$bool2&&$bool3&&$bool4&&$bool5)
                {
                    $product_id=$_POST["product_id"];
                    $product_name=$_POST["product_name"];
                    $price=$_POST["price"];
                    $details=$_POST["description"];
                    $category_name=$_POST["category_name"];

                    $findDataExits="select * from products where product_id=$product_id or product_name='$product_name'";

                    $result =$conn->query($findDataExits)->fetch_assoc();

                    if($result["product_id"]==$product_id)
                    {
                        $idError="The Product Id is Already Exits";

                    }
                    else
                    {
                         $idError="";
                         $bool6=true;
                    } 
                       
                    if($result["product_name"]==$product_name)
                    {
                        $nameError="The Product Name is Already Exits";
                    }
                    else
                    {
                        $nameError="";
                        $bool7=true;
                    }

                    if($bool7&&$bool6)
                    {
                    $productUpdate = "update products set product_id=$product_id, product_name= '$product_name',price= $price,details= '$details',category_id=$category_name where id=$id";

                    if ($conn->query($productUpdate) === TRUE) 
                    {
                        echo "successfully updated";
                        header('Location: index.php');
                    }
                    else
                    {
                        echo "";
                    }
                    }

            }

      }
?>