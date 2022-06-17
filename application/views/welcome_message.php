<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add/Edit  Product  (jquery, bootrap) - Cartgeet </title>
     

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

    <!-- Modal -->
    <div class="modal fade" id="productaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                 <form id="uploadForm" enctype="multipart/form-data">
               <!-- action="index.php/Welcome/insertcode"  -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Product Name </label>
                            <input type="text" name="pname" class="form-control" placeholder="Enter Product Name">
                        </div>

                        <div class="form-group">
                            <label> Product Price  </label>
                            <input type="number" name="product_price" class="form-control" placeholder="Enter Product Price ">
                        </div>

                        <div class="form-group">
                            <label> Description </label>
                            <input type="text" name="description" class="form-control" placeholder="Enter Description">
                        </div>

                        <div class="form-group">
                            <label>Choose Multiple Images</label>
                            <input type="file" name="images[]" id="fileInput" multiple >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary"    >Save Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Product Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST" id="edit_product" enctype="multipart/form-data">
                  <!-- index.php/Welcome/updatecode -->
                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> Product  Name </label>
                            <input type="text" name="pname" id="pname" class="form-control"
                                placeholder="Enter Product Name">
                        </div>

                        <div class="form-group">
                            <label> Product Price </label>
                            <input type="text" name="product_price" id="product_price" class="form-control"
                                placeholder="Enter Product Price ">
                        </div>

                        <div class="form-group">
                            <label> Description </label>
                            <input type="text" name="description" id="description" class="form-control"
                                placeholder="Enter Description">
                        </div>

                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

      
     

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Product Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="index.php/Welcome/deletecode" id="delete_product" method="POST">
                  <!-- index.php/Welcome/deletecode -->
                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- VIEW POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> View Product Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="text" name="view_id" id="view_id">

                        <!-- <p id="pname"> </p> -->
                        <h4 id="pname"> <?php echo ''; ?> </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> CLOSE </button>
                        <!-- <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button> -->
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2>Add/Edit  Product  (jquery, bootrap) - Cartgeet </h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productaddmodal">
                        Add Product
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                  <table id="datatableid" class="table" >
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price </th>
                                <th scope="col"> Description </th>
                                <th scope="col"> Product Image </th>
                                <th scope="col"> Action </th> 
                            </tr>
                        </thead>
                        <tbody class="products_data_tb" id="id_tbody">
                                
                            </tbody>
                  </table>
                    
                </div>
            </div>
 

        </div>
    </div>



   

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


   <script >
   
      $(document).ready(function(){
         get_product_list();
      });

      // load product list
      function get_product_list(){
             $.ajax({
             url:"index.php/Welcome/fetch_product_list",
             method:"POST",
             success:function(response)
             {
               // $('#datatable').html(response);
               $.each(response, function (key, value) { 
                  // console.log(value['product_name']);
                  $('.products_data_tb').append('<tr  id = "row1">'+
                                   '<td class="stud_id">'+value['id']+'</td>\
                                   <td>'+value['product_name']+'</td>\
                                   <td>'+value['product_price']+'</td>\
                                   <td>'+value['product_desccription']+'</td>\
                                   <td> <a href="'+value['product_image']+'"> <img style="height:20px; width:20px;" src="'+value['product_image']+'" </a>\
                                   <a href="'+value['product_image2']+'"> <img style="height:20px; width:20px;" src="'+value['product_image2']+'" </a>\
                                   <a href="'+value['product_image3']+'"> <img style="height:20px; width:20px;" src="'+value['product_image3']+'" </a>\
                                   <a href="'+value['product_image4']+'"> <img style="height:20px; width:20px;" src="'+value['product_image4']+'" </a>\
                                   </td>\
                                   <td>\
                                       <button type="button"  class="btn btn-success editbtn"> EDIT </button>\
                                   <button type="button" class="btn btn-danger deletebtn"> DELETE </button>\
                                   </td>\
                               </tr>');
               });
            }
            });
      } 

      //onclick edit button 
      $(document).on('click','.editbtn',function(e) {
            $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#pname').val(data[1]);
                $('#product_price').val(data[2]);
                $('#description').val(data[3]);
                $('#product_image_1').val(data[4]);
      });

      //onclick delete button 
      $(document).on('click','.deletebtn',function(e) {
            $('#deletemodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
            return $(this).text();
            }).get();
            console.log(data);
            $('#delete_id').val(data[0]);
      });

   </script>


   <script>
      
      // add product function
      $("form#add_product_form" ).on( "submit", function(e) {
       e.preventDefault();
          var dataString = $(this).serialize();
          $.ajax({
            type: "POST",
            url: "index.php/Welcome/insertcode",
            data: dataString,             
            beforeSend: function(){
                $('#uploadStatus').html('<img src="assets/gif/upload.gif"/>');
            },
            success: function (data) {
            console.log(data)
            // $('#productaddmodal').modal('hide');
            $("#id_tbody").empty();
            get_product_list();
            }
          });       
          e.preventDefault();
      });

      // edit product
      $("form#edit_product" ).on( "submit", function(e){
       e.preventDefault();
          var dataString = $(this).serialize();
          $.ajax({
            type: "POST",
            url: "index.php/Welcome/updatecode",
            data: dataString,
            success: function (data) {
            console.log(data)
            $('#editmodal').modal('hide');
               $("#id_tbody").empty();
               get_product_list();
            }
          });
       
          e.preventDefault();
      });

      // delete product function
      $("form#delete_product" ).on( "submit", function(e) {
         e.preventDefault();
         var dataString = $(this).serialize();
         $.ajax({
            type: "POST",
            url: "index.php/Welcome/deletecode",
            data: dataString,
            success: function (data) {
            console.log(data)
            alert(data);
            $('#deletemodal').modal('hide');
               $("#id_tbody").empty();
               get_product_list();
            }
         });
         e.preventDefault();
      });

</script>


<script >
   
    


    // File upload via Ajax
    $("#uploadForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'index.php/Welcome/insertcode',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('#uploadStatus').html('<img src="images/uploading.gif"/>');
            },
            error:function(){
                $('#uploadStatus').html('<span style="color:#EA4335;">Images upload failed, please try again.<span>');
            },
            success: function(data){
                // $('#uploadForm')[0].reset();
                console.log(data)
               // $('#productaddmodal').modal('hide');
               $("#id_tbody").empty();
               get_product_list();
            }
        });
    });
    
    // File type validation
    $("#fileInput").change(function(){
        var fileLength = this.files.length;
        var match= ["image/jpeg","image/png","image/jpg","image/gif"];
        var i;
        for(i = 0; i < fileLength; i++){ 
            var file = this.files[i];
            var imagefile = file.type;
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3]))){
                alert('Please select a valid image file (JPEG/JPG/PNG/GIF).');
                $("#fileInput").val('');
                return false;
            }
        }
    });

</script>




</body>
</html>


