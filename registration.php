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

    <!-- links for material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- for favicon -->
    <link rel="icon" href="./img/cohtech-logo.png" type="image/x-icon" />

    <title>Registration - Student Portal - COHTECH Obubra</title>
    <style>
        .underline{
            text-decoration: underline;
        }

        label, .capitalize{
            text-transform: capitalize !important;
        }

        .theme-color-text {
			color: #702963 !important;
		}

		.theme-color-bg {
			background-color: #702963 !important;
		}

        h5{
            margin-top: 40px;
        }

        span{
            text-transform: none;
        }

        footer {
            height: 10vh !important;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 4vh ;
            margin-bottom: -2vh !important;
        }
    </style>

</head>
<body>
    
    <header></header>
    <main>
        <div class="container">
            <h2>Registration Form</h2>
            <p>Dear David Okonkwo,</p>
            <p>Complete the form below to continue the registration process. All the input fields are required</p>
            <form action="./registration.php" method="post">
                <h5>Course Details</h5>
                <div class="row">
                    <div class="col l4">
                        <div class="input-field">
                            <label for="transactionId">transaction id</label>
                            <input id="transactionId" type="text"  class="">
                        </div>
                    </div>
                    <div class="col l4">
                        <div class="input-field">
                            <select class="">
                                <option value="" disabled selected>Course Of Study</option>
                                <option value="">course 1</option>
                                <option value="">course 2</option>
                                <option value="">course 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col l4">
                        <p>kindly visit our <a href="" class="purple-text underline">Course Page</a> to get more information about the courses we offer</p>
                    </div>
                </div>
                <h5>Personal Info</h5>
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
                        <div class="input-field">
                            <select class="">
                                <option value="" disabled selected>Gender</option>
                                <option value="" >Male</option>
                                <option value="" >Female</option>
                                <option value="" >Prefer not to say</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l2">
                        <div class="input-field">
                            <label for="">date of birth</label>
                            <input type="text" class="datepicker">
                        </div>
                    </div>
                    <div class="col l2">
                        <div class="input-field">
                            <select class="">
                                <option value="" disabled selected>Marital Status</option>
                                <option value="">Single</option>
                                <option value="">Married</option>
                                <option value="">Divorced</option>
                                <option value="">Widowed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col l2">
                        <div class="input-field">
                            <select id="stateOfOrigin">
                                <option value="" disabled selected> State of Origin</option>
                                <option value="Abia">Abia</option>
                                <option value="Adamawa">Adamawa</option>
                                <option value="Akwa Ibom">Akwa Ibom</option>
                                <option value="Anambra">Anambra</option>
                                <option value="Bauchi">Bauchi</option>
                                <option value="Bayelsa">Bayelsa</option>
                                <option value="Benue">Benue</option>
                                <option value="Borno">Borno</option>
                                <option value="Cross River">Cross River</option>
                                <option value="Delta">Delta</option>
                                <option value="Ebonyi">Ebonyi</option>
                                <option value="Edo">Edo</option>
                                <option value="Ekiti">Ekiti</option>
                                <option value="Enugu">Enugu</option>
                                <option value="FCT - Abuja">FCT - Abuja</option>
                                <option value="Gombe">Gombe</option>
                                <option value="Imo">Imo</option>
                                <option value="Jigawa">Jigawa</option>
                                <option value="Kaduna">Kaduna</option>
                                <option value="Kano">Kano</option>
                                <option value="Katsina">Katsina</option>
                                <option value="Kebbi">Kebbi</option>
                                <option value="Kogi">Kogi</option>
                                <option value="Kwara">Kwara</option>
                                <option value="Lagos">Lagos</option>
                                <option value="Nasarawa">Nasarawa</option>
                                <option value="Niger">Niger</option>
                                <option value="Ogun">Ogun</option>
                                <option value="Ondo">Ondo</option>
                                <option value="Osun">Osun</option>
                                <option value="Oyo">Oyo</option>
                                <option value="Plateau">Plateau</option>
                                <option value="Rivers">Rivers</option>
                                <option value="Sokoto">Sokoto</option>
                                <option value="Taraba">Taraba</option>
                                <option value="Yobe">Yobe</option>
                                <option value="Zamfara">Zamfara</option>
                            </select>
                        </div>
                    </div>
                    <div class="col l3">
                        <div class="input-field">
                            <label for="">LGA of origin</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="col l3">
                        <div class="input-field">
                            <label for="">nationality</label>
                            <input type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l4">
                        <div class="input-field">
                            <label for="">phone number</label>
                            <input type="tel">
                        </div>
                    </div>
                    <div class="col l5">
                        <div class="input-field">
                            <label for="">email address</label>
                            <input type="email">
                        </div>
                    </div>
                    <div class="col l3">
                        <div class="input-field">
                            <select class="">
                                <option value="" disabled selected>Religion</option>
                                <option value="" >Christianity</option>
                                <option value="" >Islam</option>
                                <option value="" >Traditional African Religion</option>
                                <option value="" >Other</option>
                                <option value="" >Prefer not to say</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l12">
                    <div class="input-field">
                        <input id="contactAddress" type="text" name="contact_address">
                        <label for="contactAddress">Contact Address</label>
                    </div>
                    </div>
                </div>
                <h5>Next of Kin</h5>
                <div class="row">
                    <div class="col l6">
                        <div class="input-field">
                            <label for="fullName">full name</label>
                            <input id="fullName" type="text">
                        </div>
                    </div>
                    <div class="col l3">
                        <div class="input-field">
                            <label for="relationship">relationship</label>
                            <input id="relationship" type="text">
                        </div>
                    </div>
                    <div class="col l3">
                        <div class="input-field">
                            <label for="phoneNumber">phone number</label>
                            <input id="phoneNumber" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l10">
                        <div class="input-field">
                            <label for="address">address</label>
                            <input id="address" type="text">
                        </div>
                    </div>
                    <div class="col l2">
                        <div class="input-field">
                            <label for="occupation">occupation</label>
                            <input id="occupation" type="text">
                        </div>
                    </div>
                </div>
                <h5>Attestation</h5>
                <div class="row">
                    <div class="col l12 s12">
                        <div class="input-field">
                            <label>
                                <input type="checkbox" />
                                <span>I hereby attest to the authenticity of the above information supplied</span>
                            </label>
                        </div>
                    </div><br>
                    <div class="col l12 s12">
                        <div class="input-field">
                            <label>
                                <input type="checkbox" />
                                <span>I agree to comply with the college's regulations upon approval of my registration</span>
                            </label>
                        </div>
                    </div>
                </div>
            </form><br><br>
            <div class="center-align">
                <a href="" class="btn btn-large btn-flat white-text capitalize theme-color-bg">submit application</a>
            </div>
        </div>
    </main>
    <footer class="center-align black" >
        <span class="white-text">
            © 2025 COHTECH Obubra.
            <a href="./index.html" target="_blank" class="white-text underline">Back To Home<i class="material-icons tiny"
						>call_made</i
					></a>
        </span>
    </footer>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
        $('.datepicker').datepicker();
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
</body>
</html> 