<?php
// Make changes inside the database
class SignupContr extends Signup
{
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    public function __construct($firstname, $lastname, $email, $password)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
    }

    public function signupUser()
    {
        if ($this->emptyInput())
        {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if ($this->invalidEmail())
        {
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
        if ($this->emailTaken())
        {
            header("location: ../signup.php?error=emailtaken");
            exit();
        }

        $this->setUser($this->firstname, $this->lastname, $this->email, $this->password);
    }

    private function emptyInput()
    {
        $result = false;
        if (empty ($this->firstname) || empty ($this->lastname) || empty ($this->email) || empty ($this->password))
        {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail()
    {
        $result = false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $result = true;
        }
        return $result;
    }

    private function emailTaken()
    {
        $result = false;
        if ($this->checkEmail($this->email))
        {
            $result = true;
        }
        return $result;
    }

    public function fetchUserId($email)
    {
        $userId = $this->getUserId($email);
        return $userId[0]["id"];
    }
}
