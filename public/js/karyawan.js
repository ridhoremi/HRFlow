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
      $('[name="ID"]').val(data.ID);
      $('[name="NIK"]').val(data.Nik);
      $('[name="Nama"]').val(data.Nama);
      $('[name="TglLahir"]').val(data.TglLahir);
      $('[name="Gender"]').val(data.Gender);
      $('[name="Jabatan"]').val(data.Jabatan);
      $('[name="NoKontak"]').val(data.NoKontak);
      $('[name="Agama"]').val(data.Agama);
      $('[name="Status"]').val(data.Status);

      $("#ID").prop("readonly", true);
      $("#modalSimpanKaryawan").modal("show");
      $("#modal-title").text("Edit Data");
      $(".form-control").removeClass("is-invalid");
      $(".help-block").text("");
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText);
      alert("error");
    },
  });
}

function simpanKaryawan() {
  let url;

  if (method == "insert") {
    url = BASE_URL + "/simpankaryawan";
  } else {
    url = BASE_URL + "/updatekaryawan";
  }
  $.ajax({
    url: url,
    type: "POST",
    data: new FormData($("#formSimpanKaryawan")[0]),
    dataType: "JSON",
    processData: false,
    contentType: false,
    success: function (data) {
      if (data.status) {
        $("#formSimpanKaryawan")[0].reset();
        $("#modalSimpanKaryawan").modal("hide");
        table.ajax.reload(null, false);
      } else {
        for (var i = 0; i < data.inputerror.length; i++) {
          $('[name="' + data.inputerror[i] + '"]').addClass("is-invalid");
          $('[name="' + data.inputerror[i] + '"]')
            .next(".help-block")
            .text(data.error_string[i]);
        }
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText);
      alert("error");
    },
  });
}
