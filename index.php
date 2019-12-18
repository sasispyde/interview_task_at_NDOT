<?php 

//----------------------------------------un Used-----------------------------------------------------------

      // $getCategoryName="
      // SELECT products.category_id, categorys.id,categorys.category_name FROM products RIGHT JOIN categorys ON products.category_id= categorys.id";

      // $getAllProducts="select * from products";

      // $all_products=$conn->query($getAllProducts);

//----------------------------------------------------------------------------------------------------------  

      include "databaseconnection.php";

      $getCategoryName="
      SELECT products.*, categorys.category_name FROM products RIGHT JOIN categorys ON products.category_id= categorys.id WHERE products.id BETWEEN 0 AND 7 order by products.id";


      $category_name=$conn->query($getCategoryName);

      if($_GET['did']!="")
      { 
          $id1=$_GET['did'];
          $sqlForDelete="delete from products where id = ".$id1;
          if ($conn->query($sqlForDelete) === TRUE) 
          {
            header("Location:index.php");
          }
          else 
          {
            $error="The Product Cannot Be Deleted";
          }
      }

?>

<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	tr
	{
		height: 90px;
	}
  p
  {
    text-align: center;
  }

</style>
<body>
  <div class="table-responsive">
	<table class="table">
    <thead>
      <tr>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Details</th>
        <th>Category Name</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody id="records_table">
    <?php while($row = $category_name->fetch_assoc()) {
    	?>
      <tr>
        <td><?php echo $row["product_id"] ?></td>
        <td><?php echo $row["product_name"] ?></td>
        <td>&#x20b9; <?php echo $row["price"] ?></td>
        <td><?php echo $row["details"] ?></td>
        <td><?php echo $row["category_name"] ?></td>
        <td><a class="btn btn-primary" href="edit.php?id=<?php echo $row['id'] ?>">Edit</a></td>
        <td>
		<a  data-toggle="modal" data-id="<?php echo $row["id"]; ?>" class="btn btn-danger" data-target="#myModal<?php echo $row["id"]; ?>" id="ddata"  >Delete</a>
         <div class="modal fade" id="myModal<?php echo $row["id"]; ?>" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete Product</h4>
                             </div>
                                <div class="modal-body">
                                    <h3>Do You Want To Delete The Product</h3>
                                    </div>
                             	<div class="modal-footer">
                            <a href="?did=<?php echo $row['id'];?>" class="btn btn-danger" name="del">Delete</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>  
       		</div> 
        </td>
      </tr>
     <?php } ?>
    </tbody>
  </table>
  </div>
  </div>
<script type = "text/javascript">
          var value=14;
          var value2=8;
          var boo=false;
$(window).scroll(function() {

    if(boo)
    {
      $(window).scroll(function (){
        event.preventDefault();
      })
    }
    else
    {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {

        	$.ajax({
    	    type: "GET",
    	    datatype:"json",
    	    url: "ajax.php",
    	    data: {
    	        me: value,
              mes:value2,
    	    },
    	    success: function (data)
    	    {
            var datas=JSON.parse(data);
            if(datas[0]=="complete")
            {
              boo=true;
              var p=document.createElement("P");
              p.innerHTML = "No More Data To Show..........";
              document.body.appendChild(p);

            }
            else
            {
              var data=JSON.parse(data);
              var trHTML = '';
                $.each(data, function (i,data) {
                  trHTML += '<tr><td>' + data.product_id + '</td><td>' + 
                  data.product_name + '</td><td>' + 
                  data.price + '</td><td>' +
                  data.details + '</td><td>' +
                  data.category_name + '</td><td>' + '<a '+'href=' + "edit.php?id=" +data.id+ 
                  " class=\"btn btn-primary\""+">" +"Edit"+ '</a></td>' +
                  '<td>' + 
                  "<a data-toggle="+"modal "+"data-id="+data.id+" data-target="+"#myModal"+data.id+" id="+"ddata"+" class=\"btn btn-danger\""+">"+'Delete'+ 
                  "</a>"+
                  "<div" +" class="+"modal fade" +" id="+"myModal"+data.id+" role="+"dialog"+">"+
                  "<div"+ " class="+"modal-dialog"+">"+
                  "<div" +" class="+"modal-content"+">"+
                  "<div "+" class="+"modal-header"+">"+
                  "<button type="+"button" +" class="+"close" +" data-dismiss="+"modal"+">"+"&times;"+"</button>"+
                  "<h4" +" class="+"modal-title"+">"+"Delete Product</h4>"+
                  "</div>"+"<div" +" class="+"modal-body"+">"+
                  "<h3>Do You Want To Delete The Product</h3>"+
                  "</div>"+
                  "<div" +" class="+"modal-footer"+">"+
                  "<a"+" href="+"?did="+data.id +" class=\"btn btn-danger\""+" name="+"del"+">"+"Delete"+"</a>"+
                  "<button type="+"button" +" class="+"btn btn-default"+ " data-dismiss="+"modal"+">"+"Close"+"</button>"+
                  "</div>"+
                  "</div>"+  
                  "</div>"+
                  "</td>"+
                  '</tr>';          
              });
                $('#records_table').append(trHTML);
            }

    	    }

    	});
            value=value+7;
            value2=value2+7;
    }
  }

});

</script>

</body>
</html>