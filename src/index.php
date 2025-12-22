<?php
    require "Repository/UserRepository.php";
    require "Entity/User.php";
    require "Database/DatabaseConnection.php";

    $connection = new DatabaseConnection();
    $conn = $connection->establishConnection();

    echo "=== Welcome to University Management CLI ===\n";
    echo "Enter your email: ";
    $email = trim(fgets(STDIN));

    echo "Enter your password: ";
    $password = trim(fgets(STDIN));

    $service = new UserRepository($conn);
    $user = $service->login($email, $password);

    if (!$user) {
        echo "Invalid credentials.\n";
        exit;
    }else{
        echo "good work";
    }

    if ($user->getRole() == 'admin') {
        echo "=== University Management CLI ===\n\n";
        echo "Select an entity to manage:\n";
        echo "1. Departments\n";
        echo "2. Courses\n";
        echo "3. Formateurs\n";
        echo "4. Students\n";
        echo "Choose an option: ";
        $option = fgets(STDIN);
        switch ($option) {
            case '1':
                echo "\n=== Departments Menu ===\n";
                echo "1. Create Department\n";
                echo "2. List Departments\n";
                echo "3. Update Department\n";
                echo "4. Delete Department\n";
                echo "0. Go Back\n\n";
                echo "Choose an option: ";
                $subOption = fgets(STDIN);    
                switch ($subOption) {
                    case 'value':
                        # code...
                        break;
                    
                    default:
                        # code...
                        break;
                }
            break;
            case '2':
                echo "\n=== Courses Menu ===\n";
                echo "1. Create Course\n";
                echo "2. List Courses by Department\n";
                echo "3. Update Course\n";
                echo "4. Delete Course\n";
                echo "0. Go Back\n\n";
                echo "Choose an option: ";
                $subOption = fgets(STDIN);  
                switch ($subOption) {
                    case 'value':
                        # code...
                        break;
                    
                    default:
                        # code...
                        break;
                }
            break;
            case '3':
                echo "\n=== Formateurs Menu ===\n";
                echo "1. Create Formateur\n";
                echo "2. List Formateurs\n";
                echo "3. Update Formateur\n";
                echo "4. Delete Formateur\n";
                echo "5. Assign Formateur to Course\n";
                echo "0. Go Back\n\n";
                echo "Choose an option: ";
                $subOption = fgets(STDIN);   
                switch ($subOption) {
                    case 'value':
                        # code...
                        break;
                    
                    default:
                        # code...
                        break;
                }
            break;
            case '4':
                echo "\n=== Students Menu ===\n";
                echo "1. Create Student\n";
                echo "2. List Students by Department\n";
                echo "3. Update Student\n";
                echo "4. Delete Student\n";
                echo "5. Assign Student to Department\n";
                echo "6. List Courses for a Student\n";
                echo "0. Go Back\n\n";
                echo "Choose an option: ";
                switch ($subOption) {
                    case 'value':
                        # code...
                        break;
                    
                    default:
                        # code...
                        break;
                }
            break; 
            default:
                break;
        }

    }