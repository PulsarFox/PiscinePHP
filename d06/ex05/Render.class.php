<?PHP

Class Render {

	const VERTEX = 0;
	const EDGE = 1;
	const RASTERIZE = 2;

	public static $verbose = FALSE;

	public static function doc() {
		print (file_get_contents("./Vector.doc.txt"));
		return;
	}

	private $_height;
	private $_width;
	private $_filename;
	private $_image;

	public function renderVertex( Vertex $screenVertex ) {
		imagesetpixel( $this->_image, $screenVertex->getX(), $screenVertex->getY(), $screenVertex->getColor()->toPngColor( $this->_image ) );
		return;
	}

	public function renderSegment( Vertex $start, Vertex $end ) {
		$destx = ( ( $start->getX() - $end->getX() >= 0 ) ? ( $start->getX() - $end->getX() ) : ( $end->getX() - $start->getX() ) );
		$desty = ( $start->getY() - $end->getY() >= 0 ? $start->getY() - $end->getY() : $end->getY() - $start->getY() );
		$sourcex = ( $start->getX() < $end->getX() ? 1 : -1);
		$sourcey = ( $start->getY() < $end->getY() ? 1 : -1);
		$errx = ( $destx > $destdy ? $destx : -$desty ) / 2;
		while ( $start->getX() != $end->getY() || $start->getY() != $end->getY() )
		{
			$this->renderVertex( $start );
			$erry = $errx;
			if ( $erry > -$destx )
			{
				echo ("lol");
				$errx = $errx - $desty;
				$start->setX( $start->getX() + $sourcex );
			}
			if ($erry < $desty)
			{
				echo("lol");
				$errx = $errx + $destx;
				$start->setY( $start->getY() + $sourcey );
			}
		}
		return;
	}
	public function renderTriangle( Triangle $triangle, $mode ) {
		if ( $triangle->getVisibility() === false )
			return;
		$this->renderVertex( $triangle->getA() );
		$this->renderVertex( $triangle->getB() );
		$this->renderVertex( $triangle->getC() );
		if ( $mode > 0 ) {
		$this->renderSegment( $triangle->getB(), $triangle->getA() );
		$this->renderSegment( $triangle->getB(), $triangle->getC() );
		$this->renderSegment( $triangle->getA(), $triangle->getC() );
		}	
		return;
	}

	public function renderMesh( $mesh, $mode ) {
		foreach( $mesh as $triangle )
			$this->renderTriangle( $triangle, $mode );
		return;
	}

	public function develop() {
		imagepng($this->_image, $this->_filename);
		return;
	}
	public function __construct( $width, $height, $filename ) {
		if ( !$width || !$height || !$filename  )
			return;
		$this->_width = $width;
		$this->_height = $height;
		$this->_filename = $filename;
		$this->_image = imagecreatetruecolor( $width, $height );
		if (self::$verbose == TRUE)
			printf( 'Render constructed.' );
		return;
	}

	public function __destruct() {
		if (self::$verbose == TRUE)
			printf( 'Render destructed' );
		return;
	}
}

?>
