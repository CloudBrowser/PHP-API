<?php

namespace CloudBrowser\Adapter\EndPoint;

use CloudBrowser\Adapter\EndPoint\Base;

class Pdf extends Base {
	const END_POINT = '/image';

	/**
	 * Set the payload for the request
	 * 
	 * @param string $source the webaddress or HTML to capture
	 * @param array $options list the query field keys and values      
	 */
	public function setPayload($source, $options = []) {
		$this->payload = [
			'source' => $source,
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