<?PHP

class Jaime {
	public function sleepWith( $rhs ) {
		$class = get_class( $rhs );
		if ( $class == "Tyrion" )
			print("Not even if I'm drunk" . PHP_EOL);
		else if ( $class == "Sansa")
			print("Let's do this" . PHP_EOL);
		else if ( $class == "Cersei")
			print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
	}
}

?>