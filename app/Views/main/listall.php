<!DOCTYPE html>
<html lang="en">

<head>

    <title>Simple Codeigniter 4 CRUD Application</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
                    <div class"nav-link">main / list-all</div>
                </nav>
            </div>
        </div>
    </div>
    <?php
    if (!empty($session->getFlashdata('success'))) {
    ?>
        <div class="alert alert-success">
            <?php echo $session->getFlashdata('success'); ?>
        </div>
    <?php
    }
    ?>
    <?php
    if (!empty($session->getFlashdata('error'))) {
    ?>
        <div class="alert alert-danger">
            <?php echo $session->getFlashdata('error'); ?>
        </div>
    <?php
    }
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('main/create') ?>" class="btn btn-primary"> ADD</a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header bg-purple text-white">
                        <div class="card-header-title">List of registered user</div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Number</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>

                            <?php if (!empty($registered)) {
                                foreach ($registered as $register) {
                            ?>
                                    <tr>
                                        <td><?php echo $register['id']; ?></td>
                                        <td><?php echo $register['name']; ?></td>
                                        <td><?php echo $register['age']; ?></td>
                                        <td><?php echo $register['gender']; ?></td>
                                        <td><?php echo $register['number']; ?></td>
                                        <td><?php echo $register['email']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('main/edit/' . $register['id']); ?>" class="btn btn-primary btn-sm">Edit</a>

                                            <a href="#" onclick="deleteConfirm(<?php echo $register['id'] ?>);" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="6">Records not found</td>
                                </tr>
                            <?php } ?>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    function deleteConfirm(id) {
        if (confirm("Are you sure you want to delete?")) {
            window.location.href = '<?php echo base_url('main/delete/') ?>/' + id;
        }
    }
</script>
