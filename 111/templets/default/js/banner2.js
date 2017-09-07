$(document).ready(function(e) {

    var unslider03 = $('#b03').unslider({

		dots: true

	}),

	data03 = unslider03.data('unslider');

	

	$('.unslider-arrow03').click(function() {

        var fn = this.className.split(' ')[1];

        data03[fn]();

    });

});