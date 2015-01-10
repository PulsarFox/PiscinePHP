<?PHP
require_once 'Matrix.class.php';

Class Camera {

	public static $verbose = FALSE;

	private $_origin;
	private $_tT;
	private $_tR;
	private $_view_matrix;
	private $_proj;
	private $_width;
	private $_height;
	private $_near;
	private $_far;

	public static function doc() {
		print (file_get_contents("./Camera.doc.txt"));
		return;
	}
	
	public function watchVertex( Vertex $worldVertex ) {
		$x = ($this->_width / 2 ) * $worldVertex->getX() + ( $this->_width / 2 );
		$x = ($this->_height / 2 ) * $worldVertex->getY() + ( $this->_height / 2 );
		$z = ( $this->_far - $this->_near ) / 2  * $worldVertex->getZ + ($this->_far + $this->_near) / 2;
		$return = new Vertex( ['x' => $x, 'y' => $y ,'z' => z] );
		return ( $return );
	}
	
	public function __construct( array $kwargs ) {
		if ( !array_key_exists( 'origin', $kwargs) || !array_key_exists( 'orientation', $kwargs) || !array_key_exists( 'fov', $kwargs) || !array_key_exists( 'near', $kwargs) || !array_key_exists( 'far', $kwargs ) || ( ( !array_key_exists('width', $kwargs) || !array_key_exists('height', $kwargs) ) && !array_key_exists('ratio', $kwargs) ) )
			return;
		if ( array_key_exists('ratio', $kwargs ) ) {
				$kwargs['width'] = $kwargs['ratio'] * 480;
				$kwargs['height'] = 480;
		}
		else
			$kwargs['ratio'] = $kwargs['width'] / $kwargs['height'];
		if (self::$verbose == TRUE)
			printf('Camera instance constructed' . PHP_EOL );
		$this->_height = $kwargs['height'];
		$this->_width = $kwargs['width'];
		$this->_near = $kwargs['near'];
		$this->_far = $kwargs['far'];
		$this->_origin = $kwargs['origin'];
		$this->_tT = $this->_create_tT();
		$this->_tR = $kwargs['orientation']->transpose();
		$this->_view_matrix = $this->_tR->mult( $this->_tT );
		$this->_proj = new Matrix( ['preset' => Matrix::PROJECTION, 'fov' => $kwargs['fov'], 'ratio' => $kwargs['ratio'], 'near' => $kwargs['near'], 'far' => $kwargs['far'] ] );
		return;
	}

	public function __destruct() {
		if (self::$verbose == TRUE)
			printf('Camera instance destructed' . PHP_EOL );
		return;
	}

	public function __toString() {
		return( sprintf( "Camera( " . PHP_EOL . "+ Origine: ". $this->_origin . PHP_EOL . "+ tT:" . PHP_EOL . $this->_tT . PHP_EOL . "+ tR:" . PHP_EOL . $this->_tR . PHP_EOL . "+ tR->mult( tT ):" . PHP_EOL . $this->_view_matrix . PHP_EOL . "+ Proj:" . PHP_EOL . $this->_proj . PHP_EOL . ')' ) );
	}

	private function _create_tT() {
	$translation = new Vector( array( 'dest' => $this->_origin ) );
	$oppv = $translation->opposite();
	$tT = new Matrix( array( 'preset' => Matrix::TRANSLATION, 'vtc' => $oppv ) );
	return( $tT );
	}
}

?>
