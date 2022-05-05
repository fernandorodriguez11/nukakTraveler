"use strict";

$(function () {
  $(".form_comentario_respuesta").css("display", "none");
  $("#cerrar").on('click', closeForm);
});

function showForm(event) {
  $(".form_comentario_respuesta").css("display", "none");
  $("#probandoRespuesta" + event).css("display", "block");
}

function closeForm(event) {
  $("#probandoRespuesta" + event).css("display", "none");
}