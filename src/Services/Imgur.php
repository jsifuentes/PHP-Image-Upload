<?php
namespace Services;

use \ImageUpload\ImageService as ImageService;

class Imgur extends ImageService
{
	protected $key;

	public function __construct($key)
	{
		$this->key = $key;
	}

	/**
	 * Upload an image to Imgur
	 *
	 * @param string File you will be uploading (URL, Binary, Base64)
	 * @param int Album ID to upload the file in
	 * @param string Name of image
	 * @param string Title of image
	 * @param string Description of image
	 * @return mixed Response
	 */
	public function upload($file, $format = 'json', $album = null, $name = null, $title = null, $description = null)
	{
		return $this->post('https://api.imgur.com/3/image.' . $format, array(
			'image' => $file,
			'album' => $album,
			'name' => $name,
			'title' => $title,
			'description' => $description
		), array(
			'Authorization' => 'Client-ID: ' . $this->key
		));
	}
}