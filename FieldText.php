<?php
namespace Pandora3\Widgets\FieldText;

use Pandora3\Widgets\FormField\FormField;

/**
 * Class FieldText
 * @package Pandora3\Widgets\FieldText
 */
class FieldText extends FormField {

	/**
	 * {@inheritdoc}
	 */
	protected function getView(): string {
		return __DIR__.'/Views/Widget';
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getContext(): array {
		$context = parent::getContext();
		return array_replace( $context, [
			'inputType' => in_array($context['type'], ['password', 'email']) ? $context['type'] : 'text'
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	protected function beforeRender(array $context): array {
		if ($context['placeholder'] ?? '') {
			$attribs = $context['attribs'] ?? '';
			$context['attribs'] = $attribs.' placeholder="'.$context['placeholder'].'"';
		}
		if ($context['disabled'] ?? false) {
			$attribs = $context['attribs'] ?? '';
			$context['attribs'] = $attribs.' disabled';
		}
		return $context;
	}

}