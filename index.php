<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Contact Form</title>
    <style>
        .rounded-form {
            border-radius: 15px; /* Rounded corners */
            padding: 20px; /* Add some padding inside the form */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle shadow for a better look */
        }
    </style>
</head>
<body class="bg-light min-vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <h2 class="text-center mb-4">Contact Us</h2>
        <form class="bg-white rounded-form" role="form" action="process.php" method="post">

            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-50" id="inputName" name="inputName" placeholder="Your Name" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control w-50" id="inputEmail" name="inputEmail" placeholder="Email" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="message" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <input type="submit" value="Send" name="submit" class="btn btn-primary"/>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

