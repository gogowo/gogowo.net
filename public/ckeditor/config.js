/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights
 *          reserved. For licensing, see LICENSE.md or
 *          http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function(config) {
	config.width = '80%';
	config.height = '300px';
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	//config.size = '16px';
	config.toolbar_Full = [
			[ 'Source', '-', 'Save', 'NewPage', 'Preview', '-', 'Templates' ],
			[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-',
					'Print', 'SpellChecker', 'Scayt' ],
			[ 'Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll',
					'RemoveFormat' ],
			[ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select',
					'Button', 'ImageButton', 'HiddenField' ],
			[ 'BidiLtr', 'BidiRtl' ],
			'/',
			[ 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript',
					'Superscript' ],
			[ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent',
					'Blockquote', 'CreateDiv' ],
			[ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ],
			[ 'Link', 'Unlink', 'Anchor' ],
			[ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley',
					'SpecialChar', 'PageBreak' ], '/',
			[ 'Styles', 'Format', 'Font', 'FontSize' ],
			[ 'TextColor', 'BGColor' ],
			[ 'Maximize', 'ShowBlocks', '-', 'About' ] ];

	config.toolbar_Basic = [ [ 'Bold', 'Italic', '-', 'NumberedList',
			'BulletedList', '-', 'Link', 'Unlink', '-', 'About' ] ];
	config.toolbar = 'MyToolbar';// 把默认工具栏改为‘MyToolbar’

	config.toolbar_MyToolbar = [
			[ 'Bold', 'Italic', 'Strike' ], 
			[ 'Image', 'Link', 'Unlink' ],
			[ 'Maximize' ] ];
    config.removeDialogTabs = 'image:advanced;link:target;'
    config.removeDialogTabs = 'link:advanced;link:target;image:advanced;image:target;';
};
