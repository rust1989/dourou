tinymce.PluginManager.add( 'ghostpool_shortcode', function(editor, url) {
console.log(url);
	// Register example button
	editor.addButton( 'ghostpool_shortcode', {
		title : 'Add Shortcode',
		image : url + '/icon.gif',
		onclick: function() {
		  // Open window
		  editor.windowManager.open({
			title: 'GhostPool Shortcodes',
			url: url + '/window_options.php',
			/*body: [
				{
				  type   : 'listbox',
				  name   : 'shortcodeoptions',
				  label  : '',
				  values : [
					{ text: 'Select A shortcode', value: '0', selected: true },
					{ text: 'Accordion', value: 'accordion' },
					{ text: 'Activity', value: 'activity' }
				  ]
				}
			],*/
			width: 410,
			height: 150
		  }, {
		  });
		} 
	});

});