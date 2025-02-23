<?php
// Make changes inside the database
class SignupContr extends Signup
{
    private $name;
    private $email;
    private $username;
    private $password;
    private $passwordRepeat;

    public function __construct($name, $email, $username, $password, $passwordRepeat)
    {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
    }

    public function signupUser()
    {
        if ($this->emptyInput())
        {
            // echo "Empty input!";
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUsername())
        {
            // echo "Empty input!";
            header("location: ../signup.php?error=invalidusername");
            exit();
        }
        if ($this->invalidEmail())
        {
            // echo "Empty input!";
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
        if (!$this->passwordMatch())
        {
            // echo "Empty input!";
            header("location: ../signup.php?error=passwordmismatch");
            exit();
        }
        if ($this->usernameTaken())
        {
            // echo "Empty input!";
            header("location: ../signup.php?error=usernametaken");
            exit();
        }

        $this->setUser($this->name, $this->email, $this->username, $this->password);
    }

    private function emptyInput()
    {
        $result = false;
        if (empty($this->name) || empty($this->username) || empty($this->email) || empty($this->password) || empty($this->passwordRepeat))
        {
            $result = true;
        }
        return $result;
    }

    private function invalidUsername()
    {
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username))
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

    private function passwordMatch()
    {
        $result = false;
        if($this->password == $this->passwordRepeat)
        {
            $result = true;
        }
        return $result;
    }

    private function usernameTaken()
    {
        $result = false;
        if ($this->checkUser($this->username, $this->email))
        {
            $result = true;
        }
        return $result;
    }
}
