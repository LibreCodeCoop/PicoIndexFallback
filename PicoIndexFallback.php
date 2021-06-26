<?php
/**
 * Pico Index Fallback
 *
 * @author Vitor Mattos
 * @link https://librecode.coop
 * @license https://opensource.org/licenses/AGPL-3.0
 * @version 1.0
 */
class PicoIndexFallback extends AbstractPicoPlugin {
	/**
	 * Pico API version
	 *
	 * @var int
	 */
	const API_VERSION = 3;
	/**
	 * Fallback file used in place of default index file
	 *
	 * @var string
	 */
	private $fallback_to_index = 'README';

	/**
	 * Triggered after Pico has read its configuration
	 *
	 * @see Pico::getConfig()
	 * @see Pico::getBaseUrl()
	 * @see Pico::isUrlRewritingEnabled()
	 *
	 * @param array &$config array of config variables
	 */
	public function onConfigLoaded(&$config)
	{
		if (isset($config['fallback_to_index'])) {
			$this->fallback_to_index = $config['fallback_to_index'];
		}
	}

	public function onRequestFile(string &$requestFile) {
		if (!$this->fallback_to_index) {
			return;
		}
		if (!preg_match('/index.md$/', $requestFile)) {
			return;
		}
		if (!is_file($requestFile)) {
			$pos = strrpos($requestFile, 'index.md');
			$replaced = substr_replace($requestFile, '', $pos, strlen('index.md'));
			$pattern = '';
			for ($i = 0; $i < strlen($this->fallback_to_index); $i++) {
				$pattern.= '[' . strtolower($this->fallback_to_index[$i]). strtoupper($this->fallback_to_index[$i]) . ']';
			}
			$found = glob($replaced.$pattern.'.md');
			if ($found) {
				$requestFile = $found[0];
			}
		}
	}
}