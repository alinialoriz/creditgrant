<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CCSAS | Credit Grants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Lalezar|Open+Sans');

    .page-title {
        font-family: 'Open Sans';
        font-size: 1.5rem;
        letter-spacing: .1em;
    }

    body {
        background-color: rgb(40,40,40);
        font-family: 'Open Sans';
    }
    .section2, nav {
        background-color: rgb(255,255,255, 0.85);
    } 
    
    .section1{
        padding: 20px 20px;
    }

    .error-message {
        color:whitesmoke;
    }

    </style>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link page-title" href="#">Credit Grant Advisement <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<!-- Student's personal information -->
<div class="container content-area">

    <!-- Search input field for student ID number -->
    <div class="section1 col-md-6 offset-md-4">

        <form action="credits/search" method="post">
            <div class="form-inline">
                    <input type="text" name="studentID" id="search_student_id" class="form-control mr-sm-2 col-md-6" placeholder="Search Student ID">
                    <button class="btn btn-danger my-2 my-sm-0" id="btn_search_student" type="submit">Search</button>
            </div>
        </form>

    </div>

    <!-- Displays search input field validation errors -->
    <div class="error-message col-md-6 offset-md-3">

        <!-- Displays studentID search input field validation errors -->
        <?php if ($this->session->flashdata('errors')): ?>
        <?php echo $this->session->flashdata('errors'); ?>
        <?php endif; ?>

    </div>

    <!-- Displays search result notifactions -->
    <div class="col-md-6 offset-md-3">

        <!-- Displays successful studentID search -->
        <?php if($this->session->flashdata('search_success')): ?>
        <?php echo "<p class=' rounded bg-success text-center'>" . $this->session->flashdata('search_success') . "<p>"; ?>
        <?php endif;?>

        <!-- Displays successful studentID search -->
        <?php if($this->session->flashdata('search_failed')): ?>
        <?php echo "<p class=' rounded bg-danger text-center'>" .$this->session->flashdata('search_failed') . "<p>"; ?> 
        <?php endif;?>

    </div>
   
    <div class="section2">
        <div class=" col-md-12 border" style="margin: 15px auto;"></div>

        <table class="table table-striped" id="mydata">
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Status</th>
                    <th>Grade</th>
                    <th>Institution</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody id="show_data">
            <tr>
                <td> Year 1 </td>
                <td> Spring </td>
		        <td> 3000100 </td>
		        <td> Web Engineering </td>
                <td> Enrolled </td>
                <td> HD </td>
                <td> Western Sydney </td>
		        <td style="text-align:right;">
                <a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-product_code="'+data[i].product_code+'" data-product_name="'+data[i].product_name+'" data-price="'+data[i].product_price+'">Edit</a>
                <a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-product_code="'+data[i].product_code+'">Delete</a>
            </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="sample">

    </div>
</div>


<!-- Test PHP -->
<!-- <?php 


// function getStudent() {

// $connection = mysqli_connect('localhost', 'root', 'Imllu.143', 'webeng_project');
// $query = "SELECT * FROM Student";
//         $result = mysqli_query($connection, $query);

//         if (!$result) {
//             die ('Query FAILED!' . mysqli_error());
//         } 
    
//         while($result){
//             return $result;
//         }
// }

// $student = getStudent();
// foreach ($student as $individualStudent) {
//     echo $individualStudent['studentID'] . "<br>";
// }

?> -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- <script type="text/javascript">

     //call function to show student information

	 $('#btn_search_student').on('click',function(){

            var studentID = $('#search_student_id').val();

            $.ajax({
                type : 'POST',
                url  : '<?php echo site_url('credits/search')?>',
                dataType : 'json',
                data : {studentID:studentID},
                success: function(data){
                    //display studentID in input field
                    $('[name="student_id_result"]').val(data.studentID); //edit key name from student model
                    
                    //display student's name in input field
                    var studentName = data.firstName + ' ' + data.lastName; //edit key name from student model
                    $('[name="student_name_result"]').val(studentName); 
                    
                    //display student's course
                    $('[name="student_course_result"]').val(data.course); //edit key name from student model


          
                }
            });
        return false;
        });

    //loop function to show all subject code

</script> -->

</body>
</html>