<?php
    //Include backend functions to use in API
    require_once('../includes/functions.inc.php');
    require_once('../includes/contacts.inc.php');

    $conn = connectToDatabase();
    if (!$conn){http_response_code(404);}

    //Usually we generate here some API Key so what can be pulled is limited this is up to you to generate
    
    //Header file type defined, the server will be sent a packet that can stream the data and know what content it will be recieving
    header('Content-Type: application/json');

    //Record what type of request is asked of our server
    $method = $_SERVER['REQUEST_METHOD'];

    // API endpoints, aka creating URI's, it's like a webpage but insted of being a known and defined file, it's a temp file that only exists upon request
    $endpoint = explode('/', $_SERVER['REQUEST_URI']);


    var_dump($endpoint);
    //API routing 
    switch ($method) 
    {

        case 'POST':
            if (isset(endpoint[7]))
            {   
                $userId = endpoint[3]
                $contactFirst = endpoint[4]
                $contactLast = endpoint[5]
                $contactMail = endpoint[6]
                $contactPhone = endpoint[7]

                $contacts = add_contact($contactFirst,$contactLast,$contactPhone,$contactMail, $userId);
                var_dump($contacts);

                if (isset($contacts)) 
                {
                    http_response_code(200);
                    echo json_encode($contacts);
                } 
                else 
                {
                    http_response_code(404);
                    echo json_encode(['error' => 'Contacts of user not found']);
                }

            }
            else:
            {
                http_response_code(404);
                echo json_encode(['error' => 'Not enough endpoints']);
            }
        case 'GET':
            {
                if (isset($endpoint[3])) 
                {
                    // Get a specific contact by ID
                    $contactId = (int)$endpoint[3];
                    var_dump($contactId);


                    $contacts = retrieve_all_contacts($contactId);
                    var_dump($contacts);
                    if (isset($contacts))
                    {
                        http_response_code(200);
                        echo json_encode($contacts);
                    } 
                    else 
                    {
                        http_response_code(404);
                        echo json_encode(['error' => 'Contacts of user not found']);
                    }
                }
                //get specific
            }
            break;
        case 'UPDATE':
            if (isset(endpoint[7]))
            {   
                $contactID = endpoint[3]
                $contactFirst = endpoint[4]
                $contactLast = endpoint[5]
                $contactMail = endpoint[6]
                $contactPhone = endpoint[7]

                $contacts = update_contact($contactID, $contactFirst,$contactLast,$contactPhone,$contactMail)
                var_dump($contacts);

                if (isset($contacts)) 
                {
                    http_response_code(200);
                    echo json_encode($contacts);
                } 
                else 
                {
                    http_response_code(404);
                    echo json_encode(['error' => 'Contacts of user not found']);
                }

            }
            else:
            {
                http_response_code(404);
                echo json_encode(['error' => 'Not enough endpoints']);
            }
            break;
        case 'DELETE':
            if (isset(endpoint[3]))
            {
                $contactID = endpoint[3]

                $contacts = delete_contact($contactID)
                var_dump($contacts);

                if (isset($contacts)) 
                {
                    http_response_code(200);
                    echo json_encode($contacts);
                } 
                else 
                {
                    http_response_code(404);
                    echo json_encode(['error' => 'Contacts of user not found']);
                }
            }
            else:
            {
                http_response_code(404);
                echo json_encode(['error' => 'Not enough endpoints']);
            }
            break;

    }
?>