
<?php 
// incluye el cargador automático 
require_once 'autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
/**
 * 
 */
class PDF
{
	
	public static function stream($name, $html)
	{
		// instantiate and use the dompdf class
		$dompdf = new Dompdf();

		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('letter', 'landscape');
		//landscape portrait

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream($name);
	}

	public static function stream2($name, $html)
	{
		// instantiate and use the dompdf class
		$dompdf = new Dompdf();

		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('letter', 'landscape');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream($name);
	}




public static function savedisk($name,$html,$folder)
{
		$dompdf = new Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('letter', 'portrait');
		$dompdf->render();
		$output = $dompdf -> output();
		$file = $folder.$name;
		if (!file_exists($folder)) {
			if (mkdir($folder,0777,true)) {
				file_put_contents($file, $output);
			}
		}else{
			file_put_contents($file, $output);
		}
}
}
 ?>