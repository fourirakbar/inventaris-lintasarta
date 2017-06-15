// function getdate() {
//   var tt = document.getElementById('datepicker').value;

//   var date = new Date(tt);
//   var newdate = new Date(date);

//   newdate.setDate(newdate.getDate() + 60);

//   var dd = newdate.getDate();
//   var mm = newdate.getMonth() + 1;
//   var y = newdate.getFullYear();
//   console.log(dd)
//   console.log(mm)
//   console.log(y)

//   var FormattedDate = y + '-' + mm + '-' + dd;
//     document.getElementById('datedead').value = FormattedDate;
// }
// $(function () {
//       $('#daterange-btn').daterangepicker(
//           {
//             ranges: {
//               'Today': [moment(), moment()],
//               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
//               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
//               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
//               'This Month': [moment().startOf('month'), moment().endOf('month')],
//               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
//             },
//             startDate: moment().subtract(29, 'days'),
//             endDate: moment()
//           },
//           function (start, end) {
//             $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
//           }
//       );

//       //Date picker
//       $('#datepicker').datepicker({
//         format: 'yyyy-mm-dd',
//         changeMonth: true,
//         changeYear: true,
//         autoclose: true
//       });
// });
$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });