<!DOCTYPE html>
<!-- http://mfikri.com/en/blog/crud-codeigniter-ajax -->
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Product List</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
</head>
<body>
<div class="container"> <!--responsive fixed width container -->
	  <!-- Control the column width, and how they should appear on different devices -->
    <div class="row">
        <div class="col-12">  <!-- extra small devices - screen width less than 576px, 12 columns -->
            <div class="col-md-12"> <!-- medium devices - screen width equal to or greater than 768px -->
                <h1>Credit Grants hello hello hello 
                    <small>Advisement</small>
                    <div class="float-right">
											<a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add">
												 <!-- void(0) evaluates to undefined, so the browser stays on the same page. -->
												 <!-- class="btn btn-primary" causes anchor to be displayed as a button -->
												 <!-- data-toggle="modal" activates a popup window  -->
												 <!-- data-target="#Modal_Add" specifies target of popup -window -->
												 <!--<span class="fa fa-plus"></span>  --> <!-- font awesome -->
												 Add New Credit Grant
											 </a>
										</div>
                </h1>
            </div>

            <!-- Show student's personal information here  -->
            <div class=" col-md-12 border" style="margin: 15px auto;"></div>
            <div class=" col-md-12 student-information">
              <h2 style="font-size: 20px">Student Information </h2>
              <h3 style="font-size: 14px">Student ID: <span style="font-size:14px;">12345678</span> </h3>
              <h3 style="font-size: 14px">Student Name: <span style="font-size:14px;">John Smith</span> </h3> 
              <h3 style="font-size: 14px">Course Program: <span style="font-size:14px;">Master's in Information and Communications Technology</span> </h3> 
            </div>
            <div class=" col-md-12 border" style="margin: 15px auto;"></div>

            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
                        <th>Study Period</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Grade</th>
                        <th>Institution</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="show_data">
                </tbody>
            </table>
        </div>
    </div>
</div>

		<!-- MODAL ADD -->
            <form>
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<!--  tabindex="-1" disables the tabbing order for elements in the current document -->
							<!-- role="dialog" improves accessibility for people using screen readers, e.g. for text to speech  -->
              <!-- aria-labelledby  stablishes relationships between objects and their label(s),
							     and its value should be one or more element IDs,
									 which refer to elements that have the text needed for labeling.
									 Useful for screen readers
									 https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/ARIA_Techniques/Using_the_aria-labelledby_attribute
							-->
              <div class="modal-dialog modal-lg" role="document">
								<!-- role="document" improves acessibility for people using screen readers -->
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Credit Grant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<!--  closes the modal if you click on it -->
											<!-- aria-label provides the text "Close" for screen readers -->
                      <span aria-hidden="true">&times;</span> <!-- &times; causes x to be displayed -->
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
													  <!-- 2/12 for label and 10/12 for input field -->
                            <label class="col-md-2 col-form-label">Subject Code</label>
                            <div class="col-md-10">
                              <input type="text" name="product_code" id="product_code" class="form-control" placeholder="Subject Code">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Subject Name</label>
                            <div class="col-md-10">
                              <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Subject Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Grade</label>
                            <div class="col-md-10">
                              <input type="text" name="price" id="price" class="form-control" placeholder="Grade">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->

        <!-- MODAL EDIT -->
        <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Subject Code</label>
                            <div class="col-md-10">
                              <input type="text" name="product_code_edit" id="product_code_edit" class="form-control" placeholder="Subject Code" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Subject Name</label>
                            <div class="col-md-10">
                              <input type="text" name="product_name_edit" id="product_name_edit" class="form-control" placeholder="Subject Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Grade</label>
                            <div class="col-md-10">
                              <input type="text" name="price_edit" id="price_edit" class="form-control" placeholder="Grade">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->

        <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Subject Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="product_code_delete" id="product_code_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>

<script type="text/javascript">
	$(document).ready(function(){
		show_product();	          //call function to download all products and display it

		$('#mydata').dataTable(); //initialize the data table using jquery.dataTables.js and dataTables.bootstrap4.js

		//AJAX call to download all products before the page is loaded on the browser
		function show_product(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo site_url('product/product_data')?>',
		        async : false, //ajax has to be complete before executing next
		        dataType : 'json',
		        success : function(data){

							//JSON encoded data will be in the form:
							//[
							// {"product_code" : 19739140,"product_name" :  Product 1,"product_price" : 1970    },
              // {"product_code" : "Steve","product_name" : 19739140 "29","product_price" : "male"}
						  //];

		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
                            '<td> Year 1 Semester 2</td>'+
		                  		  '<td>'+data[i].product_code+'</td>'+
		                        '<td>'+data[i].product_name+'</td>'+
		                        '<td>'+data[i].product_price+'</td>'+
                            '<td> Some other institution </td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-product_code="'+data[i].product_code+'" data-product_name="'+data[i].product_name+'" data-price="'+data[i].product_price+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-product_code="'+data[i].product_code+'">Delete</a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}

        //Save product
        $('#btn_save').on('click',function(){
            var product_code = $('#product_code').val();
            var product_name = $('#product_name').val();
            var price        = $('#price').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/save')?>",
                dataType : "JSON",
                data : {product_code:product_code , product_name:product_name, price:price},
                success: function(data){
                    $('[name="product_code"]').val("");
                    $('[name="product_name"]').val("");
                    $('[name="price"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_product();
                }
            });
            return false;
        });

        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var product_code = $(this).data('product_code');
            var product_name = $(this).data('product_name');
            var price        = $(this).data('price');

            $('#Modal_Edit').modal('show');
            $('[name="product_code_edit"]').val(product_code);
            $('[name="product_name_edit"]').val(product_name);
            $('[name="price_edit"]').val(price);
        });

        //update record to database
         $('#btn_update').on('click',function(){
            var product_code = $('#product_code_edit').val();
            var product_name = $('#product_name_edit').val();
            var price        = $('#price_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/update')?>",
                dataType : "JSON",
                data : {product_code:product_code , product_name:product_name, price:price},
                success: function(data){
                    $('[name="product_code_edit"]').val("");
                    $('[name="product_name_edit"]').val("");
                    $('[name="price_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_product();
                }
            });
            return false;
        });

        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var product_code = $(this).data('product_code');

            $('#Modal_Delete').modal('show');
            $('[name="product_code_delete"]').val(product_code);
        });

        //delete record to database
         $('#btn_delete').on('click',function(){
            var product_code = $('#product_code_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/delete')?>",
                dataType : "JSON",
                data : {product_code:product_code},
                success: function(data){
                    $('[name="product_code_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_product();
                }
            });
            return false;
        });

	});

</script>
</body>
</html>
