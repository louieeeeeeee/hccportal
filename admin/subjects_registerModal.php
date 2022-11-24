<?php echo '
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Subject</h5>
      </div>
      <div class="modal-body">
        <form action="" method="POST" >
              <div class="form-group">
                <label>Subject Description</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject Description" value="" required/>
              </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputYear">Select a Year</label>
                <select id="Year" name="year" class="form-control" required>
                  <option value="">-- Select a Year -- </option>
                  <option value="First Year">First Year</option>
                  <option value="Second Year">Second Year</option>
                  <option value="Third Year">Third Year</option>
                  <option value="Fourth Year">Fourth Year</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputSem">Select a Semester</label>
                <select id="inputSem" name="sem" class="form-control" required>
                  <option value="">-- Select a Semester -- </option>
                  <option value="First Semester">First Semester</option>
                  <option value="Second Semester">Second Semester</option>
                  <option value="Third Semester">Third Semester</option>
                  <option value="Fourth Semester">Fourth Semester</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <label>Subject Code</label>
                  <input type="text" name="code" id="subject" class="form-control" placeholder="Subject Code" value="" required/>
              </div>
              <div class="form-group col-md-6">
                  <label>Units</label>
                  <input type="text" name="unit" id="units" class="form-control" placeholder="Units" value="" required/>
              </div>
            </div>
            <div class="form-group">
                <label>Course</label>
                <select id="course" name="course" class="form-control" required>
                  <option value="">-- Select a Course -- </option>
                  <option value="BSCS">BSCS Bachelor of Science in Computer Science</option>
                </select>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="register" class="btn btn-primary">Add Subject</button>
            </div>
        </form>
      </div>    
    </div>
  </div>
</div>';?>
