<?PHP

class Unholyfactory {
	private $_absorbed = array();
	public function absorb( $rhs ) {
		if ( get_parent_class( $rhs ) != 'Fighter' )
		{
			print( "(Factory can't absorb this, it's not a fighter)" . PHP_EOL );
			return ;
		}
		if ( !in_array( $rhs, $this->_absorbed ) )
		{
			$this->_absorbed[ $rhs->getName() ] = $rhs;
			print( "(Factory absorbed a fighter of type " . $rhs->getName() . ")" . PHP_EOL );
		}
		else
			print( "(Factory already absorbed a fighter of type " . $rhs->getName() . ")" . PHP_EOL );
	}
	public function fabricate( $type ) {
		if ( array_key_exists( $type, $this->_absorbed ) )
		{
			print( "(Factory fabricates a fighter of type $type)" . PHP_EOL );
			return ( clone $this->_absorbed[$type] );
		}
		else
			print( "(Factory hasn't absorbed any fighter of type $type)" . PHP_EOL);	
	}
}