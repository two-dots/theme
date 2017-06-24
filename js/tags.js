function new_tag_remove_tag() {
	var id = jQuery( this ).attr( 'id' );
	var num = id.substr( 10 );
	var current_tags = jQuery( '#tags-input' ).val().split(',');
	delete current_tags[num];
	var new_tags = [];
	jQuery.each( current_tags, function( key, val ) {
		if ( val && !val.match(/^\s+$/) && '' != val ) {
			new_tags = new_tags.concat( val );
		}
	});
	jQuery( '#tags-input' ).val( new_tags.join( ',' ).replace( /\s*,+\s*/, ',' ).replace( /,+/, ',' ).replace( /,+\s+,+/, ',' ).replace( /,+\s*$/, '' ).replace( /^\s*,+/, '' ) );
	tag_update_quickclicks();
	jQuery('#newtag').focus();
	return false;
}

function tag_update_quickclicks() {
	if ( jQuery( '#tags-input' ).length == 0 )
		return;
	var current_tags = jQuery( '#tags-input' ).val().split(',');
	jQuery( '#tagchecklist' ).empty();
	shown = false;
//	jQuery.merge( current_tags, current_tags ); // this doesn't work anymore, need something to array_unique
	jQuery.each( current_tags, function( key, val ) {
		val = val.replace( /^\s+/, '' ).replace( /\s+$/, '' ); // trim
		if ( !val.match(/^\s+$/) && '' != val ) {
			txt = '<span><a id="tag-check-' + key + '" class="ntdelbutton">X</a>&nbsp;' + val + '</span> ';
			jQuery( '#tagchecklist' ).append( txt );
			jQuery( '#tag-check-' + key ).click( new_tag_remove_tag );
			shown = true;
		}
	});
	if ( shown )
		jQuery( '#tagchecklist' ).prepend( '<strong>Current keywords:</strong><br />' );
}

function tag_flush_to_text(e,a) {
	a = a || false;
	var text = a ? jQuery(a).text() : jQuery('#newtag').val();
	var newtags = jQuery('#tags-input').val();

	var t = text.replace( /\s*([^,]+).*/, '$1,' );
	newtags += ','

	if ( newtags.indexOf(t) != -1 )
		return false;

	newtags += text;

	// massage
	newtags = newtags.replace( /\s+,+\s*/g, ',' ).replace( /,+/g, ',' ).replace( /,+\s+,+/g, ',' ).replace( /,+\s*$/g, '' ).replace( /^\s*,+/g, '' );
	jQuery('#tags-input').val( newtags );
	tag_update_quickclicks();
	if ( ! a ) {
		jQuery('#newtag').val('');
		jQuery('#newtag').focus();
	}
	return false;
}

function tag_save_on_publish() {
	if ( jQuery('#newtag').val() != 'Add new tag' )
		tag_flush_to_text();
}

function tag_press_key( e ) {
	if ( 13 == e.keyCode ) {
		tag_flush_to_text();
		return false;
	}
};

(function($){
	tagCloud = {
		init : function() {
			$('#tagcloud-link').click(function(){tagCloud.get(); $(this).unbind().click(function(){return false;}); return false;});
		},

		get : function() {
			$.post('admin-ajax.php', {'action':'get-tagcloud'}, function(r, stat) {
				if ( 0 == r || 'success' != stat )
					r = wpAjax.broken;

				r = '<p id="the-tagcloud">'+r+'</p>';
				$('#tagcloud-link').after($(r));
				$('#the-tagcloud a').click(function(){
					tag_flush_to_text(0,this);
					return false;
				});
			});
		}
	}
})(jQuery);

jQuery(document).ready( function($) {
	tagCloud.init();

	// close postboxes that should be closed
	jQuery('.if-js-closed').removeClass('if-js-closed').addClass('closed');


	jQuery('#tags-input').hide();
	tag_update_quickclicks();
	// add the quickadd form
	jQuery('#jaxtag').prepend('<span id="ajaxtag"><input type="text" name="newtag" id="newtag" class="form-input-tip" size="16" autocomplete="off" value="Add new tag" /><input type="button" class="button" id="tagadd" value="Add" tabindex="3" /><input type="hidden"/><input type="hidden"/><span class="howto">Separate tags with commas</span></span>');
	jQuery('#tagadd').click( tag_flush_to_text );
	jQuery('#newtag').focus(function() {
		if ( this.value == 'Add new tag' )
			jQuery(this).val( '' ).removeClass( 'form-input-tip' );
	});
	jQuery('#newtag').blur(function() {
		if ( this.value == '' )
			jQuery(this).val( 'Add new tag' ).addClass( 'form-input-tip' );
	});

	// auto-save tags on post save/publish
	jQuery('#save-settings').click( tag_save_on_publish );

	// auto-suggest stuff
	jQuery('#newtag').suggest( 'admin-ajax.php?action=ajax-tag-search', { delay: 500, minchars: 2, multiple: true, multipleSep: ", " } );
	jQuery('#newtag').keypress( tag_press_key );
});