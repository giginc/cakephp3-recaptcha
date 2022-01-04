<?php
declare(strict_types=1);

namespace Recaptcha\View\Helper;

use Cake\View\Helper;

/**
 * Recaptcha helper
 */
class RecaptchaHelper extends Helper
{
    /**
     * Constructor.
     *
     * @param array $config The settings for this helper.
     * @return void
     */
    public function initialize(array $config = []): void
    {
        $this->setConfig($config);
    }

    /**
     * Display recaptcha function
     *
     * @return string
     */
    public function display()
    {
        $recaptcha = $this->getConfig();
        if (!$recaptcha['enable']) {
            return '';
        }

        if ($recaptcha['version'] == 3) {
            return $this->_View->element('Recaptcha.recaptcha3', compact('recaptcha'));
        } else {
            return $this->_View->element('Recaptcha.recaptcha2', compact('recaptcha'));
        }
    }
}
