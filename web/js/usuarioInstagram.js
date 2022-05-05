$(function(){

    var userfeed = new Instafeed({
        get: 'model',
        username: "leticiia.ro",
        target: "instafeed-container",
        resolution: 'standard_resolution',
        accessToken: ''
        ,limit: 3,
        template: '<a href="{{link}}" target="_blank"><img title="{{caption}}" src="{{image}}" /></a>'
    });
    
    userfeed.run();

    $("#footer").css("display","none");
});