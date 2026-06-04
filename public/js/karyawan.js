var table;
$(document).ready(function () {
  if ($("#karyawan_dataKaryawan").length) {
    getDataKaryawan();
  }
});

function getDataKaryawan() {
  if ($.fn.DataTable.isDataTable("#karyawan_dataKaryawan")) {
    $("#karyawan_dataKaryawan").DataTable().destroy();
  }

  table = $("#karyawan_dataKaryawan").DataTable({
    responsive: true,
    serverSide: true,
    pageLength: 10,
    deferRender: true,
    searching: true,
    ajax: {
      url: BASE_URL + "/listKaryawan",
      type: "GET",
    },
  });
}
function editDataKaryawan(id) {
  method = "update";

  $.ajax({
    url: BASE_URL + "/editkaryawan/" + id,
    type: "GET",
    dataType: "JSON",
    success: function (data) {
      //   $('[name="id"]').val(data.id);
      //   $('[name="machine_id"]').val(data.machine_id);
      //   $('[name="user_id"]').val(data.user_id);
      $('[name="BadgeNumber"]').val(data.BadgeNumber);
      $('[name="NAMA"]').val(data.NAMA);
      $('[name="Gender"]').val(data.Gender);
      $('[name="Jabatan"]').val(data.Jabatan);
      $('[name="NoKontak"]').val(data.NoKontak);
      $('[name="Agama"]').val(data.Agama);
      //   $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
      //   $('[name="jabatan"]').val(data.jabatan);
      //   $('[name="alamat"]').val(data.alamat);

      $("#id").prop("readonly", true);
      $("#modalEditKaryawan").modal("show");
      $("#modal-title").text("Edit Data");
      $(".form-control").removeClass("is-invalid");
      $(".help-block").text("");
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText);
      alert("error");
    },
  });
  //  $("#id").prop("readonly", true);

  //  $("#modal-title").text("Edit Data");
  //   $(".form-control").removeClass("is-invalid");
  //   $(".help-block").text("");
}
