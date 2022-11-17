$(document).ready(function(){

  $('body').hide().fadeIn(200);
    $("a").click(function(e) {
        e.preventDefault();
        $link = $(this).attr("href");
        $("body").fadeOut(200,function(){
          window.location =  $link;
        });
    });

  $('#import_excel_billing').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url:"import.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').val('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_billing')[0].reset();
        $('#import').attr('disabled', false);
        $('#import').val('Import');
      }
    })
  });
  $('#import_excel_accounts').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url:"import2.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').val('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_accounts')[0].reset();
        $('#import').attr('disabled', false);
        $('#import').val('Import');
      }
    })
  });

  $('.del-btn').on('click',function(e){
        e.preventDefault();
        const href = $(this).attr('href')
        Swal.fire({
            title: 'Are you sure to delete this user?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
     })

     const flashdata = $('.flash-data').data('flashdata')
         if(flashdata){
            Swal.fire({
              icon: 'success',
              title: 'User Deleted Succesfully!',
              showConfirmButton: false,
              timer: 1500
             })
         }

});
