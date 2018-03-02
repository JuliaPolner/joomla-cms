<?php
/**
 * @package     Joomla.UnitTest
 * @subpackage  HTML
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

require_once __DIR__ . '/stubs/JHtmlBootstrapInspector.php';
require_once __DIR__ . '/stubs/JHtmlJqueryInspector.php';

/**
 * Test class for JHtmlBootstrap.
 * Generated by PHPUnit on 2012-08-16 at 17:39:35.
 */
class JHtmlBootstrapTest extends TestCase
{
	/**
	 * Backup of the SERVER superglobal
	 *
	 * @var    array
	 * @since  3.1
	 */
	protected $backupServer;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return  void
	 *
	 * @since   3.1
	 */
	protected function setUp()
	{
		// Ensure the loaded states are reset
		JHtmlBootstrapInspector::resetLoaded();
		JHtmlJqueryInspector::resetLoaded();

		parent::setUp();

		$this->saveFactoryState();

		JFactory::$application = $this->getMockCmsApp();
		JFactory::$config = $this->getMockConfig();
		JFactory::$document = $this->getMockDocument();

		$this->backupServer = $_SERVER;

		$_SERVER['HTTP_HOST'] = 'example.com';
		$_SERVER['SCRIPT_NAME'] = '';
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 *
	 * @return  void
	 *
	 * @since   3.1
	 */
	protected function tearDown()
	{
		$_SERVER = $this->backupServer;
		unset($this->backupServer);
		$this->restoreFactoryState();

		parent::tearDown();
	}

	/**
	 * Tests the alert method.
	 *
	 * @return  void
	 *
	 * @since   3.1
	 */
	public function testAlert()
	{
		// Initialise the alert script
		JHtmlBootstrap::alert();

		// Get the document instance
		$document = JFactory::getDocument();

		$this->assertArrayHasKey(
			'/media/vendor/bootstrap/js/bootstrap.bundle.min.js',
			$document->_scripts,
			'Verify that bootstrap.bundle.min.js file is loaded'
		);

		$this->assertArrayHasKey(
			'/media/legacy/js/bootstrap-init.min.js',
			$document->_scripts,
			'Verify that the boostrap-init.min.js file is loaded'
		);
	}

	/**
	 * Tests the button method.
	 *
	 * @return  void
	 *
	 * @since   3.1
	 */
	public function testButton()
	{
		// Initialise the alert script
		JHtmlBootstrap::button();

		// Get the document instance
		$document = JFactory::getDocument();

		$this->assertArrayHasKey(
			'/media/vendor/bootstrap/js/bootstrap.bundle.min.js',
			$document->_scripts,
			'Verify that bootstrap.bundle.min.js file is loaded'
		);

		$this->assertArrayHasKey(
			'/media/legacy/js/bootstrap-init.min.js',
			$document->_scripts,
			'Verify that the boostrap-init.min.js file is loaded'
		);
	}

	/**
	 * Tests the carousel method.
	 *
	 * @return  void
	 *
	 * @since   3.6.0
	 */
	public function testCarousel()
	{
		// Initialise the carousel script
		JHtmlBootstrap::carousel();

		// Get the document instance
		$document = JFactory::getDocument();

		$this->assertArrayHasKey(
			'/media/vendor/bootstrap/js/bootstrap.bundle.min.js',
			$document->_scripts,
			'Verify that bootstrap.bundle.min.js file is loaded'
		);

		$this->assertArrayHasKey(
			'/media/legacy/js/bootstrap-init.min.js',
			$document->_scripts,
			'Verify that the boostrap-init.min.js file is loaded'
		);
	}

	/**
	 * Tests the dropdown method.
	 *
	 * @return  void
	 *
	 * @since   3.1
	 */
	public function testDropdown()
	{
		// Initialise the dropdown script
		JHtmlBootstrap::dropdown();

		// Get the document instance
		$document = JFactory::getDocument();

		$this->assertArrayHasKey(
			'/media/vendor/bootstrap/js/bootstrap.bundle.min.js',
			$document->_scripts,
			'Verify that bootstrap.bundle.min.js file is loaded'
		);

		$this->assertArrayHasKey(
			'/media/legacy/js/bootstrap-init.min.js',
			$document->_scripts,
			'Verify that the boostrap-init.min.js file is loaded'
		);
	}

	/**
	 * Tests the framework method.
	 *
	 * @return  void
	 *
	 * @since   3.1
	 */
	public function testFramework()
	{
		// Initialise the Bootstrap JS framework
		JHtmlBootstrap::framework();

		// Get the document instance
		$document = JFactory::getDocument();

		$this->assertArrayHasKey(
			'/media/vendor/jquery/js/jquery.min.js',
			$document->_scripts,
			'Verify that Bootstrap initializes jQuery as well'
		);

		$this->assertArrayHasKey(
			'/media/vendor/bootstrap/js/bootstrap.bundle.min.js',
			$document->_scripts,
			'Verify that bootstrap.bundle.min.js file is loaded'
		);

		$this->assertArrayHasKey(
			'/media/legacy/js/bootstrap-init.min.js',
			$document->_scripts,
			'Verify that the boostrap-init.min.js file is loaded'
		);
	}

	/**
	 * Tests the renderModal method.
	 *
	 * @return  void
	 *
	 * @since   3.6.0
	 */
	public function testRenderModal()
	{
		// Get the rendered output.
		$modal = JHtmlBootstrap::renderModal();

		// Get the document instance
		$document = JFactory::getDocument();

		$this->assertArrayHasKey(
			'/media/vendor/bootstrap/js/bootstrap.bundle.min.js',
			$document->_scripts,
			'Verify that bootstrap.bundle.min.js file is loaded'
		);

		$this->assertArrayHasKey(
			'/media/legacy/js/bootstrap-init.min.js',
			$document->_scripts,
			'Verify that the boostrap-init.min.js file is loaded'
		);

		// Check the modal's html structure
		$matcher = array(
			'id'         => 'modal',
			'tag'        => 'div',
			'attributes' => array('class' => 'joomla-modal modal fade'),
			'child'      => array(
				'attributes' => array('class' => 'modal-dialog'),
				'tag' => 'div'
			),
			'children'   => array('count' => 1)
		);

		$this->assertTag(
			$matcher,
			$modal,
			'Verify that the html structure of the modal is correct'
		);
	}

	/**
	 * Tests the popover method.
	 *
	 * @return  void
	 *
	 * @since   3.6.0
	 */
	public function testPopover()
	{
		// Initialise the popover script
		JHtmlBootstrap::popover();

		// Get the document instance
		$document = JFactory::getDocument();

		$this->assertArrayHasKey(
			'/media/vendor/bootstrap/js/bootstrap.bundle.min.js',
			$document->_scripts,
			'Verify that bootstrap.bundle.min.js file is loaded'
		);

		$this->assertArrayHasKey(
			'/media/legacy/js/bootstrap-init.min.js',
			$document->_scripts,
			'Verify that the bootstrap-init.min.js is loaded'
		);
	}

	/**
	 * Tests the scrollspy method.
	 *
	 * @return  void
	 *
	 * @since   3.6.0
	 */
	public function testScrollspy()
	{
		// Initialise the scrollspy script
		JHtmlBootstrap::scrollspy();

		// Get the document instance
		$document = JFactory::getDocument();

		$this->assertArrayHasKey(
			'/media/vendor/bootstrap/js/bootstrap.bundle.min.js',
			$document->_scripts,
			'Verify that bootstrap.bundle.min.js file is loaded'
		);

		$this->assertArrayHasKey(
			'/media/legacy/js/bootstrap-init.min.js',
			$document->_scripts,
			'Verify that the boostrap-init.min.js file is loaded'
		);
	}

	/**
	 * Tests the tooltip method.
	 *
	 * @return  void
	 *
	 * @since   3.6.0
	 */
	public function testTooltip()
	{
		// Initialise the tooltip script
		JHtmlBootstrap::tooltip();

		// Get the document instance
		$document = JFactory::getDocument();

		$this->assertArrayHasKey(
			'/media/vendor/bootstrap/js/bootstrap.bundle.min.js',
			$document->_scripts,
			'Verify that bootstrap.bundle.min.js file is loaded'
		);

		$this->assertArrayHasKey(
			'/media/legacy/js/bootstrap-init.min.js',
			$document->_scripts,
			'Verify that the boostrap-init.min.js file is loaded'
		);
	}


	/**
	 * Tests the startAccordion method.
	 *
	 * @return  void
	 *
	 * @since   3.6.0
	 */
	public function testStartAccordion()
	{
		// Initialise the startAccordion script
		$html = JHtmlBootstrap::startAccordion();

		// Get the document instance
		$document = JFactory::getDocument();

		$this->assertArrayHasKey(
			'/media/vendor/bootstrap/js/bootstrap.bundle.min.js',
			$document->_scripts,
			'Verify that bootstrap.bundle.min.js file is loaded'
		);

		$this->assertArrayHasKey(
			'/media/legacy/js/bootstrap-init.min.js',
			$document->_scripts,
			'Verify that the boostrap-init.min.js file is loaded'
		);

		// Check the modal's html structure
		$matcher = array(
			'id'         => 'myAccordian',
			'tag'        => 'div',
		);

		$this->assertTag(
			$matcher,
			$html,
			'Verify that the html structure of the accordion is correct'
		);
	}

	/**
	 * Tests the endAccordion method
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public function testEndAccordion()
	{
		$this->assertThat(
			JHtml::_('bootstrap.endAccordion'),
			$this->equalTo('</div>')
		);
	}

	/**
	 * Tests the addSlide method.
	 *
	 * @return  void
	 *
	 * @since   3.6.0
	 */
	public function testaddSlide()
	{
		// Must start an accordion first
		JHtmlBootstrap::startAccordion();

		// Initialise the addSlide script
		$html = JHtmlBootstrap::addSlide('myAccordian', 'myText', 'mySlide');

		// Get the document instance
		$document = JFactory::getDocument();

		$this->assertArrayHasKey(
			'/media/vendor/bootstrap/js/bootstrap.bundle.min.js',
			$document->_scripts,
			'Verify that bootstrap.bundle.min.js file is loaded'
		);

		$this->assertArrayHasKey(
			'/media/legacy/js/bootstrap-init.min.js',
			$document->_scripts,
			'Verify that the boostrap-init.min.js file is loaded'
		);

		// Check the modal's html structure
		$matcher = array(
			'tag'        => 'div',
			'attributes' => array('class' => 'card'),
			'child'      => array(
				'tag'        => 'a',
				'attributes' => array('class' => 'card-header')
			)
		);

		$this->assertTag(
			$matcher,
			$html,
			'Verify that the html structure of the slide is correct'
		);
	}

	/**
	 * Tests the endSlide method
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public function testEndSlide()
	{
		$this->assertEquals('</div></div></div>', JHtmlBootstrap::endSlide());
	}

	/**
	 * Tests the startTabSet method.
	 *
	 * @return  void
	 *
	 * @since   3.6.0
	 */
	public function testStartTabSet()
	{
		// Initialise the startTabSet script
		$html = JHtmlBootstrap::startTabSet();

		// Get the document instance
		$document = JFactory::getDocument();

		$this->assertArrayHasKey(
			'/media/vendor/bootstrap/js/bootstrap.bundle.min.js',
			$document->_scripts,
			'Verify that bootstrap.bundle.min.js file is loaded'
		);

		$this->assertArrayHasKey(
			'/media/legacy/js/bootstrap-init.min.js',
			$document->_scripts,
			'Verify that the boostrap-init.min.js file is loaded'
		);

		// Check the tab set's html structure
		$matcher = array(
			'id'  => 'myTabTabs',
			'tag' => 'ul'
		);

		$this->assertTag(
			$matcher,
			$html,
			'Verify that the html structure of the TabSet is correct'
		);
	}

	/**
	 * Tests the endTabSet method
	 *
	 * @return  void
	 *
	 * @since   3.1
	 */
	public function testEndTabSet()
	{
		$this->assertRegExp("/[\r|\n]+<\/div>/", JHtmlBootstrap::endTabSet());
	}

	/**
	 * Tests the addTab method.
	 *
	 * @return  void
	 *
	 * @since   3.6.0
	 */
	public function testAddTab()
	{
		// Must start a tabset first
		JHtmlBootstrap::startTabSet();

		// Add a tab
		$html = JHtmlBootstrap::addTab('myTab', 'myTabItem', 'myTitle');

		// Get the document instance
		$document = JFactory::getDocument();

		$this->assertArrayHasKey(
			'/media/vendor/bootstrap/js/bootstrap.bundle.min.js',
			$document->_scripts,
			'Verify that bootstrap.bundle.min.js file is loaded'
		);

		$this->assertArrayHasKey(
			'/media/legacy/js/bootstrap-init.min.js',
			$document->_scripts,
			'Verify that the boostrap-init.min.js file is loaded'
		);

		// Check the tab set's html structure
		$matcher = array(
			'id'         => 'myTabItem',
			'tag'        => 'div',
			'attributes' => array('class' => 'tab-pane')
		);

		$this->assertTag(
			$matcher,
			$html,
			'Verify that the html structure of the Tab is correct'
		);
	}

	/**
	 * Tests the endTab method
	 *
	 * @return  void
	 *
	 * @since   3.1
	 */
	public function testEndTab()
	{
		$this->assertRegExp("/[\r|\n]+<\/div>/", JHtmlBootstrap::endTabSet());
	}


	/**
	 * Tests the loadCss method.
	 *
	 * @return  void
	 *
	 * @since   3.1
	 */
	public function testLoadCss()
	{
		// Initialise the Bootstrap JS framework
		JHtmlBootstrap::loadCss(true, 'rtl');

		// Get the document instance
		$document = JFactory::getDocument();

		$this->assertArrayHasKey(
			'/media/vendor/bootstrap/css/bootstrap.min.css',
			$document->_styleSheets,
			'Verify that the base Bootstrap CSS is loaded'
		);
	}
}
