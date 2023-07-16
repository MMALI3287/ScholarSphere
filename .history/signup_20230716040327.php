<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/loginstyle.css" />
    <title>Login</title>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center">
        <div class="content">
            <div class="row">
                <div class="col-md-7">
                    <img class="loginimage" src="https://www.owatroldirect.co.uk/wp-content/uploads/2019/08/decorators-tools.jpg" alt="" height="100%">
                </div>
                <div class="col-md-5 login-form">
                    <form class="row">
                        <div class="col-md-12 mb-4">
                            <label for="inputEmail4" class="form-label">Name</label>
                            <input type="name" class="form-control" id="inputName4">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <select class="form-select mb-4" aria-label="Default select example">
                            <option selected>Select account type</option>
                            <option value="1">Admission Candidate</option>
                            <option value="2">Alumni / Current Student</option>
                            <option value="3">Admin</option>
                        </select>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/index.js"></script>
</body>

</html>