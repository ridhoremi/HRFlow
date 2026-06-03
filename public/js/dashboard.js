var table;
$(document).ready(function () {
  if ($("#checkin_dashboard").length) {
    getAbsenHariIni();
  }
});

function getAbsenHariIni() {
  if ($.fn.DataTable.isDataTable("#checkin_dashboard")) {
    $("#checkin_dashboard").DataTable().destroy();
  }

  table = $("#checkin_dashboard").DataTable({
    serverSide: true,
    pageLength: 10,
    deferRender: true,
    searching: true,
    ajax: {
      url: BASE_URL + "/listAbsenHariIni",
      type: "GET",
    },
  });
}
