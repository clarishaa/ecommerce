<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Register User</h2>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-warning">
                        <?php echo $validation->listErrors(); ?>
                    </div>
                <?php endif; ?>

                <form action="<?php echo base_url(); ?>signup" method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="username" placeholder="Name" value="<?= set_value('name') ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control">
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-dark">Signup</button>
                    </div>
                    <div class="d-grid mb-3">
                        <a href="/signin" class="btn btn-primary">Login</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>