<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        // Fetch user data from the backend (assuming you have a way to retrieve it)
        // For example, you might fetch it from the session, database, or any other source
        $session = session();
        $userModel = new UserModel();
        $user = $userModel->where('email', $session->get('email'))->first();

        // Pass the user data to the view
        return view('login-register/profile_view', ['user' => $user, 'name' => $user['name'], 'email' => $user['email']]);
    }

    public function uploadImage()
    {
        // Check if the form was submitted
        if ($this->request->getMethod() === 'post') {
            // Get the uploaded file
            $profileImage = $this->request->getFile('profile_image');

            // Check if the file is valid and move it to the desired location
            if ($profileImage->isValid() && $profileImage->getSize() < 5242880 && in_array($profileImage->getExtension(), ['jpg', 'jpeg', 'png'])) {
                // Generate a unique name for the file
                $newName = $profileImage->getRandomName();

                // Move the file to the writable/uploads directory
                $profileImage->move('writable/uploads', $newName);

                // Update the user's profile picture in the database
                $session = session();
                $userModel = new UserModel();
                $user = $userModel->where('email', $session->get('email'))->first();
                $userModel->update($user['id'], ['profile_picture' => $newName]);

                // Set success message
                $session->setFlashdata('success', 'Profile picture uploaded successfully.');
            } else {
                // Set error message
                $session->setFlashdata('error', 'Invalid file or file size exceeds 5MB. Please upload a JPG or PNG file.');
            }
        }

        // Redirect back to the profile page
        return redirect()->to('/profile');
    }
}
