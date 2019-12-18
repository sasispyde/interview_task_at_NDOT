<?php 

      include "databaseconnection.php";

      include "validate.php";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
    <title>Edit</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <script src="validate.js"></script>
      <style type="text/css">
        p
        {
            color: red;
        }
      </style>

 </head>
 <body style="text-align: center;">

                         <form method="post">

                          <div class="form-group">
                            <label for="task">Product Id
                            <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57 "  name="product_id" id="product_id" maxlength="7" class="form-control" value="<?php echo $row["product_id"]; ?>" ></label>
                            <p id="id"> <?php echo $idError;?></p><br>

                            <label for="task">Product Name
                            <input type="text" name="product_name" id="product_name" maxlength="50" class="form-control" value="<?php echo $row["product_name"]; ?>" ></label>
                            <p id="pname"> <?php echo $nameError;?></p><br>

                            <label for="task">Price 
                            <input type="text" name="price" id="prices" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57 " maxlength="8" value="<?php echo $row["price"]; ?>" ></label>
                            <p id="price"> <?php echo $priceEr;?></p><br>


                            <label for="task">Product Description
                            <br>
                            <input type="text" name="description" id="descr" value="<?php echo $row["details"];  ?>" maxlength="250" class="form-control" >
                            </label>
                            <p id="des"> <?php echo $descriptionErr;?></p><br>

                          <select style="color: black;text-align-last: center; width: 217px;" id="category_name" name="category_name">

                             <!-- <option value="" >Select The Category</option> -->
                             
                              <?php while($rs=$rows2->fetch_assoc()){ ?>
                              <option value="<?php echo $rs["id"]; ?>" <?php if($rs['id']==$row['category_id']) { echo "selected";} ?> ><?php echo $rs["category_name"] ?></option>
                              <?php }?>

                            </select>
                            <p id="cname"> <?php echo $cnameErr;?></p><br>
                          </div>

                          <input type="submit" id="sumbit" class="btn btn-success" onclick="idValidate(), pnameValidate(),priceValidate(),desValidate(),cnameValidate()" name="submit" value="Update">&nbsp;
                          <a href="index.php" class="btn btn-danger">Cancel</a>
                        </form>
 
 </body>

 </html>