<!-- SUBJECT UPDATE -->
<div class="modal fade" id="<?php echo 'subjectUpdate'.$row["subjectid"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Subject</h5>
      </div>
      <div class="modal-body">
        <form action="" id="addUser" method="POST">
        <input type="text" name="subjectid" value="<?php echo $row["subjectid"] ?>" hidden/>
              <div class="col-md pb-3">
                <label>Subject Description</label>
                <input type="text" name="txtsubject" id="addSubject" class="form-control" placeholder="Subject Description" value="<?php echo $row["subject"] ?>" required/>
              </div>
            <div class="row pb-3">
              <div class="col-md">
                <label for="inputYear">Select a Year</label>
                <select id="addYear" name="txtyear" class="form-select" required>
                  <option selected value="<?php echo $row["year"] ?>"><?php echo $row["year"] ?></option>
                  <option value="First Year">First Year</option>
                  <option value="Second Year">Second Year</option>
                  <option value="Third Year">Third Year</option>
                  <option value="Fourth Year">Fourth Year</option>
                </select>
              </div>
              <div class="col-md">
                <label for="inputSem">Select a Semester</label>
                <select id="addSem" name="txtsem" class="form-select" required>
                <option selected value="<?php echo $row["sem"] ?>"><?php echo $row["sem"] ?></option>
                  <option value="First Semester">First Semester</option>
                  <option value="Second Semester">Second Semester</option>
                  <option value="Third Semester">Third Semester</option>
                  <option value="Fourth Semester">Fourth Semester</option>
                </select>
              </div>
            </div>
            <div class="row pb-3">
              <div class="col-md">
                  <label>Subject Code</label>
                  <input type="text" name="txtcode" id="addCode" class="form-control" placeholder="Subject Code" value="<?php echo $row["code"] ?>" required/>
              </div>
              <div class="col-md">
                  <label>Units</label>
                  <input type="text" name="txtunit" id="addUnit" class="form-control" placeholder="Units" value="<?php echo $row["unit"] ?>" required/>
              </div>
            </div>
            <div class="col-md pb-3">
                <label>Course</label>
                <select id="addCourse" name="txtcourse" class="form-select" required>
                <option selected value="<?php echo $row["course"] ?>"><?php echo $row["course"] ?></option>
                  <option value="BSCS">BSCS</option>
                </select>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="updateSubject" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>    
    </div>
  </div>
</div>