<?php

namespace DatabaseConfig;

class DatabaseConfig
{
	public string $host;
	public string $user;
	public string $password;
	public string $db;

	public function __construct()
	{
		$this->host = $_ENV['DB_HOST'];
        $this->db = $_ENV['DB_NAME'];
        $this->user = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
	}
}
