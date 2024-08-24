<?php 
require_once APPPATH . "controllers/BaseController.php";
class AttendeeController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
	}

	
}
/* 
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.konfhub.com/event/capture/v2',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "event_id": "f08c5088-2794-4f27-923c-2058132e1b28",
    "registration_tz": "Asia/Kolkata",
    "utm": {
        "utm_source": "AWS%20Workshop",
        "utm_medium": "Email",
        "utm_campaign": "AWS%20Workshop"
    },
    "registration_details": {
        "21340": [
            {
                "name": "John Doe",
                "email_id": "johndoe@abc.com",
                "custom_forms": {
                    "45681": "Swift",
                    "45682": "Swift",
                    "46261": "1 - 50",
                    "46262": "Marketing",
                    "46263": "Below 100 Cr",
                    "46264": "Textile"
                },
                "whatsapp_number": "8689862375",
                "wa_dial_code": "+91",
                "wa_country_code": "in",
                "whatsapp_consent": true
            }
        ]
    }
}',
  CURLOPT_HTTPHEADER => array(
    'x-api-key: b514a532-f75c-4080-a63c-dfd54eb98bf5',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

{
    "title": "All set, see you at IDFC FIRST Bank Presents ET Now Leaders of Tomorrow - Mumbai Springboard",
    "message": "<p>We have sent registration confirmation &amp; ticket details to the registered participants via email. Emails would have been sent from <strong>response@timesnetwork.in</strong>. You can even access your tickets from <a href=\"https://konfhub.com/bookings\" rel=\"noopener\" target=\"_blank\">Profile</a></p>",
    "type": "('single',)_('free',)_('offline',)",
    "booking_id": [
        "5b9dfd3b"
    ],
    "url": {
        "zip": "https://files.konfhub.com/f08c5088-2794-4f27-923c-2058132e1b28/zip_files/IDFC-FIRST-Bank-Presents-ET-Now-Leaders-of-Tomorrow-Mumbai-Springboard-2024-08-24 15-15-34.zip",
        "bulk_invoice": null,
        "5b9dfd3b": {
            "name": "John Doe",
            "ticket_name": "Web Delegate",
            "ticket": "https://files.konfhub.com/f08c5088-2794-4f27-923c-2058132e1b28/tickets/5b9dfd3b_ticket.pdf"
        }
    }
}
*/
