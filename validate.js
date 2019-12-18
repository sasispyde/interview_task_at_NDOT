        var names = $('#product_name').val();
        var id = $('#product_id').val();
        var price = $('#price').val();
        var description = $('#description').val();
        var c_name = $('#category_name').val();


        function stick(event)
        {
            event.preventDefault();
            event.stopImmediatePropagation();
            return false;
        }

        function idValidate()
        {
            var id = $('#product_id').val();
            console.log(id);
            var numRX = /^[0-9]*$/;
            if(id=="")
            {
                stick(event);
                console.log("dsfsf");
                document.getElementById("id").innerHTML = "Enter The Product Details";
                return false;
            }
            if(id.match(numRX))
            {
                NAME=true;
                document.getElementById("id").innerHTML = "";
                return true;
            }
            else
            {   
                stick(event);
                document.getElementById("id").innerHTML = "Please Enter Valid Id";
                return false;
            }
        }

    function pnameValidate()
        {
            var name = $('#product_name').val();
            console.log(name);
            var numRX =/^[a-zA-Z 0-9]*$/;
            if(name=="")
            {
                stick(event);
                document.getElementById("pname").innerHTML = "Please Enter Product Name";
                return false;

            }
            if(name.match(numRX))
            {
                NAME=true;
                document.getElementById("pname").innerHTML = "";
                return true;
            }
            else
            {   
                stick(event);
                document.getElementById("pname").innerHTML = "Please Enter Valid Product Name";
                return false;
            }
        }
    function priceValidate()
        {
            var price = $('#prices').val();
            console.log(price);
            var numRX =/^[ 0-9]*$/;
            if(price=="")
            {
                document.getElementById("price").innerHTML = "Please Enter Product Price";
                stick(event);
                return false;
            }
            if(name.match(numRX))
            {
                NAME=true;
                document.getElementById("price").innerHTML = "";
                return true;
            }
            else
            {   
                stick(event);
                document.getElementById("price").innerHTML = "Please Enter Valid Price";
                return false;
            }
        }

    function desValidate()
        {
            var name = $('#descr').val();
            console.log(name);
            var numRX =/^[a-zA-Z 0-9]*$/;
            if(name=="")
            {
                stick(event);
                document.getElementById("des").innerHTML = "Enter The Product Details";
                return false;
            }
            else
            {

            if(name.match(numRX))
            {
                NAME=true;
                document.getElementById("des").innerHTML = "";
                return true;
            }
            else
            {   
                stick(event);
                document.getElementById("des").innerHTML = "Please Enter Valid Description";
                return false;
            }

            }

    }


    function cnameValidate()
        {
            var name = $('#category_name').val();
            console.log(name);
            var numRX =/^[a-zA-Z ]*$/;
            if(name=="")
            {
                stick(event);
                document.getElementById("cname").innerHTML = "Please Select The Category";
                return false;   
            }
            else
            {
                document.getElementById("cname").innerHTML = "";
                return true;
            }
    }