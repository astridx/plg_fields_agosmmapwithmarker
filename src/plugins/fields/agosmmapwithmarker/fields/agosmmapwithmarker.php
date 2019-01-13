<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  plg_fields_agosmmapwithmarker
 *
 * @copyright   Copyright (C) 2005 - 2018 Astrid Günther, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later;
 * @link        astrid-guenther.de
 */
defined('JPATH_PLATFORM') or die;

JFormHelper::loadFieldClass('text');

/**
 * Supports a one line text field for address selection
 *
 * @since  1.0
 */
class JFormFieldAgosmmapwithmarker extends JFormFieldText
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  
	 */
	protected $type = 'Agosmmapwithmarker';

	/**
	 * Layout to render
	 *
	 * @var    string
	 * @since  
	 */
	protected $layout = 'agosmmapwithmarker';

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   
	 */
	public function getInput()
	{
		$document = JFactory::getDocument();
		$document->addScript(JURI::root(true) . '/media/plg_fields_agosmmapwithmarker/places/places.js', array(), array('defer' => 'defer'));

		$document->addScript(JURI::root(true) . '/media/plg_fields_agosmmapwithmarker/js/admin-agosmmapwithmarker.js', array(), array('defer' => 'defer'));
		$document->addStyleSheet(JURI::root(true) . '/media/plg_fields_agosmmapwithmarker/css/admin-agosmmapwithmarker.css');

		$placeholder = JText::_('PLG_FIELDS_AGOSMMAPWITHMARKER_PLACEHOLDER');

		if ($this->value !== '')
		{
			$placeholder = $this->value;
		}

		$field = '<input name="' . $this->name . '" id="' . $this->id . '" class="address-input" placeholder="' . $placeholder . '">';

		return $field;
	}
}
