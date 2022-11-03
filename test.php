<?php
if(isset($_POST['delete'])) {
 echo "asdasdas";
}


?>
<script src="assets/plugins/jquery.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/plugins/sweetalert.min.js"></script>
<form id="yourFormId" method="post">
    <input type="hidden" name="delete" value="">
</form>
<button type="button" onclick="confirmDelete()">Delete</button>

<script>
function confirmDelete() {
    Swal.fire({
        title: '',
        text: "Diesen Eintrag wirklich löschen?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ja',
        cancelButtonText: 'Nein',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("yourFormId").submit();
        }
    })
}
</script>
