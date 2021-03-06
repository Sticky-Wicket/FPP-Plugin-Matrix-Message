<?php

function clearMatrix($matrix="") {

	global $pluginDirectory, $fpp_matrixtools_Plugin, $fpp_matrixtools_Plugin_Script,$Matrix,$settings;;
	
	if($matrix == "") {
		$matrix = $Matrix;
	}
	//	$cmdClear = $pluginDirectory."/".$fpp_matrixtools_Plugin."/".$fpp_matrixtools_Plugin_Script." --blockname \"".$Matrix."\" --clearblock";

	$cmdClear = $settings['fppBinDir']."/fppmm -m \"".$matrix."\" -s 0";


	logEntry("Matrix Clear cmd: ".$cmdClear);

	exec($cmdClear,$clearOutput);
}

function enableMatrixToolOutput($matrix="") {
	global $pluginDirectory,$fpp_matrixtools_Plugin, $fpp_matrixtools_Plugin_Script,$Matrix;

	if($matrix =="" ) {
		$matrix = $Matrix;
	}

	$cmdEnable = $pluginDirectory."/".$fpp_matrixtools_Plugin."/".$fpp_matrixtools_Plugin_Script. " --blockname \"".$matrix."\" --enable 1";
	logEntry("Matrix Enable cmd: ".$cmdEnable);
	//echo "p10 enable: ".$cmdEnable."\n";

	exec($cmdEnable,$enableOutput);
	//echo "Enabled \n";

	//print_r($enableOutput);

}

function disableMatrixToolOutput($matrix="") {
	global $pluginDirectory,$fpp_matrixtools_Plugin, $fpp_matrixtools_Plugin_Script,$Matrix;

	if($matrix =="" ) {
		$matrix = $Matrix;
	}

	$cmdEnable = $pluginDirectory."/".$fpp_matrixtools_Plugin."/".$fpp_matrixtools_Plugin_Script. " --blockname \"".$matrix."\" --enable 0";
	logEntry("Matrix disable cmd: ".$cmdEnable);
	//echo "p10 enable: ".$cmdEnable."\n";

	exec($cmdEnable,$enableOutput);
	//echo "Enabled \n";

	//print_r($enableOutput);

}
function PrintMatrixList($SELECT_NAME="MATRIX",$MATRIX_READ)
{
	global $pluginDirectory,$fpp_matrixtools_Plugin,$fpp_matrixtools_Plugin_Script;//,$blockOutput;

	$blockOutput = getBlockOutputs();
	//print_r($blockOutput);


	//$matrixBlocks=array();
	echo "<select name=\"".$SELECT_NAME."\">";

	for($i=0;$i<=count($blockOutput)-1;$i++) {

		//$blockParts = explode(":",$blockOutput[$i]);

		//echo "blockPart 0: ".$blockParts[0]. " : ".$blockParts[1]."<br/> \n";

		
			if(trim($blockOutput[$i])==$MATRIX_READ) {
				echo "<option selected value=\"".trim($MATRIX_READ)."\">".trim($MATRIX_READ)."</option>\n";
			} else {
				echo "<option value=\"".trim($blockOutput[$i])."\">".trim($blockOutput[$i])."</option>\n";
			}
		
	}

	echo "</select>";
}


//chase around the border of a matrix with colors :)

function matrixBorderChase($MATRIX,$COLOR=255) {
	
	global $pluginDirectory,$fppMM,$settings,$pluginSettings,$blockOutput;
	
	//	['channelOutputsFile'] = $mediaDirectory . "/channeloutputs";
	//$settings['channelMemoryMapsFile']
	
	
	
}

//get the block outputs
function getBlockOutputs() {
	global $settings;
	//echo "getting blocks";
	
	$blockOutput = array();
	
	$blocksTmp = file_get_contents($settings['channelMemoryMapsFile']);
	
	//print_r($blocksTmp);
	
	$blocks = explode("\n",$blocksTmp);
	
	//print_r($blocks);
	$blockIndex=0;
	
	for($blockIndex =0; $blockIndex<=count($blocks)-1;$blockIndex++) {
		$blockParts = explode(",",$blocks[$blockIndex]);
		$blockOutput[] = $blockParts[0];
		//$blockIndex++;
		//$blockOutput [] =
	}
	//print_r($blockOutput);
	
	return $blockOutput;
}

?>
