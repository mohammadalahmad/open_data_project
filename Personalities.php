<!-- Quellen: 
- https://getbootstrap.com/docs/5.0/forms/validation/
- https://www.w3schools.com/
- bootstrap
- https://getbootstrap.com/

-->

<!DOCTYPE html>
<html>
    <head>
        <title>Open Data Project</title>
    </head>
    <body  class="tab-content w-100 h-100  bg-dark">

    <?php include('link_bootstrap.php'); ?>
        <?php include 'navbar.php'; ?>

        <div class="tab-content w-100  p-3 bg-dark" style="margin-top: 100px;  "  >
            <?php
                include("connection.php"); 
                $sql = "SELECT id, vorname, nachname, beruf FROM bekannte_personen";
                $result = $conn->query($sql);
            ?>
            
            <div >
                <p class="mb-2" style="color:white">Here you can find information about famous people from Vorarlberg:</p>
                <table class="table table-bordered m-2;" >
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Job</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                
                            echo  "<tr class='table-light'>";
                            echo "<td scope='row'>"  .$row['id'].   "</td>";   
                            echo "<td >"  .$row['vorname'].   "</td>";   
                            echo "<td >"  .$row['nachname'].   "</td>";   
                            echo "<td >"  .$row['beruf'].   "</td>";   
                            echo "</tr>";
                                }
                                } else {
                                    echo "0 results";
                                };
                            ?>
                        
                    </tbody>
                </table>

            </div>
            <?php 

                if (isset($_POST['firstname']) and !empty($_POST['firstname'])) {
                    $firstname = $_POST['firstname'];
                    $valid_or_notValid = "is-valid";
                }else{
                    $firstname_nachricht = "Please fill first name!";
                    $valid_or_notValid = "is-invalid";
                }
                if (isset($_POST['firstname']) and !empty($_POST['lastname'])) {
                    $lastname = $_POST['lastname'];
                    $valid_or_notValid = "is-valid";
                }else{
                    $lastname_nachricht = "Please fill Lastname!";
                    $valid_or_notValid = "is-invalid";
                }
                if (isset($_POST['job']) and !empty($_POST['job'])) {
                    $job = $_POST['job'];
                    $valid_or_notValid = "is-valid";
                }else{
                    $Job_nachricht = "Please Please Job!";
                    $valid_or_notValid = "is-invalid";
                }
 

                if (!empty($firstname) and !empty($lastname) and !empty($job)) {
                    
                    $sql = "INSERT INTO bekannte_personen (vorname, nachname, beruf)
                    VALUES ('$firstname', '$lastname', '$job')";
        
                    if ($conn->query($sql) === TRUE) {
      

                    echo '<script type="text/JavaScript">  
                                 alert("Information has been sent");
                          </script>' ; 
                    } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;

                    }  
                    
                } 
                $conn->close();
            ?>
        <div style="background-color:#e3f2fd;" class = "p-4   rounded">
            <form  action="Personalities.php" method="post" class="row g-3 needs-validation" novalidate>
            <?php  #javascript  ?>
                <div class="input-group">
                     <div class="col-md-3">
                        <input id="firstNameInput"  onkeyup="myFunction(this.value, this.id)"    placeholder="Firstname" name="firstname" type="text" class="form-control  <?php echo $valid_or_notValid; ?>" aria-describedby="validationServer05Feedback" required>
                        <div id="firstNameOutput" class="valid-feedback">
                             Looks good!
                        </div>
                     
                    </div>
                    <div class="col-md-3">
                    <input id="lastNameInput"   placeholder="lastname" name="lastname" type="text" class="form-control <?php echo $valid_or_notValid; ?>" aria-describedby="validationServer05Feedback" required>
                        <div class="valid-feedback">
                             Looks good!
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input id="jobInput"   placeholder="job" name="job" type="text" class="form-control <?php echo $valid_or_notValid; ?>" aria-describedby="validationServer05Feedback" required>
                        <div class="valid-feedback">
                             Looks good!
                        </div>
                    </div>
                
                        <button   style="color:white; width:22%;  " class="btn btn btn-dark ml-3"   data-bs-toggle="modal" data-bs-target="#exampleModal">Senden</button>
     
                </div>
            </form>
        </div>
            <script>
        
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
                })
            })()


            </script>
        </div>
        
    
        <?php include('footer.php'); ?>
        
    </body>
</html>