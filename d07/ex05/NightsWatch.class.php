<?PHP

class NightsWatch implements IFighter {
	private $_fight;
	public function recruit( $rhs ) {
		if ( method_exists( $rhs, 'fight' ) )
			$_fight = $rhs->fight() . PHP_EOL;
	}
	public function fight() {
		print($_fight);
	}
}

?>