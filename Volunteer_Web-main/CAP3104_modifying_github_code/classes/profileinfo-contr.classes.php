<?php

class ProfileInfoContr extends ProfileInfo
{
    private $userId;
    private $email;
    private $firstname;
    private $lastname;

    public function __construct($userId, $email, $firstname, $lastname)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function defaultProfileInfo()
    {
        $streetname = "N/A";
        $city = "";
        $state = "";
        $zipcode = "";
        $phonenumber = "N/A";
        $this->setNewProfileInfo($this->firstname, $this->lastname, $this->email, $streetname, $city, $state, $zipcode, $phonenumber, $this->userId);
    }

    public function updateProfileInfo($firstname, $lastname, $email, $streetname, $city, $state, $zipcode, $phonenumber)
    {
        // Error handlers
        if ($this->emptyInputCheck($firstname, $lastname, $email, $streetname, $city, $state, $zipcode, $phonenumber)) {
            header("location: ../User_ProfileSettings.php?error=emptyinput");
            exit();
        }

        if ($this->invalidName($firstname) || $this->invalidName($lastname)) {
            header("location: ../User_ProfileSettings.php?error=invalidname");
            exit();
        }

        if ($this->invalidEmail($email)) {
            header("location: ../User_ProfileSettings.php?error=invalidemail");
            exit();
        }

        if ($this->invalidZipcode($zipcode)) {
            header("location: ../User_ProfileSettings.php?error=invalidzipcode");
            exit();
        }

        if ($this->invalidPhoneNumber($phonenumber)) {
            header("location: ../User_ProfileSettings.php?error=invalidphone");
            exit();
        }

        // Update profile info
        $this->setNewProfileInfo($firstname, $lastname, $email, $streetname, $city, $state, $zipcode, $phonenumber, $this->userId);
    }

    public function updateProfilePicture($profile_picture)
    {
        $this->setProfilePicture($profile_picture, $this->userId);
    }

    private function emptyInputCheck($firstname, $lastname, $email, $streetname, $city, $state, $zipcode, $phonenumber)
    {
        $result = false;
        if (empty($firstname) || empty($lastname) || empty($email) || empty($streetname) || empty($city) || empty($state) || empty($zipcode) || empty($phonenumber))
        {
            $result = true;
        }
        return $result;
    }

    private function invalidPhoneNumber($phonenumber)
    {
        // Accepts formats like 1234567890 or (123) 456-7890 or 123-456-7890
        $pattern = "/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/";
        return !preg_match($pattern, $phonenumber);
    }
    private function invalidEmail($email)
    {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function invalidZipcode($zipcode)
    {
        return !preg_match("/^\d{5}(-\d{4})?$/", $zipcode);
    }

    private function invalidName($name)
    {
        return !preg_match("/^[a-zA-Z\s\-']+$/", $name);
    }
}