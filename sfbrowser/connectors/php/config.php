<?php
define("SFB_PATH",			"sfbrowser/");		// path of sfbrowser (relative to the page it is run from)
define("SFB_BASE",			"../dat/");		// upload folder (relative to sfbpath)

define("SFB_LANG",			"es_ES");				// the language ISO code
define("PREVIEW_BYTES",		1000);				// ASCII preview ammount
define("SFB_DENY",			"php3,phtml");	// forbidden file extensions

define("FILETIME",			"j-n-Y H:i");		// file time display

define("SFB_ERROR_RETURN",	"<html><head><meta http-equiv=\"Refresh\" content=\"0;URL=http:/\" /></head></html>");

define("SFB_PLUGINS",		"imageresize,filetree,createascii");

define("SFB_DEBUG",			!false);
?>