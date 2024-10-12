<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\GformlinkModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Endroid\QrCode\QrCode;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;


use App\Controllers\BaseController;

class AdminController extends BaseController
{
    protected $GformlinkModel; // Declare the property for the model
    protected $studentModel;

    public function __construct() {
        $this->studentModel = new StudentModel();
        $this->GformlinkModel = new GformlinkModel(); 
    }
    public function scanqrpage()
    {
        return view('admin/qrcodescanner');
    }

    public function updateStatus($id, $status) {
        $student = $this->studentModel->find($id);
    
        if (!$student) {
            return $this->response->setJSON(['success' => false, 'message' => 'Student not found']);
        }
    
        if ($status == 'passed') {
            // Generate QR Code and send email
            $qrCodePath = $this->generateQRCode($student['id']);
            if (file_exists($qrCodePath)) {
                // Save the QR code data to the database
                $this->studentModel->update($id, ['qr_code' => $student['id']]);
                $this->sendEmail($student['email'], 'Congratulations! You Passed', 'Here is your QR Code for the entrance exam.', $qrCodePath);
            } else {
                log_message('error', 'QR code file not found: ' . $qrCodePath);
                return $this->response->setJSON(['success' => false, 'message' => 'QR code generation failed']);
            }
        } else {
            // Send failed notification email
            $this->sendEmail($student['email'], 'Failed Notification', 'Sorry, you did not pass the pre-registration.');
        }
    
        // Update status in the database
        $this->studentModel->update($id, ['status' => $status]);
    
        return $this->response->setJSON(['success' => true, 'message' => 'Status updated successfully']);
    }
    

    public function generateQRCode($id) {
        // Generate the QR code
        $result = Builder::create()
            ->writer(new PngWriter()) // Specify the writer, in this case, PNG
            ->data($id) // Data to be encoded in the QR code
            ->size(300) // Size of the QR code
            ->margin(10) // Margin around the QR code
            ->build();
    
        // Define the file path to save the QR code image
        $filePath = WRITEPATH . 'qrcodes/qr_' . $id . '.png';
    
        // Save the QR code image to a file
        $result->saveToFile($filePath);
    
        // Return the file path for further use
        return $filePath;
    }

    private function sendEmail($to, $subject, $message, $attachment = null) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'degaleracolegio@gmail.com'; 
            $mail->Password = 'hrxlrwtdyjguxivk'; 
            $mail->SMTPSecure = 'tls'; 
            $mail->Port = 587; 

            // Recipients
            $mail->setFrom('degaleracolegio@gmail.com', 'Admin');
            $mail->addAddress($to);

            // Attachments
            if ($attachment) {
                if (file_exists($attachment)) {
                    $mail->addAttachment($attachment); 
                } else {
                    log_message('error', 'Attachment file not found: ' . $attachment);
                }
            }

            // Content
            $mail->isHTML(true); 
            $mail->Subject = $subject;
            $mail->Body    = $message;

            // Send the email
            if (!$mail->send()) {
                log_message('error', 'PHPMailer Error: ' . $mail->ErrorInfo);
            } else {
                log_message('info', 'Email sent successfully to: ' . $to);
            }
        } catch (Exception $e) {
            log_message('error', 'Exception caught while sending email: ' . $e->getMessage());
        }
    }

    public function scanQRCode($qrCode) {
        // Validate the QR code and check if it’s valid or already used
        $student = $this->studentModel->where('qr_code', $qrCode)->first(); // Ensure this matches what you stored
    
        if ($student) {
            if ($student['status'] == 'passed' && !$student['qr_code_used']) {
                // Mark the QR code as used
                $this->studentModel->update($student['id'], ['qr_code_used' => true]);
    
                return $this->response->setJSON(['success' => true, 'message' => 'QR Code has been scanned. Good luck on the entrance exam!']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'QR Code is invalid or already used.']);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'QR Code not found.']);
        }
    }
    
    
    
    

    public function uploadExcel() {
        $file = $this->request->getFile('excelFile');
        
        if ($file->isValid() && !$file->hasMoved()) {
            $filePath = $file->getTempName();
            
            // Load Excel file
            $spreadsheet = IOFactory::load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();
            
            // Get header row (the first row) and find the indices of 'name' and 'email'
            $header = $rows[0]; // Assuming the first row contains the headers
            
            // Find the index of the 'name' and 'email' columns
            $nameIndex = array_search('name', array_map('strtolower', $header));
            $emailIndex = array_search('email', array_map('strtolower', $header));
            
            // Check if both columns were found
            if ($nameIndex === false || $emailIndex === false) {
                return json_encode(['success' => false, 'message' => 'Name or email column not found']);
            }
    
            // Loop through rows and save data to database
            foreach ($rows as $index => $row) {
                if ($index == 0) {
                    continue; // Skip header row
                }
                
                // Get data based on identified indices
                $data = [
                    'name' => $row[$nameIndex],
                    'email' => $row[$emailIndex],
                    // Add other fields if necessary
                ];
    
                // Save each row to the database (assuming you have a Model)
                $this->studentModel->insert($data);
            }
    
            return redirect()->to('/uploadexcel');
        }
    }
    

    public function viewTable() {
        $data['students'] = $this->studentModel->findAll();
        return view('admin/admin_view', $data);
    }

    public function uploadGoogleFormLink() {
        $googleFormLink = $this->request->getPost('googleFormLink');

        if ($googleFormLink) {
            // Assuming you have a model to interact with the database
            $this->GformlinkModel->saveFormLink($googleFormLink);

            return redirect()->to('/admin/success')->with('message', 'Google Form link uploaded successfully!');
        } else {
            return redirect()->to('/admin/error')->with('error', 'Failed to upload Google Form link');
        }
    }

    public function showGFormlinkpage() {
        $formLink = $this->GformlinkModel->getLatestFormLink();
    
            // Retrieve all uploaded links
        $uploadedLinks = $this->GformlinkModel->getAllUploadedLinks(); // Make sure this function exists in your model

        return view('admin/GFormLinkpage', [
            'googleFormLink' => $formLink,
            'uploadedLinks' => $uploadedLinks // Pass the uploaded links to the view
    ]);
    }

    public function toggleLinkVisibility() {
        $linkId = $this->request->getPost('id');
        $showLink = $this->request->getPost('show_link');
    
        if ($linkId) {
            // Update the visibility status in the database
            $this->GformlinkModel->update($linkId, ['show_link' => $showLink]);
    
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error']);
        }
    }

    
    

    

    
}
