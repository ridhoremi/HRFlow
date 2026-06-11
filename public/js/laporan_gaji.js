$(document).ready(function () {
  loadLaporanGaji();
});

function loadLaporanGaji() {
  $("#tabel_laporan_gaji").DataTable({
    processing: true,
    destroy: true,
    ajax: {
      url: BASE_URL + "/laporan_gaji/list",
      type: "POST",
      data: function (d) {
        d.dari = $("#dari_tanggal").val();
        d.sampai = $("#sampai_tanggal").val();
      },
    },
  });
}
