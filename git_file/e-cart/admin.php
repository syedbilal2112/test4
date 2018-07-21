<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="jquery-2.1.4.min.js"></script>
</head>
<body>
<form>
	<label>Enter the product name</label>
	<input id="product" type="text" name="product"><br/>
	<label>Enter the product Quantity</label>
	<input id="quantity" type="number" name="quantity"><br/>
	<label>Enter the product Cost</label>
	<input id="cost" type="number" name="cost"><br/>
	<label>Enter the product Description</label>
	<input id="description" type="text" name="description"><br/>
	<label>Enter the product Image</label>
	<input type="file" name="files[]" id="file" accept=".jpg" required/>
	<input type="button" id="sub" name="submit" value="Submit">
</form>


<table class="table" id="history_display">
                <thead>
                 <th>ID</th>
                  <th>Product Name</th>
                  <th>Cost</th>
                  <th>Quantity</th>
                  
                   <th>Description</th>
                   
                </thead>
            </table>

<form id="edit">
	<label>Enter the product name</label>
	<input id="product1" type="text" name="product"><br/>
	<label>Enter the product Quantity</label>
	<input id="quantity1" type="number" name="quantity"><br/>
	<label>Enter the product Cost</label>
	<input id="cost1" type="number" name="cost"><br/>
	<label>Enter the product Description</label>
	<input id="description1" type="text" name="description"><br/>
	<input type="hidden" id="id" name="id" value="0">
		<label>Enter the product Image</label>
	<input type="file" name="files[]" id="file1" accept=".jpg" required/>
                   	
	<input type="button" id="sub1" name="submit" value="Submit">
</form>
<p id="call"></p>


<script type="text/javascript">
	
	  $(document).ready(function(){
	  	$('#edit').hide();
					$.ajax({
                        url: "show.php",
                        type: "get",
                        data: {

                        },
                        success: function (response) {
                          alert(response)
                        var obj=JSON.parse(response);
                        var table_content=""
                        $('#history_display').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.id+"</td>";
                            table_content+="<td>"+value.name+"</td>";
                            table_content+="<td>"+value.cost+"</td>";
                            table_content+="<td>"+value.quantity+"</td>";
                            table_content+="<td>"+value.description+"</td>";
                            table_content+="<td><button type='button' onclick='call("+value.id+")'>Click</button></td>";
                            table_content+="</tr>"

                            ;
                        });
                        $("#history_display").append(table_content);
                        },
                        error: function (response) {
                          
                           alert(response);
                        }
                    });
                    


	  		$('#sub').click(function(){
	  		
	  				add_products();
	  		});
	  		$('#sub1').click(function(){
	  			alert('clicked');
	  				update_products();
	  		});
	
               });


	  function call(obj){
	  	document.getElementById('edit').style.display="block";
	  	var id=obj;
	  	$.ajax({
                    url:"edit.php",
                    type:"get",
                    data:{
                        "id":id,
                        
                    },
                    success:function(data){
                       
                       var obj=JSON.parse(data);
                      
                       $.each(obj,function(index,value){
                       	
                           document.getElementById('product1').value=value.name;
                           document.getElementById('quantity1').value=value.quantity;
                           document.getElementById('cost1').value=value.cost;
                           document.getElementById('description1').value=value.description;
                           document.getElementById('id').value=value.id;
                        });
                      
                    },
                    error:function(data){
                    	alert('not right');
                    }
                });

	  }

	  	function add_products(){

                var product=document.getElementById('product').value;
                var quantity = document.getElementById('quantity').value;
                var cost = document.getElementById('cost').value;
                var description = document.getElementById('description').value;
                
                var img = document.getElementById('file').value;
               

                $.ajax({
                    url:"addproduct.php",
                    type:"get",
                    data:{
                        "product":product,
                        "quantity":quantity,
                        "cost":cost,
                        "description":description,
                        "img":img

                    },
                    success:function(data){
                       alert(data);  
                        
                    },
                    error:function(data){
                    	alert('not right');
                    }
                });
        }
        	function update_products(){
        		
                var product=document.getElementById('product1').value;
                var id=document.getElementById('id').value;
                var quantity = document.getElementById('quantity1').value;
                var cost = document.getElementById('cost1').value;
                var description = document.getElementById('description1').value;
              
                var img = document.getElementById('file1').value;
               
                alert(id);
                $.ajax({
                    url:"update.php",
                    type:"get",
                    data:{
                        "product":product,
                        "quantity":quantity,
                        "cost":cost,
                        "description":description,
                        "img":img,
                        "id":id

                    },
                    success:function(data){
                       alert(data);   
                        
                    },
                    error:function(data){
                    	alert('not right');
                    }
                });
        }

             
</script>
</body>
</html>