<?php

namespace Brisum\Wordpress\FormPopup;

use Brisum\Lib\Form\AbstractForm;
use Brisum\Lib\ObjectManager;
use Brisum\Lib\View;

class PopupFoundation
{
	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var View
	 */
	protected $view;

	/**
	 * @var AbstractForm
	 */
	protected $form;

	protected $dataAnimationIn = 'slide-in-down fast';
	protected $dataAnimationOut = 'slide-out-up fast';

	/**
	 * @param string $name
	 * @param string $title
	 * @param AbstractForm $form
	 * @param ObjectManager $objectManager
	 * @internal param View $view
	 */
	public function __construct($name, $title, AbstractForm $form, ObjectManager $objectManager)
	{
		$this->name = (string)$name;
		$this->title = (string)$title;

		if ($this->isEnabled()) {
			$this->form = $form;
			$this->view = $view = $objectManager->create('Brisum\Lib\View', ['dirTemplate' => __DIR__]);

			add_action('wp', [$this, 'actionWp']);
			add_action('wp_footer', [$this, 'actionWpFooter']);
		}
	}

	protected function isEnabled()
	{
		return true;
	}
	
	public function actionWp()
	{
		if (!$this->isEnabled()) {
			return;
		}

		if ($this->form->parseRequest()) {
			wp_redirect($_SERVER['REQUEST_URI']) && die();
		}
	}

	/**
	 * @return void
	 */
	public function actionWpFooter()
	{
		if (!$this->isEnabled()) {
			return;
		}

		$this->view->render(
			'template/popup.tpl.php',
			[
				'name' => $this->name,
				'title' => $this->title,
				'form' => $this->form,
				'dataAnimationIn' => $this->dataAnimationIn,
				'dataAnimationOut' => $this->dataAnimationOut,
			]
		);
	}
}
