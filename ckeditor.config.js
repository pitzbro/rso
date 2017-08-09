CKEDITOR.addStylesSet( 'drupal',
[
	/* Block Styles */
	{ name : 'Heading 2'        , element : 'h2' },
	{ name : 'Heading 3'        , element : 'h3' },
	{ name : 'Heading 4'        , element : 'h4' },
	{ name : 'Paragraph'        , element : 'p' },
	{ name : 'Green Button',
		element : 'div',
		attributes : {
		'class' : 'ncbc-green-button' }
	},
	{ name : 'Blue Image Button',
		element : 'div',
		attributes : {
		'class' : 'ncbc-image-button' }
	},

	/* Inline Styles */
	{ name : 'Inline Quotation'    , element : 'q' },
	{ name : 'Footnotes'    , element : 'fn' },

	/* Object Styles */
	{ name : 'Highlighted Row',
		element : 'tr',
		attributes : { 'class' : 'ncbc-highlighted-row' }
	}
]);