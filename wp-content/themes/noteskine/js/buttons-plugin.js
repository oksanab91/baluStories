(function() {
	"use strict";

    tinymce.create('tinymce.plugins.Wptuts', {
        init : function(ed, url) {
			// Drop Cap
            ed.addButton('drop-cap', {
                title : 'Drop cap',
                cmd : 'dropcap',
                image : url + '/../images/drop-cap.png'
            });

            ed.addCommand('dropcap', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<span class="noteskine-dropcap">' + selected_text + '</span>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

			// Pull Quote Left
			ed.addButton('pull-quote-left', {
                title : 'Left pull quote ',
                cmd : 'pull-quote-left',
                image : url + '/../images/pull-quote-left.png'
            });

            ed.addCommand('pull-quote-left', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<span class="noteskine-pull-quote-left">' + selected_text + '</span>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

			// Pull Quote Right
			ed.addButton('pull-quote-right', {
                title : 'Right pull quote ',
                cmd : 'pull-quote-right',
                image : url + '/../images/pull-quote-right.png'
            });

            ed.addCommand('pull-quote-right', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<span class="noteskine-pull-quote-right">' + selected_text + '</span>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

			// Box
			ed.addButton('box', {
                title : 'Box',
                cmd : 'box',
                image : url + '/../images/box.png'
            });

            ed.addCommand('box', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<div class="noteskine-box">' + selected_text + '</div>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

        },

    });
    // Register plugin
    tinymce.PluginManager.add( 'noteskine_plugin', tinymce.plugins.Wptuts );
})(jQuery);
