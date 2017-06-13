  $( function() {
    $( ".calendar1" ).datepicker({
      format: 'yyyy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
  } );
  function getdate() {
        var tt = document.getElementById('datereq').value;

        var date = new Date(tt);
        var newdate = new Date(date);

        newdate.setDate(newdate.getDate() + 60);
        
        var dd = newdate.getDate();
        var mm = newdate.getMonth() + 1;
        var y = newdate.getFullYear();
        console.log(dd)
        console.log(mm)
        console.log(y)

        var FormattedDate = y + '-' + mm + '-' + dd;
        document.getElementById('datedead').value = FormattedDate;
  }