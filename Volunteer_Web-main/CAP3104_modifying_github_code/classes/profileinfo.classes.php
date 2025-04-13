<?php

class ProfileInfo extends dbh
{
    protected function getProfileInfo($id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE id = ?");

        if (!$stmt->execute(array($id)))
        {
            $stmt = null;
            header("location: User_Profile.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: User_Profile?error=profilenotfound");
            exit();
        }

        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $profileData;
    }

    protected function setNewProfileInfo($firstname, $lastname, $email, $streetname, $city, $state, $zipcode, $phonenumber, $id)
    {
        $stmt = $this->connect()->prepare("UPDATE users SET firstname = ?, lastname = ?, email = ?, streetname = ?, city = ?, state = ?, zipcode = ?, phonenumber = ? WHERE id = ?");

        if (!$stmt->execute(array($firstname, $lastname, $email, $streetname, $city, $state, $zipcode, $phonenumber, $id)))
        {
            $stmt = null;
            header("location: User_Profile?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function setProfileInfo($profileAbout, $profileTitle, $profileText, $userId)
    {
        $stmt = $this->connect()->prepare("INSERT INTO profiles (profiles_about, profiles_title, profiles_text, user_id) VALUES (?, ?, ?, ?)");

        if (!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId)))
        {
            $stmt = null;
            header("location: User_Profile?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function setProfilePicture($profile_picture, $id)
    {
        $stmt = $this->connect()->prepare("UPDATE users SET profile_picture = ? WHERE id = ?");

        if (!$stmt->execute(array($profile_picture, $id)))
        {
            $stmt = null;
            header("location: User_Profile?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

}