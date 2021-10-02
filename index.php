<?php

	require('config.php');

	if ($DEBUG) {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	}

	require('md-includes/parsedown/Parsedown.php');

	if (array_key_exists('page', $_GET)) $page = $_GET['page'];
	else $page = "";

	function parseIndex() {
		global $address;
		global $page;
		global $title;
		global $pageTitle;

		$index = file_get_contents('documentation/_index.md');
		$output = "<ol>\r\n";
		$previousIndent = 0;
		foreach(preg_split("/((\r\n?\n)|(\r\n\n?))/", $index) as $line){
	    	
			// check what is the new level of indentation
	    	if (substr($line, 0, 6) == "\t\t\t\t\t\t") $newIndent = 6;
	    	elseif (substr($line, 0, 5) == "\t\t\t\t\t") $newIndent = 5;
	    	elseif (substr($line, 0, 4) == "\t\t\t\t") $newIndent = 4;
	    	elseif (substr($line, 0, 3) == "\t\t\t") $newIndent = 3;
	    	elseif (substr($line, 0, 2) == "\t\t") $newIndent = 2;
	    	elseif (substr($line, 0, 1) == "\t") $newIndent = 1;
	    	else $newIndent = 0;

	    	if ($newIndent > $previousIndent) {
	    		for ($i = 0; $i<($newIndent-$previousIndent); $i++) {
	    			$output .= "<ol>\r\n";
	    		}
	    	} elseif ($newIndent < $previousIndent) {
	    		for ($i = 0; $i<($previousIndent-$newIndent); $i++) {
	    			$output .= "</ol>\r\n";
	    		}
			}

			$lineContents = explode("* ",$line);

			if (preg_match("/\[([\w\W]*)\]\(([\w\W]*)\)/", $lineContents[1], $matches)) {
				if ($page=="") $page = $matches[2];
				$output .= "<li><a href=".$address."/".$matches[2]."/";
				if ($page==$matches[2]) {
					$output .= " id='currentPage'";
					$pageTitle = $matches[1]." - ".$title;
				}
				$output .= ">".$matches[1]."</a></li>\r\n";
			} else {
				$output .= "<li>".$lineContents[1]."</li>\r\n";			
			}

			$previousIndent = $newIndent;
		} 
		$output .= "</ol>\r\n";
		
		return $output;
	}

	$index = parseIndex();

	$parsedownReference = new Parsedown();

	$pageParsed = $parsedownReference->text(file_get_contents('documentation/'.$page.'.md'));

	include ("header.php");

	echo"<div id=page>".$pageParsed."</div>";
	echo"</div>";

	include ("footer.php");

?>