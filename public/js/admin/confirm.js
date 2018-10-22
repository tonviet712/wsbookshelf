 // Jquery For Delete Account
 $(".deleteAccount").click(function(){
  if (confirm("Are you sure?")) {
    var whichtr = $(this).closest("tr");
    var id = $(this).data("id");
    var token = $(this).data("token");

    $.ajax(
    {
      url: "/admin/accounts/"+id,
      type: 'DELETE',
      data: {
        id: id,
        "_method": 'DELETE',
        "_token": token,
      },
      success: function ()
      {
        whichtr.remove();
      },
    });
  }
});

// Jquery For Delete Book
$(".deleteBook").click(function(){
  if (confirm("Are you sure?")) {
    var whichtr = $(this).closest("tr");
    var id = $(this).data("id");
    var token = $(this).data("token");
    $.ajax(
    {
      url: "/admin/books/"+id,
      type: 'DELETE',
      data: {
        id: id,
        "_method": 'DELETE',
        "_token": token,
      },
      success: function ()
      {
        whichtr.remove();
      },
    });
  } else {
    console.log('Nope');
  }
});

// Change status
$("#status").change(function(){
  changstatus();
});

changstatus();
function changstatus () {
  if($('#status').val() == 0){
    $(".history").show();
  } else {
    $(".history").hide();
  }
}
