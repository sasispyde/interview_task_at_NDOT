 <?php 

 //----------------------------------un_used codes ------------------------------------

      	//   $getCategoryName="
	      // SELECT products.category_id, categorys.id,categorys.category_name FROM products RIGHT JOIN categorys ON products.category_id= categorys.id limit $limit";

 	      // $getAllProducts="select * from products limit $limit";

	      // $category_name=$conn->query($getCategoryName);


	      // $row2=$category_name->fetch_assoc();

	      // echo json_encode($all_products->fetch_assoc());
	      // $json[] =array();

 //-------------------------------------------------------------------------------------

      include "databaseconnection.php";



      if ($_SERVER['REQUEST_METHOD'] === "GET") 
      {
          $limit=$_GET["me"];
          $limit3=$_GET["mes"];

	      $getAllProducts="
	      SELECT products.*, categorys.category_name FROM products RIGHT JOIN categorys ON products.category_id= categorys.id WHERE products.id BETWEEN $limit3 AND $limit order by products.id";

	      $all_products=$conn->query($getAllProducts);

	      while($row=$all_products->fetch_assoc())
	      {
	      	$json[] =$row;
	      }
	      	$c= count($json);
	      	if($c!=0)
	      	{
	      	echo json_encode($json);
	      	}
	      	else
	      	{
	      	$json[0]="complete";
	      	echo json_encode($json);
	      	}

      }
?>





        if ($agent_invoice_submit && Validation::factory($_POST)) 
        {
            $post_values = Securityvalid::sanitize_inputs( Arr::map( 'trim', $this->request->post() ) );

            $details = $agent_model->getUser($post_values['agent_id']);

            $post_values['invoice_amount']=$details[0]["invoice_amount"];

            $validator   = $agent_model->validate_agent_invoice_amount( arr::extract( $post_values,array('agent_invoice_amount','agent_id','invoice_amount')));


        }



            public function validate_agent_invoice_amount($form_values)
    {

            $invoice_amount = $form_values['invoice_amount'];

            $validate = Validation::factory($form_values)

            ->rule('agent_invoice_amount', 'not_empty')
            ->rule('agent_invoice_amount', 'range', array(':value', 1, $invoice_amount));

           return $validate;
    }






     $('.filterme').keypress(function(eve) {
  if ((eve.which != 46 || $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0) ) {
    eve.preventDefault();
  }
     
// this part is when left part of number is deleted and leaves a . in the leftmost position. For example, 33.25, then 33 is deleted
 $('.filterme').keyup(function(eve) {
  if($(this).val().indexOf('.') == 0) {    $(this).val($(this).val().substring(1));
  }
 });
});