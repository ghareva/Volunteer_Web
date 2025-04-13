<?php

class ProfileInfoView extends ProfileInfo
{
    public function fetchFirstName($id)
    {
        $profileInfo = $this->getProfileInfo($id);

        echo $profileInfo[0]["firstname"];
    }

    public function fetchLastName($id)
    {
        $profileInfo = $this->getProfileInfo($id);

        echo $profileInfo[0]["lastname"];
    }

    public function fetchEmail($id)
    {
        $profileInfo = $this->getProfileInfo($id);

        echo $profileInfo[0]["email"];
    }

    public function fetchStreetName($id)
    {
        $profileInfo = $this->getProfileInfo($id);

        echo $profileInfo[0]["streetname"];
    }

    public function fetchCity($id)
    {
        $profileInfo = $this->getProfileInfo($id);

        echo $profileInfo[0]["city"];
    }

    public function fetchState($id)
    {
        $profileInfo = $this->getProfileInfo($id);

        echo $profileInfo[0]["state"];
    }

    public function getState($id)
    {
        $profileInfo = $this->getProfileInfo($id);

        return $profileInfo[0]["state"];
    }


    public function fetchZipcode($id)
    {
        $profileInfo = $this->getProfileInfo($id);

        echo $profileInfo[0]["zipcode"];
    }

    public function fetchAddress($id)
    {
        $profileInfo = $this->getProfileInfo($id);

        $streetname = $profileInfo[0]["streetname"];
        $city = $profileInfo[0]["city"];
        $state = $profileInfo[0]["state"];
        $zipcode = $profileInfo[0]["zipcode"];

        if ($streetname == null && $city == null && $state == null && $zipcode == null)
        {
            echo "N/A";
        }
        else
        {
            echo $streetname . ", " . $city . ", " . $state . ", " . $zipcode;
        }
    }

    public function fetchPhoneNumber($id)
    {
        $profileInfo = $this->getProfileInfo($id);
        $phonenumber = $profileInfo[0]["phonenumber"];

        if ($phonenumber == null)
        {
            echo "N/A";
        }
        else
        {
            echo $phonenumber;
        }
    }
}