var table;
$(document).ready(function () {
  if ($("#mesin_absensi").length) {
    loadMesin();
  }
});

function loadMesin() {
  if ($.fn.DataTable.isDataTable("#mesin_absensi")) {
    $("#mesin_absensi").DataTable().destroy();
  }

  table = $("#mesin_absensi").DataTable({
    responsive: true,
    serverSide: true,
    pageLength: 10,
    deferRender: true,
    searching: true,
    ajax: {
      url: BASE_URL + "/mesin-list",
      type: "GET",
    },
  });
}

function downloadAbsensi(idmesin) {
  let btn = $("#btn-download-" + idmesin);

  // disable tombol
  btn.prop("disabled", true);

  // ganti icon jadi loading
  btn.html('<span class="spinner-border spinner-border-sm"></span>');

  $.ajax({
    url: BASE_URL + "/downloadlogs/" + idmesin,
    type: "GET",
    dataType: "JSON",

    success: function (response) {
      if (response.status == true) {
        alert(response.total + " logs berhasil didownload");
      } else {
        alert(response.message);
      }
    },

    error: function (xhr) {
      console.log(xhr.responseText);

      alert("Terjadi kesalahan");
    },

    complete: function () {
      // aktifkan lagi tombol
      btn.prop("disabled", false);

      // balikin icon download
      btn.html('<i class="bi bi-download"></i>');
    },
  });
}
