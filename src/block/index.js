/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import edit from './edit';
import metadata from './block.json';
import save from './save';

const { name } = metadata;

export { metadata, name };

export const settings = {
	title: __( 'I18N Block', 'gutenberg-i18n-block' ),
	description: __( 'Start with the building block of all narrative.', 'gutenberg-i18n-block' ),
	icon: 'translation',
	category: 'common',
	keywords: [ __( 'text', 'gutenberg-i18n-block' ) ],
	supports: {
		// Removes support for an HTML mode.
		html: false,
	},
	edit,
	save,
};
