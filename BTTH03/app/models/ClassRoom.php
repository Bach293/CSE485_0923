<?php
class ClassRoom{
    private int $id;
    private string $tenLop;
    public function __construct($id, $tenLop){
        $this->id = $id;
        $this->tenLop = $tenLop;
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
	public function getTenLop(): string {
		return $this->tenLop;
	}
	
	/**
	 * @param string $tenLop 
	 * @return self
	 */
	public function setTenLop(string $tenLop): self {
		$this->tenLop = $tenLop;
		return $this;
	}
}