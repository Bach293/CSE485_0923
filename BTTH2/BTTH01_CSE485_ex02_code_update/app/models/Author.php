<?php

class Author{
    private int $ma_tgia;
    private string $ten_tgia;
    private string $hinh_tgia;

    public function __construct($ma_tgia, $ten_tgia, $hinh_tgia){
        $this->ma_tgia = $ma_tgia;
        $this->ten_tgia = $ten_tgia;
		if ($hinh_tgia == null){
			$this->hinh_tgia = "";
		}else{
			$this->hinh_tgia = $hinh_tgia;
		}
    }
	/**
	 * @return int
	 */
	public function getMa_tgia(): int {
		return $this->ma_tgia;
	}
	
	/**
	 * @param int $ma_tgia 
	 * @return self
	 */
	public function setMa_tgia(int $ma_tgia): self {
		$this->ma_tgia = $ma_tgia;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getTen_tgia(): string {
		return $this->ten_tgia;
	}
	
	/**
	 * @param string $ten_tgia 
	 * @return self
	 */
	public function setTen_tgia(string $ten_tgia): self {
		$this->ten_tgia = $ten_tgia;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getHinh_tgia(): string {
		return $this->hinh_tgia;
	}
	
	/**
	 * @param string $hinh_tgia 
	 * @return self
	 */
	public function setHinh_tgia(string $hinh_tgia): self {
		$this->hinh_tgia = $hinh_tgia;
		return $this;
	}
}