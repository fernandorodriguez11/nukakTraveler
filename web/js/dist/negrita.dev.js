"use strict";

var negrita1 = false;
var negrita2 = false;
var enlace1 = false;
var enlace2 = false;
$(function () {
  $("#negritaC1").on('click', ponerNegrita);
  $("#negritaC2").on('click', ponerNegrita2);
  $("#enlace1").on('click', ponerEnlace);
  $("#enlace2").on('click', ponerEnlace2);
  $("#saltoLinea1").on('click', saltoLinea);
  $("#saltoLinea2").on('click', saltoLinea2);
});

function ponerNegrita() {
  if (negrita1 === false) {
    $("#contenido1").val($("#contenido1").val() + "[sNeg]");
    $("#negritaC1").css("background-color", "black");
    $("#negritaC1").css("color", "white");
    negrita1 = true;
  } else {
    $("#contenido1").val($("#contenido1").val() + "[/sNeg]");
    $("#negritaC1").css("background-color", "white");
    $("#negritaC1").css("color", "gray");
    negrita1 = false;
  }
}

function ponerNegrita2() {
  if (negrita2 === false) {
    $("#contenido2").val($("#contenido2").val() + "[sNeg]");
    $("#negritaC2").css("background-color", "black");
    $("#negritaC2").css("color", "white");
    negrita2 = true;
  } else {
    $("#contenido2").val($("#contenido2").val() + "[/sNeg]");
    $("#negritaC2").css("background-color", "white");
    $("#negritaC2").css("color", "gray");
    negrita2 = false;
  }
}

function ponerEnlace() {
  if (enlace1 === false) {
    $("#contenido1").val($("#contenido1").val() + "[ruta] [click]");
    $("#enlace1").css("background-color", "black");
    $("#enlace1").css("color", "white");
    enlace1 = true;
  } else {
    $("#contenido1").val($("#contenido1").val() + "[/click][/ruta]");
    $("#enlace1").css("background-color", "white");
    $("#enlace1").css("color", "gray");
    enlace1 = false;
  }
}

function ponerEnlace2() {
  if (enlace2 === false) {
    $("#contenido2").val($("#contenido2").val() + "[ruta] [click]");
    $("#enlace2").css("background-color", "black");
    $("#enlace2").css("color", "white");
    enlace2 = true;
  } else {
    $("#contenido2").val($("#contenido2").val() + "[/click][/ruta]");
    $("#enlace2").css("background-color", "white");
    $("#enlace2").css("color", "gray");
    enlace2 = false;
  }
}

function saltoLinea() {
  $("#contenido1").val($("#contenido1").val() + "[salto]");
}

function saltoLinea2() {
  $("#contenido2").val($("#contenido2").val() + "[salto]");
}