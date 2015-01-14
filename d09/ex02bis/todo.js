
var container = document.getElementById( "ft_list" );
document.getElementById( "add_todo" ).onclick = addTodo;
document.body.onload = recoverTodoList;

function addTodo() {
	var infos = prompt( "Please, enter new todo informations." );
	prependDiv( infos );
	addCookie( "todolist", infos );
	if ( !infos ) return;
}

function prependDiv( infos ) {
	var new_div = document.createElement( "div" );
	new_div.className = "todo";
	new_div.innerHTML = infos;
	new_div.addEventListener( "click", function() { custom_remove( new_div ) } , false );
	container.insertBefore( new_div, container.firstChild );
	
}

function getExpire( exdays ) {
	var d = new Date();
	d.setTime( d.getTime() + ( exdays*24*60*60*1000 ) );
	var expires = "expires=" + d.toUTCString();
	return( expires );
}

function addCookie( cname, infos ) {
	infosstr = getCookie( cname );
	if ( infosstr == "" )
		infosstr = encodeURIComponent( infos );
	else
		infosstr = infosstr + "|" + encodeURIComponent( infos );
		document.cookie = cname + "=" + infosstr + "; " + getExpire( 1 / 24 );
}

function getCookie( cname ) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for( var i = 0; i < ca.length; i++ ) {
    var c = ca[i];
    while ( c.charAt( 0 ) == ' ' ) c = ( c.substring( 1 ) );
    if ( c.indexOf( name ) == 0 ) return c.substring( name.length, c.length );
    }
    return "";
}

function checkCookie() {
    var  todolist = getCookie( "todolist" );
    if ( todolist != "" ) {
		return true;
    }
   	else {
		return false;
    }
}

function getDecodedTab( cname ) {
	tab = getCookie( cname ).split( '|' );
	var i = 0;
	while( tab[i] ) {
		tab[i] = decodeURIComponent( tab[i] );
		i++;
	}
	return( tab );
}

function recoverTodoList() {
	todotab = getDecodedTab( "todolist" );
	var arrayLength = todotab.length;
	for( var i = 0; i < arrayLength; i++ )
		if ( todotab[i] != "" )
			prependDiv( todotab[i] );
}


function custom_remove( el ) {
	todolist = getCookie( "" ).split( '|' );
	tab = getDecodedTab( "todolist" );
	var index = tab.indexOf( el.innerHTML );
	if (index > -1) {
	    tab.splice(index, 1);
	}
	var infos = "";
	index = 0;
	while( tab[index] ) {
		if ( infos != "" )
			infos += "|";
		infos += encodeURIComponent( tab[index] );
		index++;
	}
	document.cookie = "todolist" + "=" + infos + "; " + getExpire( 1 / 24 );
	el.remove();
}
