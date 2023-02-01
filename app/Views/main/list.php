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
</body>

</html>


<script>
  function deleteConfirm(id) {
    if (confirm("Are you sure you want to delete?")) {
      window.location.href = '<?php echo base_url('main/delete/') ?>/' + id;
    }
  }
</script>



















<!-- EDIT ------ Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>

      <div class="container mt-4">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-purple text-white">
                <div class="card-header-title">EDIT REGISTRATION</div>
              </div>
              <!--  eeeeeeeedddddddddddddiiiiiiiiiiiiittttttttt fffffooooorrrrrrrmmmmmmmmm -->

              <div class="card-body">
                <form name="createForm" id="createForm" method="post" action="<?php echo base_url('main/edit/'.$book['id'])?>>
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
                    <input type="text" placeholder="Age" name="age" id="age" class="form-control <?php echo (isset($validation) && $validation->hasError('age')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('age', $register["age"]); ?>">

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
                    <input type="text" placeholder="Email Id" name="email" id="email" class="form-control <?php echo (isset($validation) && $validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('email', $register["email"]); ?>">
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

  </div>
</div>
</div>
<!--  mmmmmoooooooooooddddddddeeeeeeeeelllllll form -->


<?php if (!empty($registered)) {
                                foreach ($registered as $register) {
                                    if($register['id']== 8) {
                            ?>
                                                <?php } } } ?>
