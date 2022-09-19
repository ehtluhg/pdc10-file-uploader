<?php

class Registration
{
	protected $id;
	protected $complete_name;
	protected $email;
	protected $picture_path;
	protected $password;

	const TYPE_IMAGE = 'image';
	const DIRECTORY_IMAGES = 'images/';

	public function __construct(
		$complete_name,
		$email,
		$password,
		$picture_path = null
	)
	{
		$this->complete_name = $complete_name;
		$this->email = $email;
		$this->password = $password;
		$this->picture_path = $picture_path;
	}

	public function getCompleteName()
	{
		return $this->complete_name;
	}

	public function getEmailAddress()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getPath()
	{
		return $this->picture_path;
	}

	public function encryptPassword($pwd)
	{
		$encryptedPassword = sha1($pwd);
		return [
			'password' => $encryptedPassword,
		];
	}

	public function save()
	{
		global $pdo;
		try {

			$sql = "INSERT INTO registrations SET complete_name=:complete_name, email=:email, password=:password, picture_path=:picture_path";
			$statement = $pdo->prepare($sql);

			return $statement->execute([
				':complete_name' => $this->getCompleteName(),
				':email' => $this->getEmailAddress(),
				':password' => $this->getPassword(),
				':picture_path' => $this->getPath()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public static function handleUpload($obj)
	{
		try {
			$check = getimagesize($obj['tmp_name']);
			if ($check !== false) {
				$target_dir = static::DIRECTORY_IMAGES;
			}

			if (is_uploaded_file($obj['tmp_name'])) {
				$target_file_path = $target_dir . $obj['name'];
				if (move_uploaded_file($obj['tmp_name'], $target_file_path)) {
					$file_type = static::TYPE_IMAGE;
					return [
						'path' => $target_file_path,
					];
				}
			}
		} catch (Exception $e) {
			error_log($e->getMessage());
			return false;
		}
	}

	public static function retrieveRegistration()
	{
		global $pdo;

		$a = 1;

		$stmt = $pdo->prepare(

			"SELECT * FROM registrations"
		);

		$stmt->execute();

		$registrations = $stmt->fetchAll();

		return $registrations;
	}
}