<?php
class Student
{
    private int $id;
    private string $tenSinhVien;
    private string $email;
    private string $ngaySinh;
    private int $idLop;
    public function __construct($id, $tenSinhVien, $email, $ngaySinh, $idLop)
    {
        $this->id = $id;
        $this->tenSinhVien = $tenSinhVien;
        $this->email = $email;
        $this->ngaySinh = $ngaySinh;
        $this->idLop = $idLop;
    }

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getTenSinhVien(): string {
		return $this->tenSinhVien;
	}
	
	/**
	 * @param string $tenSinhVien 
	 * @return self
	 */
	public function setTenSinhVien(string $tenSinhVien): self {
		$this->tenSinhVien = $tenSinhVien;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getEmail(): string {
		return $this->email;
	}
	
	/**
	 * @param string $email 
	 * @return self
	 */
	public function setEmail(string $email): self {
		$this->email = $email;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getNgaySinh(): string {
		return $this->ngaySinh;
	}
	
	/**
	 * @param string $ngaySinh 
	 * @return self
	 */
	public function setNgaySinh(string $ngaySinh): self {
		$this->ngaySinh = $ngaySinh;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getIdLop(): int {
		return $this->idLop;
	}
	
	/**
	 * @param int $idLop 
	 * @return self
	 */
	public function setIdLop(int $idLop): self {
		$this->idLop = $idLop;
		return $this;
	}
}