<?php

class User{
    private int $user_id;
    private string $user_name;
    private string $user_pass;

    public function __construct($user_id, $user_name, $user_pass){
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->user_pass = $user_pass;
    }
    

	/**
	 * @return int
	 */
	public function getUser_id(): int {
		return $this->user_id;
	}
	
	/**
	 * @param int $user_id 
	 * @return self
	 */
	public function setUser_id(int $user_id): self {
		$this->user_id = $user_id;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getUser_name(): string {
		return $this->user_name;
	}
	
	/**
	 * @param string $user_name 
	 * @return self
	 */
	public function setUser_name(string $user_name): self {
		$this->user_name = $user_name;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getUser_pass(): string {
		return $this->user_pass;
	}
	
	/**
	 * @param string $user_pass 
	 * @return self
	 */
	public function setUser_pass(string $user_pass): self {
		$this->user_pass = $user_pass;
		return $this;
	}
}