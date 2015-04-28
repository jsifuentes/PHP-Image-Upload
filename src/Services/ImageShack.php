<?php
namespace ImageUpload\Services;

use \ImageUpload\ImageService as ImageService;

class ImageShack extends ImageService
{
	protected $key;
	protected $credentials;
	protected $cookie;

	public function __construct($key)
	{
		$this->key = $key;
	}

	/**
	 * Upload media by using credentials.
	 *
	 * @param string Username
	 * @param string Password
	 * @return $this
	 */
	public function withCredentials($username, $password)
	{
		$this->cookie = null;
		$this->credentials = array('username' => $username, 'password' => $password);
		return $this;
	}

	/**
	 * Upload media by using cookies.
	 *
	 * @param string Cookie
	 * @return $this
	 */
	public function withCookie($cookie)
	{
		$this->credentials = null;
		$this->cookie = $cookie;
		return $this;
	}

	/**
	 * Upload an image to Imageshack
	 *
	 * @param string File you will be uploading (URL, Base64)
	 * @param string Description of image
	 * @return mixed Response
	 */
	public function upload($file, $format = 'json')
	{
		// Is this "file" a URL?
		$url = filter_var($file, FILTER_VALIDATE_URL) !== false;

		$data = array(
			'key' => $this->key,
			'format' => $format
		);

		if ($url) {
			$data['url'] = $file;
		} else {
			$data['fileupload'] = $file;
		}

		if ($this->credentials) {
			$data['a_username'] = $this->credentials['username'];
			$data['a_password'] = $this->credentials['password'];
		} else if($this->cookie) {
			$data['cookie'] = $this->cookie;
		}

		return $this->post('https://post.imageshack.us/upload_api.php', $data);
	}
}