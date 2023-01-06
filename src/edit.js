import { useBlockProps } from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';

/**
 * The Edit view uses the PHP render callback.
 *
 * @return {WPElement} Element to render.
 */
export default function Edit() {
	return (
		<div { ...useBlockProps() }>
			<ServerSideRender block="wpdc/post-meta-block-example" />
		</div>
	);
}
