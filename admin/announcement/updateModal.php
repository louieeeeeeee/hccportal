<!-- STUDENT UPDATE -->
<div class="modal fade" id="<?php echo 'announcementUpdate'.$row["eventid"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Announcement</h5>
      </div>
      <div class="modal-body">
        <form action="" id="addUser" method="POST">
        <div class="col">
              <label class="fs-5 fw-bold">Title:</label>
              <div class="input-group input-group-lg">
              <input type="text" name="updatetitle" class="form-control fw-bold" placeholder="Title" value="<?php echo $row["title"] ?>" required/>
            </div>            
            </div>
            <div class="col-5">
              <label class="fs-5 fw-bold">Duration:</label>
              <input type="date" name="updateduration" class="form-control" placeholder="Expiration Date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $row["duration"] ?>" required/>
            </div>     
          <div class="col">
            <div class="form-floating">
              <textarea class="form-control" placeholder="Content" name="updatecontent" id="updatecontent" style="height: 220px" required><?php echo $row["caption"] ?></textarea>
              <label for="updatecontent" class="fw-bold">Content</label>
            </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="studentUpdate" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>    
    </div>
  </div>
</div>