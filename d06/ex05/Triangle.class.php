<?PHP

Class Triangle {

	public static $verbose = FALSE;

	public static function doc() {
		print (file_get_contents("./Vector.doc.txt"));
		return;
	}

	private $_A;
	private $_B;
	private $_C;

	public function getA() {
		return ( clone $this->_A );
	}

	public function getB() {
		return ( clone $this->_B );
	}

	public function getC() {
		return ( clone $this->_C );
	}

	public function __construct( $A, $B, $C ) {
		if ( !$A || !$C || !$B  )
			return;
		$this->_A = clone $A;
		$this->_B = clone $B;
		$this->_C = clone $C;
		if (self::$verbose == TRUE)
			printf( 'Triangle constructed.' );
		return;
	}

	public function __destruct() {
		if (self::$verbose == TRUE)
			printf( 'Triangle destructed' );
		return;
	}

}

?>
