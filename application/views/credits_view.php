<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CCSAS | Credit Grants</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
    <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800');

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

    label {
        font-weight: 600;
    }
    th {
        font-weight: 600;
    }
    td, input, input::placeholder {
        font-weight: 300;
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

        <form>
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

    <div class="section2 rounded">

        <div class="student-info col-md-10 offset-md-2 pt-3">
            <form class="form-inline">
            <label class="col-md-1 col-form-label">Student ID</label>
            <input type="text" name="student_id_result" id="student_id_result" class="form-control" placeholder="Student ID">
            <label class="col-md-1 col-form-label">Student Name</label>
            <input type="text" name="student_name_result" id="student_name_result" class="form-control col-md-2" placeholder="Student Name">
            <label class="col-md-1 col-form-label">Course Program</label>
            <input type="text" name="student_course_result" id="student_course_result" class="form-control col-md-2" placeholder="Course Program">
            </form>
        </div>

        <div class="course-map col-md-12 border" style="margin: 15px auto;"></div>

        <table class="table table-striped" id="studentdata">
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Subject Code</th>
                    <th>Subject Title</th>
                    <th>Status</th>
                    <th>Grade</th>
                    <th>Institution</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody id="show_data">
                <!-- table containing all the enrolled subjects shows here -->
                <tr> <!-- this is a placedholder table for now -->
                    <td> Year 1 </td>
                    <td> Spring </td>
                    <td> 3000100 </td>
                    <td> Web Engineering </td>
                    <td> Enrolled </td>
                    <td> HD </td>
                    <td> Western Sydney </td>
                    <td style="text-align:right;">
                    <a href="javascript:void(0);" class="btn btn-info btn-sm grant_credit" data-toggle="modal" data-target="#Modal_Edit">Grant Credit</a>
                    </td>
                </tr><!-- end of placeholder table -->
            </tbody>
        </table>
    </div>
</div>


<!-- MODAL Grant Credits -->
<form>
    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Grant Credit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Subject Code</label>
                    <div class="col-md-10">
                        <input type="text" name="subjectCode_edit" id="subjectCode_edit" class="form-control" placeholder="Subject Code" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Subject Title</label>
                    <div class="col-md-10">
                        <input type="text" name="subjectTitle_edit" id="subjectTitle_edit" class="form-control" placeholder="Subject Title" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Grade</label>
                    <div class="col-md-10">
                    <select class="form-control" id="grade_edit" name="grade_edit">
                        <option>Y (continuing)</option>
                        <option>W (withdrawn)</option>
                        <option>F (0-49%)</option>
                        <option>S (satisfactory)</option>
                        <option>P (50-60%)</option>
                        <option>C (65-74%)</option>
                        <option>D (75-84%)</option>
                        <option>HD (85-100%)</option>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Status</label>
                    <div class="col-md-10">
                    <select class="form-control" id="enrollment_status_edit" name="enrollment_status_edit">
                        <option>Currently Taking</option>
                        <option>Completed</option>
                        <option>Not Completed</option>
                        <option>Deferred</option>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Institution</label>
                    <div class="col-md-10">
                        <input type="text" name="institution_edit" id="institution_edit" class="form-control" placeholder="Institution">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" type="submit" id="btn_update" class="btn btn-primary">Grant Credit</button>
            </div>
        </div>
        </div>
    </div>
    </form>
<!--END MODAL EDIT-->


<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>


<script type="text/javascript">
    $(document).ready(function(){ 
         //initialize the data table using jquery.dataTables.js and dataTables.bootstrap4.js
         $('#mydata').dataTable(); 
    });

    // studentID search button event handler
	 $('#btn_search_student').on('click',function(){

            //get search field input value
            var studentID = $('#search_student_id').val();

            //ajax call to show student information from student table
            $.ajax({
                type : 'GET',
                url  : //type in student information controller
                dataType : 'json',
                data : {studentID:studentID}, //pass studentID input to controller
                success: function(data){

                    //display studentID in input field
                    $('[name="student_id_result"]').val(data.studentID);
                    
                    //display student's name in input field
                    var studentName = data.firstName + ' ' + data.lastName;
                    $('[name="student_name_result"]').val(studentName); 
                    
                    //display student's course
                    $('[name="student_course_result"]').val(data.course);
          
                }
            });

            //call function to show all enrolled subjects for specific studentID
            show_enrolled_subjects();

            //AJAX call to download a specific student's course program  when studentID is searched
            function show_enrolled_subjects() {

                $.ajax({
                type : 'GET',
                url  : "<?php echo site_url('credits/search')?>",
                dataType : 'json',
                data : {studentID:studentID}, //pass studentID input to controller
                success: function(data){

                    var html = '';
		            var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>' +
                                '<td>' + data[i].schoolYear + '</td>' +
                                '<td>' + data[i].semester + '</td>' +
		                        '<td>' + data[i].subjectCode + '</td>' +
		                        '<td>' + data[i].subjectTitle + '</td>' +                
                                '<td>' + data[i].enrollment_status + '</td>' +
                                '<td>' + data[i].grade + '</td>' +
                                '<td>' + data[i].institution + '</td>' + 
		                        '<td style="text-align:right;">' +
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-subjectCode="' + data[i].subjectCode + '" data-subjectTitle="' + data[i].subjectTitle + '" data-grade="' + data[i].grade + '" data-enrollment_status="' + data[i].enrollment_status + '" data-institution="' + data[i].institution + '">Grant Credits</a>' +
                                '</td>' +
                                '</tr>';
                    } //end for loop
                } //end success
            }); // end AJAX
            } //end show_enrolled_subjects 
        
            return false;
        });

    //Credit grant button click event handler
    //get data for Credit grant
    $('#show_data').on('click','.grant_credit',function(){
        var subjectCode             = $(this).data('subjectCode');
        var subjectTitle            = $(this).data('subjectTitle');
        var grade                   = $(this).data('grade');
        var enrollment_status       = $(this).data('enrollment_status');
        var institution             = $(this).data('institution');

        $('#Modal_Edit').modal('show');
        $('[name="subjectCode_edit"]').val(subjectCode);
        $('[name="subjectTitle_edit"]').val(subjectTitle);
        $('[name="grade_edit"]').val(grade);
        $('[name="enrollment_status_edit"]').val(enrollment_status);
        $('[name="institution"]').val(institution);
    });

    //update record to database
        $('#btn_update').on('click',function(){

        var subjectCode             = $('#subjectCode').val();
        var subjectTitle            = $('#subjectTitle').val();
        var grade                   = $('#grade').val();
        var enrollment_status       = $('#enrollment_status').val();
        var institution             = $('#institution').val();

        $.ajax({
            type : "POST",
            url  : //type in controller for granting credits
            dataType : "JSON",
            data : {subjectCode:subjectCode , subjectTitle:subjectTitle, grade:grade, enrollment_status:enrollment_status, institution: institution},
            success: function(data){
                $('[name="subjectCode_edit"]').val(subjectCode);
                $('[name="subjectTitle_edit"]').val(subjectTitle);
                $('[name="grade_edit"]').val(grade);
                $('[name="enrollment_status_edit"]').val(enrollment_status);
                $('[name="institution"]').val(institution);
                $('#Modal_Edit').modal('hide');
                show_enrolled_subjects();
            }
        });
        return false;
    });
    
</script>

</body>
</html>