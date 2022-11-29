<!-- FACULTY UPDATE -->
<div class="modal fade" id="<?php echo 'studentUpdate'.$row["studentid"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Faculty Member</h5>
      </div>
      <div class="modal-body">
        <form action="" id="addUser" method="POST">
        <div class="col-md pb-3 pt-3">
          <label class="fw-bold">Faculty ID: </label>
          <input type="number" name="txtfacultyid" class="form-control" placeholder="User ID" value="<?php echo $row["studentid"]?>" onkeydown="return event.keyCode !== 69" required/>
        </div>
        <div class="row pb-3">
          <div class="col-md">
            <label class="fw-bold">First Name: </label>
            <input type="text" name="txtfname" class="form-control" placeholder="First Name" value="<?php echo $row["firstname"]?>" required/>
          </div>
          <div class="col-md">
            <label class="fw-bold">Last Name:</label>
            <input type="text" name="txtlname" class="form-control" placeholder="Last Name" value="<?php echo $row["lastname"]?>" required/>
          </div>
        </div>
        <div class="row pb-3">
          <div class="col-md">
              <label class="fw-bold">Email: </label>
              <input type="email" name="txtemail" class="form-control" placeholder="Email" value="<?php echo $row["email"]?>" required/>
          </div>
          <div class="col-md">
              <label class="fw-bold">Contact Number: </label>
              <input type="number" name="txtcontact" class="form-control" placeholder="Contact Number" value="<?php echo $row["contact"]?>" onkeydown="return event.keyCode !== 69" required/>
          </div>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="register" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>    
    </div>
  </div>
</div>