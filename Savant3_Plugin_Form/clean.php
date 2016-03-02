<?php
/**
* Gets a list of files from a directory.
* Recursively descends into subdirectories.
* Only lists files starting with a dot (not inluding .svn files).
*/
function getBadFiles($base, $dir = null)
{
	if ($dir === null) {
		$dir = $base;
	}
	
	$list = array();
	foreach (scandir($dir) as $name) {
	
		if ($name == '.' || $name == '..' || $name == 'CVS') {
			// skip!
			continue;
		}
		
		$result = "$dir/$name";
		
		if (is_dir($result)) {
			// recurse into the subdirectory
			$sub = getBadFiles($base, $result);
			$list = array_merge($list, $sub);
		} else {
			// only get names starting with a dot
			if (substr($name, 0, 1) == '.' ||
				substr($name, -1) == '~') {
				$list[] = $result;
			}
		}
	}
	
	asort($list);
	return $list;
}

// actually delete matching files
foreach (getBadFiles('.') as $name) {
	echo "$name\n";
	unlink($name);
}
?>