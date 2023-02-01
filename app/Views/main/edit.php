<!DOCTYPE html>
<html lang="en">

<head>

    <title>Simple Codeigniter 4 CRUD Application</title>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">

<body>
    <div class="container-fluid be-purple shadow-sm">
        <div class="container pb-2 pt-2">
            <div class="text-white hé">Simple Codeigniter 4 CRUD Application</div>
        </div>
    </div>

    <div class="be-white shadow-sm">
        <div class="container">
            <div class="row">
                <nav class="nav nav-underline">
                    <div class"nav-link">main / EDIT</div>
                </nav>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-right">
            <a href="<?php echo base_url('main') ?>" class="btn btn-primary">BACK</a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-purple text-white">
                        <div class="card-header-title">EDIT REGISTRATION</div>
                    </div>


                    <div class="card-body">

                        <form name="createForm" id="createForm" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" placeholder="Name" name="name" id="name" class="form-control <?php echo (isset($validation) && $validation->hasError('name')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('name', $register["name"]); ?>">
                                <?php
                                if (isset($validation) && $validation->hasError('name')) {
                                    echo '<p class="invalid-feedback">' . $validation->getError('name') . '</p>';
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" placeholder="Age" name="age" id="age" class="form-control <?php echo (isset($validation) && $validation->hasError('age')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('age',$register["age"]); ?>">

                                <?php
                                if (isset($validation) && $validation->hasError('age')) {
                                    echo '<p class="invalid-feedback">' . $validation->getError('age') . '</p>';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" placeholder="Phone Number" name="phonenumber" id="phonenumber" class="form-control <?php echo (isset($validation) && $validation->hasError('phonenumber')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('phonenumber', $register["number"]); ?>">

                                <?php
                                if (isset($validation) && $validation->hasError('phonenumber')) {
                                    echo '<p class="invalid-feedback">' . $validation->getError('phonenumber') . '</p>';
                                }
                                ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Email Id</label>
                                <input type="text" placeholder="Email Id" name="email" id="email" class="form-control <?php echo (isset($validation) && $validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('email' , $register["email"]); ?>">
                                <?php
                                if (isset($validation) && $validation->hasError('email')) {
                                    echo '<p class="invalid-feedback">' . $validation->getError('email') . '</p>';
                                }
                                ?>
                            </div>

                            <?php $gender = ($register['gender']); ?>
                            <label>Gender:</label>
                                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
                                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
                                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other

                                <?php echo (isset($validation) && $validation->hasError('gender')) ? '------> Kindly fill the Gender details <------' : ''; ?>
                                <?php
                                if (isset($validation) && $validation->hasError('gender')) {
                                    echo '<p class="invalid-feedback">' . $validation->getError('gender') . '</p>';
                                }
                                ?>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>