<?php
$obj = new stdClass();

/**
 * login
 */
function login_user() {
    global $db, $payload, $obj, $validator;

    $validation = $validator->make($payload, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $validation->validate();
    if ($validation->fails()) {
        $errors = $validation->errors();
        echo json_encode($errors->firstOfAll(), JSON_PRETTY_PRINT);
        exit();
    }

    $email = $payload["email"];
    $user = $db->where("email", $email)->getOne("example-login-table");
    if (!$user) {
        $obj->status = 0;
        $obj->response = "User doesnot exist";
        echo json_encode($obj, JSON_PRETTY_PRINT);
        return;
    };

    if ($db->count > 0) {
        if (password_verify($payload["password"], $user["password"])) {  
            $obj->status = 1; 
            $obj->response = "Login successful"; 
            echo json_encode($obj, JSON_PRETTY_PRINT);
            return; 
        } else {
            $obj->status = 0;
            $obj->response = "Invalid Password";
            echo json_encode($obj, JSON_PRETTY_PRINT);
            return;
        }
    } 
}

?>