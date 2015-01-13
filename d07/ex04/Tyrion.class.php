<?PHP

class Tyrion {
	public function sleepWith( $rhs ) {
		$class = get_class( $rhs );
		if ( $class == "Jaime" )
			print("Not even if I'm drunk" . PHP_EOL);
		else if ( $class == "Sansa")
			print("Let's do this" . PHP_EOL);
		else if ( $class == "Cersei")
			print("Not even if I'm drunk" . PHP_EOL);
	}
}

?>