$( document ).ready( function() {
	$( '#deleteSpelling' ).click( function() {
		$.ajax( {
			type: 'POST',
			url: '',
			data: '',
			success: function( data ) {
				if ( data ) {

				}
				else {

				}
			}
		});
	});
});