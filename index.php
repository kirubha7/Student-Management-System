<?php
require_once '../config/config.php';
// CONFIG: Enable debug mode. This means we'll log requests into 'ipn.log' in the same directory.
// Especially useful if you encounter network errors or other intermittent problems with IPN (validation).
// Set this to 0 once you go live or don't require logging.
define("DEBUG", 1);
define("LOG_FILE", "ipn.log");

$vendorid = IPAY_VENDOR_ID;
/*
these values below are picked from the incoming URL and assigned to variables that we
will use in our security check URL
*/
$val3 = $_GET["qwh"];
$val4 = $_GET["afd"];
$val5 = $_GET["poi"];
$val6 = $_GET["uyt"];
$val7 = $_GET["ifd"];
$courseregistrationentryid = $_GET["id"];
$course_table_name = $_GET["p1"];
$payment_amount = $_GET['mc'];
$item_number = $_GET['p4'];
$txn_id = $_GET['txncd'];
$item_name = $_GET['p2'];
$payment_currency = $_GET['p3'];
$initial_payment_status = GetStatus($_GET['status']);

$paymentlogentryresult = Payment::InsertPaymentLog($txn_id, $initial_payment_status, $courseregistrationentryid, $_SERVER['QUERY_STRING']);

$ipnurl = IPAY_IPN_LINK.$vendorid."&id=".$courseregistrationentryid."&ivm=".$_GET["ivm"]."&qwh=".$val3."&afd=".$val4."&poi=".$val5."&uyt=".$val6."&ifd=".$val7;
error_log(date('[Y-m-d H:i e] '). "IPNURL RESULT: " . $ipnurl . PHP_EOL, 3, LOG_FILE);
$fp = fopen($ipnurl, "rb");
error_log(date('[Y-m-d H:i e] '). "fp RESULT: " . $fp . PHP_EOL, 3, LOG_FILE);
$status = stream_get_contents($fp, -1, -1);
error_log(date('[Y-m-d H:i e] '). "status RESULT: " . $status . PHP_EOL, 3, LOG_FILE);
$statustext = GetStatus($status);
fclose($fp);

if($status=="aei7p7yrx4ae34")
{
	$courseregistrationdetails = Payment::CourseRegistrationDetails($courseregistrationentryid,$course_table_name);

	if(empty($courseregistrationdetails)) exit();
	if($courseregistrationdetails['paymentstatus']==4) exit();
	if($courseregistrationdetails['fees']!=$payment_amount) exit();
	if($course_table_name=='courseregistrations')
	{
		if($courseregistrationdetails['course']!=$item_number) exit();
	}
	elseif($course_table_name=='coursemapping')
	{
		if($courseregistrationdetails['course_id']!=$item_number) exit();
	}
	
	// check whether the transaction id already exists in Payment Table.
	Payment::PaymentDetails($txn_id, $statustext, $paymenttableentryid);
	if(empty($paymenttableentryid)) {
	    $paymententryresult = Payment::InsertPayment($item_number, $item_name, $statustext, $payment_amount, $payment_currency, $txn_id, $courseregistrationentryid);
	    
		// Get the payment status details from the PAYMENTSTATUS table
		if(Payment::GetPaymentStatusDetails($status, $course_payment_status))
		{
			$courseRegistrationDetailsUpdate=Payment::UpdateCourseRegistrationDetails($course_payment_status,$courseregistrationentryid,$course_table_name);
			if($courseRegistrationDetailsUpdate)
			{
				header('location: '.ABS_URL.'register-success?pgm=4&ctid='.$txn_id.'&cn='.$item_number.'&cf='.$payment_amount.'&cc='.$payment_currency.'&crid='.$courseregistrationentryid);
				die;
			}
		}
	}
}
else
{
	header('location: '.ABS_URL.'register-error');
	die;
}

function GetStatus($statuscode){
	switch($statuscode) {
		case 'fe2707etr5s4wq':
			return 'Failed';
			break;
		case 'aei7p7yrx4ae34':
			return 'Success';
			break;
		case 'bdi6p2yy76etrs':
			return 'Pending';
			break;
		case 'cr5i3pgy9867e1':
			return 'Used';
			break;
		case 'dtfi4p7yty45wq':
			return 'Less';
			break;
		case 'eq3i7p5yt7645e':
			return 'More';
			break;
		default:        
			return 'Unknown';
	}
}

?>