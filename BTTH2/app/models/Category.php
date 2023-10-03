<?php

class Category{
    private int $ma_tloai;
    private string $ten_tloai;
    public function __construct($ma_tloai, $ten_tloai){
        $this->ma_tloai = $ma_tloai;
        $this->ten_tloai = $ten_tloai;
    }
    

	/**
	 * @return int
	 */
	public function getMa_tloai(): int {
		return $this->ma_tloai;
	}
	
	/**
	 * @param int $ma_tloai 
	 * @return self
	 */
	public function setMa_tloai(int $ma_tloai): self {
		$this->ma_tloai = $ma_tloai;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getTen_tloai(): string {
		return $this->ten_tloai;
	}
	
	/**
	 * @param string $ten_tloai 
	 * @return self
	 */
	public function setTen_tloai(string $ten_tloai): self {
		$this->ten_tloai = $ten_tloai;
		return $this;
	}
}