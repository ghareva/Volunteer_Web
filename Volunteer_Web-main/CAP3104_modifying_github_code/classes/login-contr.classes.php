<?php
// Make changes inside the database
class LoginContr extends Login
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser()
    {
        if ($this->emptyInput())
        {
            // echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->email, $this->password);
    }

    private function emptyInput()
    {
        $result = false;
        if (empty($this->email) || empty($this->password))
        {
            $result = true;
        }
        return $result;
    }

}
