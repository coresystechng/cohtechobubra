<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Compiled and minified CSS -->
    <link
			href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css"
			rel="stylesheet"
		/>

    <!-- for favicon -->
    <link rel="icon" href="./img/cohtech-logo.png" type="image/x-icon" />

    <title>Registration - Student Portal - COHTECH Obubra</title>
    <style>
        .underline{
            text-decoration: underline;
        }

        label{
            text-transform: capitalize;
        }
    </style>

</head>
<body>
    
    <header></header>
    <main>
        <div class="container">
            <h2>Registration Form</h2>
            <p>Dear Sean Gbadamosi,</p>
            <p>Complete the form below to continue the registration process. All the input fields are required</p>
            <form action="./registration.php" method="post">
                <h5>Course Details</h5>
                <div class="row">
                    <div class="col l4">
                        <div class="input-field">
                            <label for="">transaction id</label>
                            <input type="text"  class="">
                        </div>
                    </div>
                    <div class="col l4">
                        <div class="input-field">
                            <label for="">course of study</label>
                            <input type="text" class="">
                        </div>
                    </div>
                    <div class="col l4">
                        <p>kindly visit our <a href="" class="purple-text underline">Course Page</a> to get more information about the courses we offer</p>
                    </div>
                </div>
                <h5>personal info</h5>
                <div class="row">
                    <div class="col l3">
                        <div class="input-field">
                            <label for="">first name</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="col l3">
                    <div class="input-field">
                            <label for="">surname</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="col l3">
                        <div class="input-field">
                            <label for="">other names </label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="col l3">
                        <label for="">gender</label>
                        <input type="text">
                    </div>
                </div>
            </div>
    </main>
    <footer></footer>
        <script>
            
  $(document).ready(function(){
    $('select').formSelect();
  });
        
        </script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
</body>
</html> 