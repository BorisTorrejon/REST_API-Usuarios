<?php
class User{
    private $userName;
    private $userSurname;
    private $userEmail;
    private $userPassword;
    const dirUsersJson='../data/users.json';

    public function __construct($user)
    {
        $this->userName     = $user['userName'];
        $this->userSurname  = $user['userSurname'];
        $this->userEmail    = $user['userEmail'];
        $this->userPassword = $user['userPassword'];
    }

    public function createUser(){
        $dataUsers  = file_get_contents(User::dirUsersJson);
        $users      = json_decode($dataUsers,true);
        $users[]    = array(
            "userName"    => $this->userName,
            "userSurname" => $this->userSurname,
            "userEmail"   => $this->userEmail,
            "userPassword"=> $this->userPassword
        );
        $data=fopen(User::dirUsersJson,"w");
        fwrite($data,json_encode($users));
        fclose($data);
    }

    public static function readUsers(){
        $dataUsers  = file_get_contents(User::dirUsersJson);
        echo $dataUsers;
    }

    public static function readUser($id){
        $dataUsers  = file_get_contents(User::dirUsersJson);
        $users      = json_encode($dataUsers,true);
        echo json_encode($users[$id]);
    }

    public function updateUser($id){
        $dataUsers  = file_get_contents(User::dirUsersJson);
        $users      = json_decode($dataUsers,true);
        $users[$id]    = array(
            "userName"    => $this->userName,
            "userSurname" => $this->userSurname,
            "userEmail"   => $this->userEmail,
            "userPassword"=> $this->userPassword
        );
        $data=fopen(User::dirUsersJson,"w");
        fwrite($data,json_encode($users));
        fclose($data);
    }

    public function deleteUser($id){
        $dataUsers  = file_get_contents(User::dirUsersJson);
        $users      = json_decode($dataUsers,true);
        array_splice($users,$id);
        $data=fopen(User::dirUsersJson,"w");
        fwrite($data,json_encode($users));
        fclose($data);
    }
}
?>