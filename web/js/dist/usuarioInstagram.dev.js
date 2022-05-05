"use strict";

$(function () {
  var userfeed = new Instafeed({
    get: 'model',
    username: "leticiia.ro",
    target: "instafeed-container",
    resolution: 'standard_resolution',
    accessToken: 'IGQVJVck1QTmsxNWhjS3pEU09Va3R2NW85WFNaMW9GUUJQNERPakRfcGhFQUppalZAGdHc0MnpUSWo1UENyUlZAsZAjF5bTcxYjcyQW9CZAEdqcVhTeVFwdE9sS09MMGRXRkVhSXNiaVRMdVhmcGVhcUYyTQZDZD',
    limit: 3,
    template: '<a href="{{link}}" target="_blank"><img title="{{caption}}" src="{{image}}" /></a>'
  });
  userfeed.run();
  $("#footer").css("display", "none");
});