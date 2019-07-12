/**
 * WordPress dependencies
 */
import { getBlockTypes } from '@wordpress/blocks';
import { __, _n, sprintf } from '@wordpress/i18n';

export default ( { className } ) => {
	const numberOfBlockTypes = getBlockTypes().length;

	return (
		<div className={ className }>
			<p>{ __( 'Hello from the editor!', 'gutenberg-i18n-block' ) }</p>
			<p>
				{
					sprintf(
						/* translators: %s: number of registered block types */
						_n(
							'There is %s registered block type',
							'There are %s registered block types',
							numberOfBlockTypes,
							'gutenberg-i18n-block'
						),
						numberOfBlockTypes
					)
				}
			</p>
		</div>
	);
};
