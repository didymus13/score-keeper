Response.action(function() {
    var newClass = Response.band(1281) ? 'extra-large' :
                    Response.band(1025) ? 'large' :
                    Response.band(961) ? 'medium-large' :
                    Response.band(641) ? 'medium' :
                    Response.band(481) ? 'medium-small' :
                    Response.band(320) ? 'small' : 'tiny';
    $('body').removeClass('extra-large large medium-large medium medium-small small tiny')
        .addClass(newClass);
});

