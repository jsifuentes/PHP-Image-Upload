<?php
namespace ImageUpload;

class ImageService
{
	private function __construct() {  }

	protected function get($url, $headers = array())
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    return curl_exec($ch);
	}

	protected function post($url, $data = array(), $headers = array())
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_POST, count($data));
	    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	    return curl_exec($ch);
	}

	protected function put($url, $data = array(), $headers = array())
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	    return curl_exec($ch);
	}

	protected function delete($url, $headers = array())
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	    return curl_exec($ch);
	}
}