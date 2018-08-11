<?php

namespace CloudBrowser\Adapter\EndPoint;

use CloudBrowser\Adapter\Base;

class Screenshot extends Base {
	const END_POINT = '/screenshot';

	/**
	 * Set the payload for the request
	 * 
	 * @param string $url the webaddress to capture
	 * @param array $options list the query field keys and values      
	 */
	public function setPayload($url, $options = []) {
		$this->payload = [
			'url' => $url,
		];

		$this->payload = $this->payload + $options;
	}

	/**
	 * Build the base API request URL for this end-point
	 * 
	 * @return String Complete API end-point URL
	 */
	protected function getRequestBase() {
		return self::HOST . self::END_POINT;
	}
}