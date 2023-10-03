<?php
class Article{
    private int $ma_bviet;
    private string $tieude;
    private string $ten_bhat;
    private int $ma_tloai;
    private string $tomtat;
    private string $noidung;
    private int $ma_tgia;
    private string $ngayviet;
    private ?string $hinhanh;

    public function __construct($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh) {
        $this->ma_bviet = $ma_bviet;
        $this->tieude = $tieude;
        $this->ten_bhat = $ten_bhat;
        $this->ma_tloai = $ma_tloai;
        $this->tomtat = $tomtat;
        $this->noidung = $noidung;
        $this->ma_tgia = $ma_tgia;
        $this->ngayviet = $ngayviet;
        $this->hinhanh = $hinhanh;
    }

	/**
	 * @return int
	 */
	public function getMa_bviet(): int {
		return $this->ma_bviet;
	}
	
	/**
	 * @param int $ma_bviet 
	 * @return self
	 */
	public function setMa_bviet(int $ma_bviet): self {
		$this->ma_bviet = $ma_bviet;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getTieude(): string {
		return $this->tieude;
	}
	
	/**
	 * @param string $tieude 
	 * @return self
	 */
	public function setTieude(string $tieude): self {
		$this->tieude = $tieude;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getTen_bhat(): string {
		return $this->ten_bhat;
	}
	
	/**
	 * @param string $ten_bhat 
	 * @return self
	 */
	public function setTen_bhat(string $ten_bhat): self {
		$this->ten_bhat = $ten_bhat;
		return $this;
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
	public function getTomtat(): string {
		return $this->tomtat;
	}
	
	/**
	 * @param string $tomtat 
	 * @return self
	 */
	public function setTomtat(string $tomtat): self {
		$this->tomtat = $tomtat;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getNoidung(): string {
		return $this->noidung;
	}
	
	/**
	 * @param string $noidung 
	 * @return self
	 */
	public function setNoidung(string $noidung): self {
		$this->noidung = $noidung;
		return $this;
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
	public function getNgayviet(): string {
		return $this->ngayviet;
	}
	
	/**
	 * @param string $ngayviet 
	 * @return self
	 */
	public function setNgayviet(string $ngayviet): self {
		$this->ngayviet = $ngayviet;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getHinhanh(): ?string {
		return $this->hinhanh;
	}
	
	/**
	 * @param  $hinhanh 
	 * @return self
	 */
	public function setHinhanh(?string $hinhanh): self {
		$this->hinhanh = $hinhanh;
		return $this;
	}
}