"use strict";

$(function () {
  $("#imagenPrincipal").change(function () {
    $(".imagenPrincipal1").css("display", "block");
    readPrincipal(this);
  });
  $("#imagen00").on('click', function () {
    $("#secundaria0").click();
    $("#secundaria0").change(function () {
      readURL(this, 0);
    });
  });
  $("#imagen01").on('click', function () {
    $("#secundaria1").click();
    $("#secundaria1").change(function () {
      readURL(this, 1);
    });
  });
  $("#imagen02").on('click', function () {
    $("#secundaria2").click();
    $("#secundaria2").change(function () {
      readURL(this, 2);
    });
  });
  $("#imagen03").on('click', function () {
    $("#secundaria3").click();
    $("#secundaria3").change(function () {
      readURL(this, 3);
    });
  });
  $("#imagen04").on('click', function () {
    $("#secundaria4").click();
    $("#secundaria4").change(function () {
      readURL(this, 4);
    });
  });
});

function readPrincipal(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#theImagen').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function readURL(input, i) {
  var file = input.files[0];
  var reader = new FileReader();

  reader.onload = function (e) {
    $('#imagen' + i).attr('src', e.target.result);
  };

  reader.readAsDataURL(file);
}